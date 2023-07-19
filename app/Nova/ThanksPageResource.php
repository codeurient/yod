<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ThanksPageResource extends Resource
{
    public static function label() {
        return 'ThanksPage';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\ThanksPageModel::class;
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

//            Heading::make('Мета теги'),
//            Text::make('Мета тег заголовка', 'meta_title')
//                ->hideFromIndex()
//                ->sortable()
//                ->rules('required', 'max:255'),
//            Text::make('Мета тег описание', 'meta_description')
//                ->hideFromIndex()
//                ->sortable()
//                ->rules('required', 'max:255'),

//            Heading::make('Open Graph'),
//            Text::make('Заголовок статьи', 'og_title')
//                ->hideFromIndex(),
//            Text::make('Краткое описание', 'og_description')
//                ->hideFromIndex(),
//            MediaLibrary::make('Картинка', 'og_image')
//                ->hideFromIndex(),


            Heading::make('Основная информация'),
            Text::make('Заголовок','title')
                ->rules('required', 'max:255'),
            Text::make('Подзаголовок','sub_title')
                ->rules('required', 'max:255'),
            MediaLibrary::make('Видео','video'),
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
