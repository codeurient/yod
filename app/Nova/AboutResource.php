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

class AboutResource extends Resource
{
    public static function label() {
        return 'About';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\AboutModel::class;
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

            Heading::make('Для мобильной версии'),
            MediaLibrary::make('Фото', 'mobile_photo')->rules('required'),

            Heading::make('Главный экран'),
            MediaLibrary::make('Фото', 'main_photo')->rules('required'),
            Text::make('Заголовок 1', 'main_title')
                ->rules('required', 'max:255'),
            Text::make('Заголовок 2', 'main_title_2')
                ->rules('max:255')->nullable(),
            Text::make('Заголовок 3', 'main_title_3')
                ->rules('max:255')->nullable(),
            Text::make('Позаголовок', 'main_subtitle')
                ->rules('required', 'max:255'),
            Textarea::make('Первое Описание', 'main_description_one')
                ->hideFromIndex()
                ->rules('required'),
            Textarea::make('Второе Описание', 'main_description_two')
                ->hideFromIndex(),
            Text::make('Заголовок', 'char_title')
                ->rules('required', 'max:255'),
            Text::make('Год', 'year')
                ->rules('required', 'max:255'),
            MediaLibrary::make('Фото', 'char_photo')->rules('required'),
            Textarea::make('Подпись к фото', 'char_photo_caption')
                ->hideFromIndex()
                ->rules('required'),


            Heading::make('Сервисы'),
            Textarea::make('Левое описание', 'left_description')
                ->hideFromIndex()
                ->rules('required'),
            Textarea::make('Правое описание', 'right_description')
                ->hideFromIndex()
                ->rules('required'),


            Heading::make('О компании'),
            Text::make('Заголовок 1', 'company_title')
                ->rules('required', 'max:255'),
            Text::make('Заголовок 2', 'company_title_2')
                ->rules('max:255')->nullable(),
            Text::make('Заголовок 3', 'company_title_3')
                ->rules('max:255')->nullable(),
            Text::make('Заголовок 4', 'company_title_4')
                ->rules('max:255')->nullable(),
            Textarea::make('Описание', 'company_description')
                ->hideFromIndex()
                ->rules('required'),

            MediaLibrary::make('Фото', 'first_photo')->rules('required'),
            MediaLibrary::make('Фото', 'second_photo')->rules('required'),

            Heading::make('Фото с описанием'),
            MediaLibrary::make('Фото', 'company_photo')->rules('required'),
            Textarea::make('Подпись к фото', 'company_photo_caption')
                ->hideFromIndex()
                ->rules('required'),


            Heading::make('Команда'),
            Text::make('Заголовок 1', 'comand_title')
                ->rules('required', 'max:255'),
            Text::make('Заголовок 2', 'comand_title_2')
                ->rules('max:255')->nullable(),
            MediaLibrary::make('Фото', 'comand_photo')->rules('required'),
            Textarea::make('Подпись к фото', 'comand_photo_caption')
                ->hideFromIndex()
                ->rules('required'),
            Flexible::make('Слайдер','slider')
                ->hideFromIndex()
                ->fullWidth()
                ->addLayout('Слайдер', 'add_slider',[
                    Textarea::make('Описание ', 'slider_description')
                        ->hideFromIndex()
                        ->rules('required'),
                    MediaLibrary::make('Фото','slider_photo')->rules('required'),
                    Text::make('Подпись к фото ', 'caption_photo')
                ])
                ->button('Добавить слайдер'),
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
