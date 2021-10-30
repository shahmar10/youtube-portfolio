<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','status'];

    public function categories(){
        //polymorphic
        return $this->morphToMany(Category::class,'categorizeable');

    }

    public function media () {

        return $this->morphMany(Media::class,'mediable');

    }

    public function getCategoriesIdsAttribute(){  //categories_ids //accessors

        $category_ids = [];

        foreach( $this->categories as $category ){

            $category_ids[] = $category->id;

        }

        return $category_ids;

    }
}
