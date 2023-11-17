<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TCG\Voyager\Traits\Translatable;


class ProductCategory extends Model
{
    use Translatable;

    protected $translatable = ['name'];

    public function product_count()
    {
        return Product::where("category_id", $this->id)->get()->count();
        //return $this->hasMany(Product::class, "category_id", "id")->count();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::replace('%', "_", $category->name);
            $category->slug = Str::replace(' ', "_", $category->slug);
            $category->slug = Str::replace('&', "_", $category->slug);
            $category->slug = Str::replace(';', "", $category->slug);
            $category->slug = Str::replace('(', "_", $category->slug);
            $category->slug = Str::replace(')', "_", $category->slug);

        });

        static::updating(function ($category) {
            $category->slug = Str::replace('%', "_", $category->name);
            $category->slug = Str::replace(' ', "_", $category->slug);
            $category->slug = Str::replace('&', "_", $category->slug);
            $category->slug = Str::replace(';', "", $category->slug);
            $category->slug = Str::replace('(', "_", $category->slug);
            $category->slug = Str::replace(')', "_", $category->slug);
        });
    }
}
