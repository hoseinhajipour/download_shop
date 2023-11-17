<?php

namespace App\Components\Admin;

use App\Models\Link;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AssetImporter extends Component
{
    public $categories = [];
    public $category_select = 1;
    public $url;
    use LivewireAlert;

    public $titles = [];
    public $download_links = [];
    public $offset = 0;

    public function mount()
    {
        $this->categories = ProductCategory::all();
    }

    public function render()
    {
        return view('admin.asset-importer');
    }

    public function ImportProduct()
    {
        ini_set('max_execution_time', 150000);
        try {
            $crawler = \Weidner\Goutte\GoutteFacade::request('GET', $this->url);

            $product = new Product();
            $product->title = $crawler->filter('h1.entry-title')->text();
            $product->body = $crawler->filter('div.post-single-content')->text();

            $img = $crawler->filter('figure>img')->attr("src");
            if ($img) {
                $arrContextOptions = array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                    ),
                );

                // save file
                $file = basename($img);
                $save_path_relative = "media/products/" . $file;
                Storage::disk('public')->put($save_path_relative, file_get_contents($img, false, stream_context_create($arrContextOptions)));
                $product->image = $save_path_relative;
            }

            $crawler->filter('p.has-text-align-center')->each(function ($item) {
                $this->titles[] = $item->text();
            });
            $crawler->filter('a.maxbutton-download')->each(function ($item) {
                $this->download_links[] = $item->attr("href");
            });

            $product->category_id = $this->category_select;
            $product->author_id = Auth::user()->id;
            $product->status = "PUBLISHED";

            $product->save();

            $index = 0 + $this->offset;
            foreach ($this->download_links as $linkUrl) {
                $link = new Link();
                $link->product_id = $product->id;
                if ($this->titles && $this->titles[$index]) {
                    $link->title = $this->titles[$index];
                } else {
                    $link->title = $product->title;
                }
                $link->url = $linkUrl;
                $link->type = "direct";
                $link->save();

                $this->makeFreeLink($link->id);
                $index++;
            }

            $this->alert('success', 'Product added', ['position' => 'center']);

            $this->url = "";
            $this->titles = [];
            $this->download_links = [];
            $this->offset = 0;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function makeFreeLink($id)
    {
        $currentlink = Link::find($id);

        $long_url = urlencode($currentlink->url);
        $api_token = '620c742c81833e6259be985214ae3a11b03265a9';
        $api_url = "https://za.gl/api?api={$api_token}&url={$long_url}";
        $result = @json_decode(file_get_contents($api_url), TRUE);
        if ($result && $result["status"] === 'error') {
            dd($result);
            $this->alert('error', $result["message"][0], ['position' => 'center']);
        } else {
            $link = new Link();
            $link->product_id = $currentlink->product_id;
            $link->title = $currentlink->title;
            $link->url = $result["shortenedUrl"];
            $link->type = "free";
            $link->save();

            $this->alert('success', $result["shortenedUrl"], ['position' => 'center']);
        }
    }
}
