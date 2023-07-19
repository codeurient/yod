<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClientsPopupModel extends Model
{
    use HasFactory, HasTranslations;


    public $translatable = [
        'meta_title',
        'meta_description',

        'name',
        'phone',
        'email',
        'city',
        'message',
    ];

    protected $casts = [
        "created_at" => 'datetime'
    ];

    public $fillable = [
        'meta_title',
        'meta_description',

        'name',
        'phone',
        'email',
        'city',
        'message',
    ];
}
