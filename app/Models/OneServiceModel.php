<?php

namespace App\Models;

use Spatie\EloquentSortable\SortableTrait;
use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\EloquentSortable\Sortable;
use Spatie\Translatable\HasTranslations;

class OneServiceModel extends Model implements Sortable
{
    use HasFactory, HasTranslations, SortableTrait, TranslateAndConvertMediaUrl;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public $fillable = [
        'active',
        'service_model_id',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
        'hero_img',
        'hero_title',
        'slug',
        'hero_sub_title',
        'hero_field_1',
        'hero_field_2',
        'about_big_image',
        'about_small_image',
        'about_top_title',
        'about_top_under_title',
        'about_description',
        "about_bottom_title_1",
        "about_bottom_title_2",
        "about_bottom_title_3",
        'about_bottom_title_mob_1',
        'about_bottom_title_mob_2',
        'about_bottom_title_mob_3',
        'about_bottom_title_mob_4',
        'about_bottom_title_mob_5',
        'about_bottom_title_mob_6',
        'about_specifications',
        'stages',
        'circle_title',
        'circle_description',
        'circle_specifications',
        'projects_title',
        'projects_under_title',
        'sort_order',
    ];

    public $translatable = [
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',

        'hero_title',
        'hero_sub_title',
        'hero_field_1',
        'hero_field_2',

        'about_top_title',
        'about_top_under_title',
        'about_description',
        "about_bottom_title_1",
        "about_bottom_title_2",
        "about_bottom_title_3",
        'about_bottom_title_mob_1',
        'about_bottom_title_mob_2',
        'about_bottom_title_mob_3',
        'about_bottom_title_mob_4',
        'about_bottom_title_mob_5',
        'about_bottom_title_mob_6',
        'about_specifications',
        'stages',
        'circle_title',
        'circle_description',
        'circle_specifications',
        'projects_title',
        'projects_under_title',
    ];

    public $mediaToUrl = [
        'og_image',
        'hero_img',
        'about_big_image',
        'about_small_image',
        'image',
        'stages',

    ];

    public function serviceModel(){
        return $this->belongsTo(ServiceModel::class);
    }

    public function projects(){
        return $this->belongsToMany(ProjectModel::class, 'one_service_model_project_model', 'service_id', 'project_id');
    }

    public function normalizeData($object)
    {
        self::getNormalizedField($object, 'about_specifications', 'title', true, true);
        self::getNormalizedField($object, 'stages', 'title', true, true);
        self::getNormalizedField($object, 'circle_specifications', 'title', true, true);
        return $object;
    }

    public function getFullData()
    {
        try {
            $data = $this->getAllWithMediaUrlWithout(['created_at', 'updated_at']);
            return $this->normalizeData($data);
        } catch (\Exception $ex) {
            throw new ModelNotFoundException();
        }
    }
}
