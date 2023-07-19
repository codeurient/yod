<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutModel extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'meta_title',
        'meta_description',

        'og_title',
        'og_description',


        'main_title',
        'main_title_2',
        'main_title_3',
        'main_subtitle',
        'main_description_one',
        'main_description_two',
        'char_title',
        'year',
        'char_photo_caption',



        'left_description',
        'right_description',


        'company_title',
        'company_title_2',
        'company_title_3',
        'company_title_4',
        'company_description',
        'company_photo_caption',


        'comand_title',
        'comand_title_2',
        'comand_photo_caption',
        'slider',

    ];
}



