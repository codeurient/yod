<?php

namespace App\Nova;

use App\Models\OneServiceModel;
use App\Models\ServiceModel;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use SLASH2NL\NovaBackButton\NovaBackButton;
use Whitecube\NovaFlexibleContent\Flexible;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class OneServiceResource extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = OneServiceModel::class;
    public static $group = 'Service Page';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'hero_title';

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
            ID::make(__('ID'), 'id')->sortable(),
            Multilingual::make('Language'),

            BelongsToMany::make('Связанные проекты', 'projects', 'App\Nova\ProjectResource'),

            Boolean::make('Отображать ?','active')->hideFromIndex(),

            Heading::make('Мета теги'),
            Text::make('Мета заголовка', 'meta_title')
                ->hideFromIndex()
                ->rules('max:255'),
            Text::make('Мета описание', 'meta_description')
                ->hideFromIndex()
                ->rules('max:255'),

            Heading::make('Open Graph'),
            Text::make('Заголовок', 'og_title')
                ->hideFromIndex(),
            Text::make('Краткое описание', 'og_description')
                ->hideFromIndex(),
            MediaLibrary::make('Картинка', 'og_image')
                ->hideFromIndex(),

            Heading::make('Главный экран'),
            MediaLibrary::make('Фото', 'hero_img'),
            Text::make('Заголовок', 'hero_title'),
            Slug::make('Слаг', 'slug')->from('hero_title')
            ->separator('-'),
            Text::make('Подзаголовок', 'hero_sub_title')->hideFromIndex(),
            Text::make('Поле 1', 'hero_field_1')->hideFromIndex(),
            Text::make('Поле 2', 'hero_field_2')->hideFromIndex(),

            Heading::make('Об услуге'),
            MediaLibrary::make('Большое фото', 'about_big_image')->hideFromIndex(),
            MediaLibrary::make('Маленькое фото', 'about_small_image')->hideFromIndex(),
            Text::make('Заголовок вверху', 'about_top_title')->hideFromIndex(),
            Text::make('Подзаголовок', 'about_top_under_title')->hideFromIndex(),
            Textarea::make('Описание', 'about_description')->hideFromIndex(),
            Text::make('Заголовок внизу 1(десктоп)', 'about_bottom_title_1')->hideFromIndex(),
            Text::make('Заголовок внизу 2(десктоп)', 'about_bottom_title_2')->hideFromIndex(),
            Text::make('Заголовок внизу 3(десктоп)', 'about_bottom_title_3')->hideFromIndex(),

            Text::make('Заголовок внизу 1(мобайл)', 'about_bottom_title_mob_1')->hideFromIndex(),
            Text::make('Заголовок внизу 2(мобайл)', 'about_bottom_title_mob_2')->hideFromIndex(),
            Text::make('Заголовок внизу 3(мобайл)', 'about_bottom_title_mob_3')->hideFromIndex(),
            Text::make('Заголовок внизу 4(мобайл)', 'about_bottom_title_mob_4')->hideFromIndex(),
            Text::make('Заголовок внизу 5(мобайл)', 'about_bottom_title_mob_5')->hideFromIndex(),
            Text::make('Заголовок внизу 6(мобайл)', 'about_bottom_title_mob_6')->hideFromIndex(),

            Flexible::make('Характеристики', 'about_specifications')->hideFromIndex()
                ->addLayout('Характеристика', 'specification', [
                    Text::make('Заголовок', 'title'),
                    Text::make('Описание', 'description'),
                ]),

            Flexible::make('Этапы', 'stages')->hideFromIndex()
                ->addLayout('Этап', 'stage', [
                    MediaLibrary::make('Фото', 'image'),
                    Text::make('Заголовок', 'title'),
                    Text::make('Описание', 'description'),
                ]),

            Heading::make('Круги'),
            Text::make('Заголовок', 'circle_title')->hideFromIndex(),
            Text::make('Описание', 'circle_description')->hideFromIndex(),
            Flexible::make('Характеристики', 'circle_specifications')->hideFromIndex()
                ->addLayout('Характеристика', 'circle_specification', [
                    Text::make('Заголовок', 'title'),
                    Text::make('Описание', 'description'),
                ]),

            Heading::make('Проекты'),
            Text::make('Заголовок', 'projects_title')->hideFromIndex(),
            Text::make('Подзаголовок', 'projects_under_title')->hideFromIndex(),
            BelongsTo::make('Привязать к странице', 'serviceModel', 'App\Nova\ServiceResource')->withMeta([
                'belongsToId' => ServiceModel::query()->firstOrFail('id')->pluck('id'),
            ])->hideFromIndex()->hideWhenUpdating(),
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
        return [
            (new NovaBackButton())
               ->onlyOnDetail()
        ];
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
        return [
            Actions\Duplicate::make(),
        ];
    }
}
