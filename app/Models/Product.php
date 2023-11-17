<?php

namespace App\Models;

use http\Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Product extends Model
{
    use Resizable;
    use HasFactory;
    public function links()
    {
        return $this->hasMany(Link::class, "product_id");
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::replace('%', "_", $product->title);
            $product->slug = Str::replace(' ', "_", $product->slug);
            $product->slug = Str::replace('&', "_", $product->slug);
            $product->slug = Str::replace(';', "", $product->slug);
            $product->slug = Str::replace('(', "_", $product->slug);
            $product->slug = Str::replace(')', "_", $product->slug);

        });

        static::updating(function ($product) {
            $product->slug = Str::replace('%', "_", $product->title);
            $product->slug = Str::replace(' ', "_", $product->slug);
            $product->slug = Str::replace('&', "_", $product->slug);
            $product->slug = Str::replace(';', "", $product->slug);
            $product->slug = Str::replace('(', "_", $product->slug);
            $product->slug = Str::replace(')', "_", $product->slug);
        });
    }
}
