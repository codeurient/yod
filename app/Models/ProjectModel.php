<?php

namespace App\Models;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class ProjectModel extends Model implements Sortable
{
    use HasFactory,HasTranslations,SortableTrait,TranslateAndConvertMediaUrl;

    protected $casts =[
        'project_date' => 'date',
        'logo_awards' => 'array',
        'vertical_photo' => 'array',
    ];
    public $translatable = [
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'project_title',
        'category_slug',
        'project_year',
        'city_country',
        'project_description',
        'project_description_small',
        'character',
        'title',
        'link',
        'blocks',
    ];
    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public $mediaToUrl = [
        'project_photo',
        'og_image',
        'blocks',
        'video_media',
        'photo',
//        'logo_awards',
    ];

   public function category(){
        return $this->belongsTo(ProjectsCategoryModel::class,'one_category','id');
    }

    public function services(){
       return $this->belongsToMany(OneServiceModel::class,'one_service_model_project_model','project_id','service_id');
    }

//    public function getSlugWithoutTranslate(){
//        return parent::getAttributeValue('project_slug');
//    }

    public static function normalizeData($object)
    {
        self::getNormalizedField($object, 'character', 'title_char', true, true);
        self::getNormalizedField($object, 'blocks', 'title_char', true, true, true);



//        $object['logo_awards'] =
        return $object;
    }

    public function getFullData()
    {
        try {

            $data = $this->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//            $data['project_slug'] = Str::slug($data['project_slug'], '_');
            if (array_key_exists('logo_awards', $data)){
                $data['logo_awards'] = $this->getManyMedia($data['logo_awards']);
            }
            return self::normalizeData($data);

        } catch (\Exception $ex) {
            throw new ModelNotFoundException();
        }

    }
}
