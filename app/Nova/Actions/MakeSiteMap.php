<?php

namespace App\Nova\Actions;

use App\Jobs\CreateSiteMap;
use Brightspot\Nova\Tools\DetachedActions\DetachedAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;

class MakeSiteMap extends DetachedAction
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Get the displayable label of the button.
     *
     * @return string
     */
    public function label()
    {
        return __('Create Sitemap');
    }

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @return mixed
     */
    public function handle(ActionFields $fields)
    {
        CreateSiteMap::dispatch($fields->url);

        if (env('QUEUE_CONNECTION') == 'database'){
            return Action::message('Задача поставлена в очередь!');
        } else {
            return Action::message('Sitemap создан!');
        }

    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
//            Text::make('Url')->rules('required', 'url'),
        ];
    }
}
