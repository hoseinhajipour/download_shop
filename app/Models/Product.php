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


           // $format = $request->format_;
            /*
            try {
                $imagePath = "storage/" . $product->image;

               // $imagePath = str_replace("_croped.webp", $format, $imagePath);
                $image = Image::make($imagePath);
                $image->fit(400, 400, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                });
                $image->encode('webp', 10);
                $webpPath = preg_replace('/\.(jpe?g|png|gif|webp)$/i', '_croped.webp', $imagePath);
                $image->save($webpPath);
                $product->image = str_replace("storage/", "", $webpPath);
                $product->save();
            } catch (Exception $e) {

            }
            */
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
