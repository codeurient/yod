<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MainModel extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = [
        'meta_title',
        'meta_description',

        'og_title',
        'og_description',


        'main_title',
        'main_title_2',
        'main_title_3',
//        'main_text',
        'project_title',
        'scroll_down_text_field',
        'company_title',
        'company_subtitle',
        'company_description',

        'caption_to_photo',

        //'photo_with_caption',

        'main_press_title',
        'main_press_subtitle',
    ];
}
