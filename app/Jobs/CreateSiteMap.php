<?php

namespace App\Jobs;

use App\Http\Controllers\SeoController;
use App\Models\AboutModel;
use App\Models\ProjectModel;
use App\Models\Sitemap;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap as SpatieSitemap;
use Spatie\Sitemap\Tags\Url;


class CreateSiteMap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = Storage::path('sitemap.xml');

//        SitemapGenerator::create(url('https://yod-front.wn.staj.fun/'))
//            ->configureCrawler(function (Crawler $crawler) {
//                $crawler->ignoreRobots()
//                    ->setConcurrency(1)
//                    ->setTotalCrawlLimit(1)
//                    ->acceptNofollowLinks()
//                    ->setMaximumResponseSize( 1024 * 1024 * 10000 )
//                    ->setDelayBetweenRequests(10000)
//                ->setCurrentCrawlLimit(10)
//                    ->setMaximumDepth(5)
//                ->setParseableMimeTypes(['text/html', 'text/plain']);
//            })
//
//            ->getSitemap()
        SpatieSitemap::create()

            ->add(Url::create('http://yod.dev-onfire.work')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/about')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/services')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/projects')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/awards')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/partners')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/press')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/contacts')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/droprequest')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/services/design-project')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/services/creating-concept')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/services/architectural-concept')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/services/corporate-identity')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/services/project-management')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/services/consulting')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/mad_bars_house')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/salobie')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/buddha-bar-new-york')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/dot-coffee-station-1')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/gost')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/deep-bar')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/samna')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/china-ma')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/spicy-no-spicy')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/nam-modern-vietnamese-cuisine')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/office-sd-capital')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/studio_yod_group')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/365_nail_studio')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/bao-restaurant')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

            ->add(Url::create('http://yod.dev-onfire.work/project/fyva')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.2))

//            ->add(ProjectModel::query()->get('project_slug')->toArray())



            ->writeToFile($path);

        $m = Sitemap::query()->firstOrCreate(['sitemap' => 'sitemap.xml']);
        if ($m->count() < 1) {
            $m->Create(['sitemap' => 'sitemap.xml']);
        } else {
            $m->touch();
        }
    }
}
