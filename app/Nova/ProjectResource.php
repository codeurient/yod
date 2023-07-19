<?php

namespace App\Nova;

use App\Models\ProjectsCategoryModel;
use App\Nova\Rule\SliderValidationRule;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use phpDocumentor\Reflection\Types\Nullable;
use Whitecube\NovaFlexibleContent\Flexible;

class ProjectResource extends Resource
{
    public static function label() {
        return 'Project';
    }
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\ProjectModel::class;
    public static $group = 'Блок страниц «pages»';
    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'project_title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Multilingual::make('Language'),
            ID::make(__('ID'), 'id')->sortable(),

            BelongsToMany::make('Связанные сервисы', 'services', 'App\Nova\OneServiceResource'),
//BelongsTo::make('')
            Boolean::make('Отображать ?','active'),
            Boolean::make('Показывать на главной ?','main_page'),
            Heading::make('Мета теги'),
            Text::make('Мета тег заголовка', 'meta_title')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Мета тег описание', 'meta_description')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'max:255'),

            Heading::make('Open Graph'),
            Text::make('Заголовок статьи', 'og_title')
                ->hideFromIndex(),
            Text::make('Краткое описание', 'og_description')
                ->hideFromIndex(),
            MediaLibrary::make('Картинка', 'og_image')
                ->hideFromIndex(),



            Heading::make('Главный экран'),
            Text::make('Заголовок проекта' , 'project_title')
                ->sortable()
                ->rules('required', 'max:255'),
                Slug::make('Слаг', 'project_slug')
                ->separator('-')
                ->from('project_title')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:project_models,project_slug'),
            Date::make('Дата' , 'project_date')
                ->hideFromIndex()
                ->rules( 'max:255')
                ->nullable(),
            Text::make('Год' , 'project_year')
                ->hideFromIndex()
                ->rules( 'max:255'),
            Text::make('Город, Страна' , 'city_country')
                ->hideFromIndex()
                ->rules( 'max:255'),



            Select::make('Название категории', 'one_category')->options(

                ProjectsCategoryModel::query()
                    ->select('id','category_name->'.App::currentLocale().' as name')
                    ->orderBy('sort_order')
                    ->pluck('name','id')

            )->rules('required')->hideFromIndex(),



            MediaLibrary::make('Фото проекта', 'project_photo')
                ->hideFromIndex()
                ->nullable(),
            MediaLibrary::make('Лого наград', 'logo_awards')
                ->hideFromIndex()
                ->nullable()
                ->array(),

            Heading::make('О проекте'),
            Textarea::make('Описание проекта' , 'project_description')
                ->hideFromIndex(),
            Textarea::make('Описание проекта сокр.' , 'project_description_small')
                ->hideFromIndex(),
            Flexible::make('Характеристика', 'character')
                ->hideFromIndex()
                ->addLayout('Характеристика', 'add_char', [
                    Text::make('Заголовок', 'title_char'),
                    Text::make('Описание', 'description_char'),
                ])->button('Добавить характеристику'),


            Text::make('Заголовок', 'title')->hideFromIndex(),
            Text::make('Линк', 'link')->hideFromIndex(),




            Heading::make('Блок'),
            Flexible::make('Блоки','blocks')
                ->hideFromIndex()
                ->fullWidth()
                ->addLayout('Видео', 'add_video',[
                    MediaLibrary::make('Видео','video_media')
                        ->hideFromIndex(),
                    Boolean::make('YouTube ?','video_youtube_active')
                        ->hideFromIndex(),
                    Text::make('URL YouTube', 'video_youtube')
                        ->hideFromIndex()
                        ->rules( 'max:500'),
                ])
                ->addLayout('2 вертикальных фото', 'vertical_photo',[
                    MediaLibrary::make('Вертикальные фото', 'photo')
                        ->hideFromIndex()
                        ->array()
                        ->rules('required', new SliderValidationRule('Фото',2)),
                ])
                ->addLayout('Заголовок и описание', 'heading_block_1',[
                   Text::make('Заголовок', 'heading')
                        ->rules( 'max:255'),
                   Text::make('Подзаголовок', 'subheading')
                        ->rules( 'max:255'),
                    Textarea::make('Описание', 'description'),
                ])
                ->addLayout('Горизонтальное фото', 'horizontal_photo',[
                    MediaLibrary::make('Фото', 'photo')
                        ->rules('required'),
                ])
                ->addLayout('Текст слева и фото справа', 'heading_block_2',[
                    Text::make('Заголовок', 'heading')
                        ->rules( 'max:255'),
                    Textarea::make('Описание', 'description'),
                    MediaLibrary::make('Фото', 'photo')
                        ->rules('required'),
                ])
                ->addLayout('Большое вертикальное фото', 'large_vertical_photo',[
                    MediaLibrary::make('Фото', 'photo')
                        ->rules('required'),
                ])
                ->addLayout('Текст справа и фото слева', 'heading_block_3',[
                    Text::make('Заголовок', 'heading')
                        ->rules( 'max:255'),
                    Textarea::make('Описание', 'description')
                        ->hideFromIndex(),
                    MediaLibrary::make('Фото', 'photo')
                        ->rules('required'),
                ])
                ->addLayout('2 горизонтальных фото', 'horizontal_photo_2',[
                    MediaLibrary::make('Фото', 'photo')
                        ->array()
                        ->rules('required', new SliderValidationRule('Фото',2)),
                ])
                ->addLayout('4 квадратных фото', 'square_photo_4',[
                    MediaLibrary::make('Фото', 'photo')
                        ->array()
                        ->rules('required', new SliderValidationRule('Фото',4)),
                ])
                ->addLayout('Описание проекта','description',[
                    Textarea::make('Первый абзац', 'descriptionOne')
                        ->rules('required'),
                    Textarea::make('Второй абзац', 'descriptionTwo')
                        ->rules('required'),
                ])
                ->addLayout('Большое квадратное фото', 'big_square_photo',[
                    MediaLibrary::make('Фото', 'photo')
                        ->rules('required'),
                ])
                ->button('Добавить блок'),




        ];



    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
