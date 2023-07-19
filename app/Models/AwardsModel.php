<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AwardsModel extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'awards',
    ];
}
