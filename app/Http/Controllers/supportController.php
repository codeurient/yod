<?php
/*
namespace App\Http\Controllers;

use App\Models\PartnersModel;
use App\Models\PressModel;
use App\Models\ProjectModel;
use App\Models\SearchActiveModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use phpseclib3\File\ASN1\Maps\Attribute;

class SearchActiveController extends Controller
{
    public function searchactive()
    {
        $data=SearchActiveModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }

    public function search_text(Request $request)
    {
        $search = $request->search;

        $searched_project = ProjectModel::query()
            ->select('project_slug->'.App::currentLocale().' as slug','project_title->'.App::currentLocale().' as title')
            ->where('project_title->'.App::currentLocale(), 'LIKE', "%{$search}%")
            ->where('active', 1)
            ->get();

        $searched_press = PressModel::query()
            ->select('title->'.App::currentLocale().' as title_name')
            ->where('title->'.App::currentLocale(), 'LIKE', "%{$search}%")
            ->get();

        $searched_partners = PartnersModel::query()
            ->select('title->'.App::currentLocale().' as title_name')
            ->where('title->'.App::currentLocale(), 'LIKE', "%{$search}%")
            ->get();

        $searched_service = ServiceModel::query()
            ->select('title->'.App::currentLocale().' as service_title')
            ->where('title->'.App::currentLocale(), 'LIKE', "%{$search}%")
            ->get();

        $photos = [];

        if (!(count($searched_project) > 0 || count($searched_press) > 0 || count($searched_partners) > 0 || count($searched_service) > 0))
        {
            $randomphoto = ProjectModel::query()
                ->select('project_photo')
                ->inRandomOrder()
                ->limit(8)
                ->get();
            foreach ($randomphoto as $item)
            {
                $photos[] = $this->getMedia($item['project_photo']);
            }
        }

        return response()->json([
            'status'=>'success',
            'data'=>[
                'searched_projects'=>$searched_project,
                'searched_press'=>$searched_press,
                'searched_partners'=>$searched_partners,
                'searched_service'=>$searched_service,
                'random'=>$photos
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
