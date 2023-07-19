<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactsModel extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'meta_title',
        'meta_description',

        'og_title',
        'og_description',

        'client_title',
        'client_email_one',
        'client_email_two',
        'client_phone',

        'press_title',
        'press_email',
        'press_phone',

        ];
}
