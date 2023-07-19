<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class MainResource extends Resource
{
    public static function label() {
        return 'Main';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\MainModel::class;
    public static $group = 'Блок страниц «pages»';
    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
            Text::make('Заголовок 1', 'main_title')
                ->rules('required', 'max:255'),
            Text::make('Заголовок 2', 'main_title_2')
                ->rules('max:255'),
            Text::make('Заголовок 3', 'main_title_3')
                ->rules('max:255'),
            Text::make('Текстовое поле scroll down', 'scroll_down_text_field')
                ->rules('required', 'max:255'),

            Heading::make('Проекты'),
            Text::make('Заголовок проекта', 'project_title')
                ->rules('required', 'max:255'),


            Heading::make('О компании'),
            MediaLibrary::make('Фото о компании','company_photo')
                ->rules('required')
                ->hideFromIndex(),
            Text::make('Заголовок о компании', 'company_title')
                ->hideFromIndex()
                ->rules('required', 'max:255'),
            Text::make('Подзаголовок о компании', 'company_subtitle')
                ->hideFromIndex()
                ->rules('required', 'max:255'),
            Textarea::make('Описание компании', 'company_description')
                ->hideFromIndex()
                ->rules('required'),

            Heading::make('Фото с описанием о компании'),
            MediaLibrary::make('Фото','photo')
                ->rules('required'),
            Textarea::make('Подпись к фото', 'caption_to_photo')
                ->rules('required'),

            /*Flexible::make('Фото с описанием','photo_with_caption')
                ->hideFromIndex()
                ->fullWidth()
                ->addLayout('Фото с описанием', 'photo_caption',[
                    MediaLibrary::make('Фото','photo')
                        ->rules('required'),
                    Trix::make('Подпись к фото', 'caption_to')
                        ->rules('required'),
                ])
                ->button('Добавить фото с описанием'),*/


            Heading::make('Пресса'),
            Text::make('Заголовок пресса', 'main_press_title')
                ->hideFromIndex()
                ->rules('required', 'max:255'),
            Text::make('Подзаголовок пресса', 'main_press_subtitle')
                ->hideFromIndex()
                ->rules('required', 'max:255'),
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
