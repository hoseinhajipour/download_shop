<?php

namespace App\Components\Admin;

use App\Models\Link;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Intervention\Image\ImageManagerStatic as Image;

class AssetImporter extends Component
{
    public $categories = [];
    public $category_select = 1;
    public $url;
    use LivewireAlert;

    public $titles = [];
    public $download_links = [];
    public $offset = 0;

    public $type = "video";

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

        $this->fetch_Product($this->url);
        $this->alert('success', 'Product Archives Imported Successfully.');
    }


    public function fetch_Product($url_get){
        try {
            $crawler = \Weidner\Goutte\GoutteFacade::request('GET',$url_get);

            $product = new Product();
            $product->title = $crawler->filter('h1.entry-title')->text();
            $product->body = $crawler->filter('div.entry-content')->html();
            $img = $crawler->filter('meta[property="og:image"]')->attr("content");
            $fileSize = $crawler->filter('meta[itemprop="fileSize"]')->attr("content");
            // Check if the video element exists
            $videoElement = $crawler->filter('video.wp-video-shortcode');
            $video_url = "";
            if ($videoElement->count() > 0) {
                // Extract the video URL from the source tag
                $video_url = $crawler->filter('video.wp-video-shortcode source')->attr('src');
            } else {
                // Handle the case where the video element is not found
            }

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
                $imageContent = file_get_contents($img, false, stream_context_create($arrContextOptions));

                // Create an Intervention Image instance
                $image = Image::make($imageContent);

                // Append watermark to the image
                $watermarkPath = public_path('site/watermark.png'); // Replace with the actual path to your watermark image
                //  dd($watermarkPath);
                $watermark = Image::make($watermarkPath);
                $image->insert($watermark, 'bottom-left', 0, 0);

                // Save the image with the watermark
                Storage::disk('public')->put($save_path_relative, $image->encode());

                $product->image = $save_path_relative;
                $product->category_id = $this->category_select;
                $product->file_size = $fileSize;
                $product->status = "active";
                $product->preview_url = $video_url;
                $product->type = $this->type;

                $product->save();
            }
            $this->alert('success', 'Product Save it .', [
                'position' => 'center'
            ]);

        } catch (\Exception $e) {
         //   dd($e);
        }
    }
    public $Archive_url = "";

    public function ImportProductArchives()
    {
        try {
            $crawler = \Weidner\Goutte\GoutteFacade::request('GET', $this->Archive_url);

            $urls = $crawler->filter('div.content-timeline__link')->each(function ($node) {
                $title = $node->filter('h2.content-timeline__detail__title a')->attr('href');
                return $title;
            });
            foreach ($urls as $url){
                $this->fetch_Product($url);
            }
            // Now, $urls will contain an array of href values from the specified elements
            $this->alert('success', 'Product Archives Imported Successfully.', [
                'position' => 'center'
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

}
