<?php

namespace App\Nova;

use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class MenuResource extends Resource
{
    public static function label() {
        return 'Menu';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\MenuModel::class;
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


            Flexible::make('Социальные сети', 'social')
                ->addLayout('Социальная сеть', 'onesocial', [
                    Text::make('Названия', 'social_name')
                        ->rules('required', 'max:255'),
                    Text::make('Url', 'url')
                        ->rules('required', 'max:255'),
                ])->button('Добавить соцсетей'),

            Text::make('Номер телефона', 'phone')
                ->rules('required', 'max:255'),
            Text::make('Email', 'email')
                ->rules('required', 'max:255'),

            Flexible::make('Пункты меню', 'menu_items')
            ->addLayout('Один пункт меню', 'one_menu_item', [
                Text::make('Название пункта меню', 'menu_item_title'),
                Select::make('Страница', 'page')->searchable()
                    ->options([
                        '/about' => '/about',
                        '/services' => '/services',
                        '/projects' => '/projects',
                        '/awards' => '/awards',
                        '/partners' => '/partners',
                        '/press' => '/press',
                        '/contacts' => '/contacts',
                ])->displayUsingLabels()
            ])->button('Добавить пункт меню')

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
