<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page404Model extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'title_2',
        'title_3',
        ];
}
