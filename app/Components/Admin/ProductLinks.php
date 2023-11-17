<?php

namespace App\Components\Admin;

use App\Models\Link;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProductLinks extends Component
{
    use LivewireAlert;

    public $product_id;
    public $title;
    public $url;
    public $type = "free";

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function render()
    {
        $links = Link::where("product_id", $this->product_id)->get();
        return view('admin.product-links', ["links" => $links]);
    }

    public function newLink()
    {
        $link = new Link();
        $link->product_id = $this->product_id;
        $link->title = $this->title;
        $link->url = $this->url;
        $link->type = $this->type;
        $link->save();

        $this->title = "";
        $this->url = "";
        $this->type = "free";
    }

    public function delete($id)
    {
        Link::find($id)->delete();
    }

    public function makeFreeLink($id)
    {
        $currentlink = Link::find($id);

        $long_url = urlencode($currentlink->url);
        $api_token = '620c742c81833e6259be985214ae3a11b03265a9';
        $api_url = "https://za.gl/api?api={$api_token}&url={$long_url}";
        $result = @json_decode(file_get_contents($api_url), TRUE);
        if ($result["status"] === 'error') {
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
    public function shrinkme($id)
    {
        $currentlink = Link::find($id);

        $long_url = urlencode($currentlink->url);
        $api_token = '5ee6d40c63ba6ec60659d5936385fbe4e55f8a4f';
        $api_url = "https://shrinkme.io/api?api={$api_token}&url={$long_url}";
        $result = @json_decode(file_get_contents($api_url), TRUE);
        if ($result["status"] === 'error') {
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
    public function ad2($id)
    {
        $currentlink = Link::find($id);

        $long_url = urlencode($currentlink->url);
        $api_token = 'fd264d4ed991abd2c252ef96acc33b8f0e404544';
        $api_url = "https://2ad.ir/api?api={$api_token}&url={$long_url}";
        $result = @json_decode(file_get_contents($api_url), TRUE);
        if ($result["status"] === 'error') {
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
