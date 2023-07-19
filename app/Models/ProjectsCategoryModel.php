<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class ProjectsCategoryModel extends Model
{
    use HasFactory,HasTranslations,SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public $translatable = [
        'meta_title',
        'meta_description',
        'category_name',
//        'slug',
    ];

    public function getSlugWithoutTranslate(){
        return parent::getAttributeValue('slug');
    }

    public function projects(){
        return $this->hasMany(ProjectModel::class,'one_category','id');
    }
}
