<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
