<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PressModel extends Model
{
    use HasFactory,HasTranslations;

    //Casts of the model dates
    protected $casts = [
        'published_at' => 'date',
    ];

    public $translatable = [
        'meta_title',
        'meta_description',

        'og_title',
        'og_description',


        'category_names',
    ];


}
