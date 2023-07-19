<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class AwardsResource extends Resource
{
    public static function label() {
        return 'Awards';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\AwardsModel::class;
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


//            Heading::make('Главный экран'),
            /*            Text::make('Год', 'awards_year')
                            ->rules('required', 'max:255'),
                        Text::make('Заголовок', 'awards_title')
                            ->rules('required', 'max:255'),
                        MediaLibrary::make('Лого', 'awards_logo'),*/



//            Heading::make('Награды'),
//            MediaLibrary::make('Фото награды', 'awards_photo'),
//
//            Trix::make('Описание', 'awards_description'),
//
//            Flexible::make('Характеристика','characteristic')
//                ->addLayout('Характеристика', 'add_characteristic',[
//                    Text::make('Название', 'field_name')
//                        ->hideFromIndex()
//                        ->rules( 'max:500'),
//                ])->button('Добавить характеристику'),


            Heading::make('Награды'),
            Flexible::make('','awards')
                ->fullWidth()
//                ->addLayout('Награда', 'add_awards',[
//                    Text::make('Год', 'awards_year')
//                        ->rules('required', 'max:255'),
//
//                    Flexible::make('','blocks')
//                        ->fullWidth()
//                        ->addLayout('Блок с линком','block',[
//                            Text::make('Заголовок', 'awards_title')
//                                ->rules('required', 'max:255'),
//                            MediaLibrary::make('Лого', 'awards_logo'),
//                            Heading::make('Pop-up'),
//                            MediaLibrary::make('Фото награды', 'awards_photo'),
//
//                            Trix::make('Описание', 'awards_description'),
//
//                            Flexible::make('','texts')
//                                ->fullWidth()
//                                ->addLayout('Текст', 'add_text',[
//                                    Text::make('Текст', 'text')
//                                        ->hideFromIndex(),
//                                ])->button('Добавить текст'),
//
//                        ])
//                        ->button('Добавить блок награды')
//                ])->button('Добавить награду'),


                ->addLayout('Награда', 'award',[
                    MediaLibrary::make('Лого награды', 'logo'),
                    MediaLibrary::make('Фото награды', 'img'),
                    Textarea::make('Описание фото', 'imgDescription')
                        ->rules('required', 'max:2000'),
                    Select::make('Категория', 'category')->searchable()->options([
                        '2000' => '2000',
                        '2001' => '2001',
                        '2002' => '2002',
                        '2003' => '2003',
                        '2004' => '2004',
                        '2005' => '2005',
                        '2006' => '2006',
                        '2007' => '2007',
                        '2008' => '2008',
                        '2009' => '2009',
                        '2010' => '2010',
                        '2011' => '2011',
                        '2012' => '2012',
                        '2013' => '2013',
                        '2014' => '2014',
                        '2015' => '2015',
                        '2016' => '2016',
                        '2017' => '2017',
                        '2018' => '2018',
                        '2019' => '2019',
                        '2020' => '2020',
                        '2021' => '2021',
                        '2022' => '2022',
                        '2023' => '2023',
                        '2024' => '2024',
                        '2025' => '2025',
                        '2026' => '2026',
                        '2027' => '2027',
                        '2028' => '2028',
                        '2029' => '2029',
                        '2030' => '2030',
                        '2031' => '2031',
                        '2032' => '2032',
                        '2033' => '2033',
                        '2034' => '2034',
                        '2035' => '2035',
                        '2036' => '2036',
                    ]),
                    Text::make('Название', 'name')
                        ->rules('required', 'max:255'),
                    Flexible::make('Характеристики','options')
                        ->fullWidth()
                        ->addLayout('Характеристика','option',[
                            Text::make('Название характеристики', 'title'),
                            Text::make('Значение характеристики', 'value')
                        ])->button('Добавить характеристику'),
                ])->button('Добавить награду'),

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
