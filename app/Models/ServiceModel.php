<?php

namespace App\Models;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class ServiceModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    public $translatable = [
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'title',
        'title_for_mob_1',
        'title_fir_mob_2',
        'sub_title_mob',
        'description_mob',
    ];

    public $mediaToUrl = [
        'og_image',
        'mob_image',
    ];

    public function oneService(){
        return $this->hasMany(OneServiceModel::class);
    }

    public static function normalizeData($object)
    {
        return $object;
    }

    public function getFullData()
    {
        try {
            $data = $this->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
            return self::normalizeData($data);
        } catch (\Exception $ex) {
            throw new ModelNotFoundException();
        }
    }
}
