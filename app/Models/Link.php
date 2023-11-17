<?php

namespace App\Models;

use http\Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Link extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ad2()
    {
        try {
            $long_url = urlencode($this->url);
            $api_token = 'fd264d4ed991abd2c252ef96acc33b8f0e404544';
            $api_url = "https://2ad.ir/api?api={$api_token}&url={$long_url}";
            $result = @json_decode(file_get_contents($api_url), TRUE);
            if ($result["status"] === 'error') {

            } else {
                $link = new Link();
                $link->product_id = $this->product_id;
                $link->title = $this->title;
                $link->url = $result["shortenedUrl"];
                $link->type = "free";
                $link->save();
            }
        } catch (Exception $e) {

        }
    }
}
