<?php

namespace App\Http\Controllers;

use App\Models\OneServiceModel;
use App\Models\PartnersModel;
use App\Models\PressModel;
use App\Models\ProjectModel;
use App\Models\ProjectsCategoryModel;
use App\Models\SearchActiveModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpseclib3\File\ASN1\Maps\Attribute;

class SearchActiveController extends Controller
{
    public function searchactive()
    {
        $data = SearchActiveModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function search_text(Request $request)
    {
        $searchForProject = mb_strtoupper($request->post('search'));
        $search = $request->post('search');

        // ProjectModel
        $categories = [];
        $searched_project = ProjectModel::query()
            ->select(
                'project_slug as slug',
                'project_title->' . App::currentLocale() . ' as titlee',
                'city_country->' . App::currentLocale() . ' as city',
                'project_year->' . App::currentLocale() . ' as year',
                'project_photo as photo',
                'one_category')
//            ->where('project_title->' . App::currentLocale(), 'LIKE', "%{$search}%")
//            ->whereRaw("UPPER('titlee') LIKE '%{$search}%'")
            ->whereRaw('UPPER(json_unquote(json_extract(`project_title`, \'$."' . App::currentLocale() . '"\'))) like "%' . $searchForProject . '%"')
            ->where('active', 1)
            ->get();
//        dd($searched_project);
//        $filteredProjects = $searched_project->filter(function($value, $key) use ($search){
//            return (strpos(mb_strtoupper($value->titlee),mb_strtoupper($search)) !== false);
//        });

        foreach ($searched_project as $project) {
//            dd($project->titlee);
            $categories[] = $project['one_category'];
            $project['slug'] = Str::slug($project['slug'], '_');
            $project['photo'] = $this->getMedia($project['photo']);
        }


        // ProjectsCategoryModel
        $categoriesNew = [];
        $categories = ProjectsCategoryModel::query()
            ->select('id', 'category_name', 'slug')
            ->whereIn('id', array_unique($categories))
            ->orderBy('sort_order')
            ->get();
        foreach ($categories as $key => $value) {
            $categoriesNew[$key]['id'] = $categories[$key]->id;
//            $categoriesNew[$key]['slug'] = Str::slug($categories[$key]->slug, '_');
            $categoriesNew[$key]['slug'] = $categories[$key]->slug;
            $categoriesNew[$key]['category_name'] = $categories[$key]->category_name;
        }
        unset($key, $value);


        // PressModel
        $press_blocks = [];
        $searched_press = [];
//        $searched_press = PressModel::query()
//            ->select('id',
//                             'category_names->'.App::currentLocale() .'->key',
//                             'category_names->'.App::currentLocale(),
//
//
//                    )
//            ->where('category_names', 'LIKE', "%{$search}%")
//
//            ->get();
//dd($searched_press);
//        foreach ($searched_press as $keyBlock => $press)
//        {
//            $press_block = [];
//            $block = current(json_decode($press->blocks,true));
//
//
//            switch ($block['layout'])
//            {
//                case 'link_block':
//                    $press_block ['link'] = $block['attributes']['link'];
//                    $press_block ['photo'] = $this->getMedia($block['attributes']['photo']);
//                    break;
//                case 'file_block':
//                    $press_block ['link'] = $this->getMedia($block['attributes']['file']);
//                    $press_block ['photo'] = $this->getMedia($block['attributes']['photo']);
//                    break;
//            }
//            $press_blocks[$keyBlock]['id'] = $press->id;
//            $press_blocks[$keyBlock]['title'] = $press->title_name;
//            $press_blocks[$keyBlock]['category_name'] = $press->name;
//            $press_blocks[$keyBlock]['link'] = $press_block ['link'];
//            $press_blocks[$keyBlock]['photo'] = $press_block ['photo'];
//        }
//        unset($keyBlock,$press);


//        // PartnersModel
        $partners_blocks = [];
        $searched_partners = [];
//        $searched_partners = PartnersModel::query();
//            ->select('id',
//                             'title->'.App::currentLocale().' as title_name',
//                             'category_name->'.App::currentLocale().' as name',
//                             'block->'.App::currentLocale().' as blocks')
//            ->where('title->'.App::currentLocale(), 'LIKE', "%{$search}%")
//            ->get();
//        foreach ($searched_partners as $keyBlock => $partners)
//        {
//            $partner_block = [];
//            $block = current(json_decode($partners->blocks,true));
//
//            switch ($block['layout'])
//            {
//                case 'link_block':
//                    $partner_block ['link'] = $block['attributes']['link'];
//                    $partner_block ['photo'] = $this->getMedia($block['attributes']['photo']);
//                    break;
//                case 'file_block':
//                    $partner_block ['link'] = $this->getMedia($block['attributes']['file']);
//                    $partner_block ['photo'] = $this->getMedia($block['attributes']['photo']);
//                    break;
//            }
//            $partners_blocks[$keyBlock]['id'] = $partners->id;
//            $partners_blocks[$keyBlock]['title'] = $partners->title_name;
//            $partners_blocks[$keyBlock]['category_name'] = $partners->name;
//            $partners_blocks[$keyBlock]['link'] = $partner_block ['link'];
//            $partners_blocks[$keyBlock]['photo'] = $partner_block ['photo'];
//        }
//        unset($keyBlock,$partners);


        /*        // ServiceModel
                $searched_service = ServiceModel::query()
                    ->select('title->'.App::currentLocale().' as service_title')
                    ->where('title->'.App::currentLocale(), 'LIKE', "%{$search}%")
                    ->get();*/


        // ServiceModel
        $searched_service = OneServiceModel::query()
            ->select('id',
                'hero_title',
                'slug',
                'hero_img',
            )
            ->where('hero_title', 'LIKE', "%{$search}%")
            ->get();
        $service_block = [];
        foreach ($searched_service as $keyBlock => $service) {
            $service_block[] = $service->getFullData();
        }


        $randomProject = [];
        if (!(count($searched_project) > 0 || count($searched_press) > 0 || count($searched_partners) > 0 || count($searched_service) > 0)) {
            $randomphoto = ProjectModel::query()
                ->select('project_photo', 'project_slug', 'project_title')
                ->where('active', 1)
                ->inRandomOrder()
                ->limit(8)
                ->get();

            foreach ($randomphoto as $item) {

                $randomProject[] = $item->getFullData();
//                $photos[] = $this->getMedia($item['project_photo']);
            }
        }
        return response()->json([
            'status' => 'success',
            'data' => [
                'searched_projects' => $searched_project,
                'projects_categories' => $categoriesNew,
//                'searched_press'=>$press_blocks,
//                'searched_partners'=>$partners_blocks,
                'searched_service' => $service_block,
//                'searched_service'=>$searched_service,
                'random' => $randomProject,
                //'searched_projects_category' => $searched_projects_category
            ]
        ]);
    }
}




/*
 *
 *
//        dd(PressModel::query()->select('block->'.App::currentLocale().' as name')->where('block->uk->attributes->title', 'LIKE', "%ук%")->dd()->get());
//        dd(PressModel::query()->select('block->'.App::currentLocale().' as name')->where('block->uk->[0]->attributes->title', 'LIKE', "%ук%")->get());
        $searched_press = PressModel::query()->whereJsonContains('block->'.App::currentLocale(),[0=>['attributes'=>['title'=>"%{$search}%"]]])
            ->select('category_name->'.App::currentLocale().' as name', 'block->'.App::currentLocale().' as block')
//            ->where('category_name->'.App::currentLocale(), 'LIKE', "%{$search}%")
//            ->where('block->'.App::currentLocale(), 'LIKE', "%{$search}%")
            ->get();
        dd($searched_press);


 * */
