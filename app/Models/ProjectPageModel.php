<?php

namespace App\Models;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class ProjectPageModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image'
    ];

    public $translatable = [
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
    ];

    public $mediaToUrl = [
        'og_image'
    ];

    public static function normalizeData($object)
    {
        return $object;
    }

    public function getFullData()
    {
        try {

            $data = $this->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
            $data['og_image'] = url($data['og_image']);
            return self::normalizeData($data);

        } catch (\Exception $ex) {
            throw new ModelNotFoundException();
        }

    }
}
