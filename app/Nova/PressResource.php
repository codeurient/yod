<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Drobee\NovaSluggable\Slug;
use Drobee\NovaSluggable\SluggableText;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class PressResource extends Resource
{
    public static function label() {
        return 'Press';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\PressModel::class;
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
            ID::make(__('ID'), 'id')->hide(),

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



            Heading::make('Основная информация'),
//            Text::make('Название категории', 'category_name'),

            Flexible::make('','category_names')
                ->fullWidth()
                ->addLayout('','category_name',[
                    Text::make('Название категории', 'add_category_name'),

                    Flexible::make('Блок','block')
                        ->fullWidth()
                        ->addLayout('Блок с линком','link_block',[
                            Text::make('Заголовок', 'title'),
                            Date::make('Дата публикации', 'published_at')
                                ->format('DD/MM/YYYY')
                                ->resolveUsing(function ($value) {
                                    return $value;
                                }),
                            MediaLibrary::make('Лого','logo'),
                            MediaLibrary::make('Фото','photo'),
                            Text::make('Линк','link'),
                        ])
                        ->addLayout('Блок с файлом','file_block',[
                            Text::make('Заголовок', 'title'),
                            Date::make('Дата публикации', 'published_at')
                                ->format('DD/MM/YYYY')
                                ->resolveUsing(function ($value) {
                                    return $value;
                                }),
                            MediaLibrary::make('Лого','logo'),
                            MediaLibrary::make('Фото','photo'),
                            MediaLibrary::make('Файл','file')
                        ])
                        ->button('Добавить блок')
                ])
                ->button('Добавить категорию'),




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
