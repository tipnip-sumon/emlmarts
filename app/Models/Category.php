<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Scopes\CategoryScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// #[scopedBy([CategoryScope::class])]
class Category extends Model
{
    use HasFactory;
    // use HasUuids;
    // use HasUlids;
    // protected $table = "category_table";
    // protected $primaryKey = "category_id";
    // public $timestamps = false;
    // public $incrementing = false;
    // protected $keyType = "string";
    // protected $dataFormate = 'U';
    // const CREATED_AT = "creation_data";
    // const UPDATED_AT = "updated_data";
    // protected $attributes = [
    //     "name"=> "Sumon",
    // ] ;
    // protected $connection = "sqlite";
    // protected function setCategorySlugAttibute($value)
    // {
    //     $this->attributes['category_slug'] = Str::slug($value);
    // }
    protected function categorySlug(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::slug($value)   //Mutator
        );
    }
    protected static function booted() : void
    {
        static::addGlobalScope(new CategoryScope); //Global Scope II
        // static::addGlobalScope('category',function(Builder $builder){
        //     $builder->where('status',1); //Global Scope I
        // });
    }
    
}
