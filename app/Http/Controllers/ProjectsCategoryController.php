<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use App\Models\ProjectsCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ProjectsCategoryController extends Controller
{
    public function projectscategory(Request $request)
    {
        $data=ProjectsCategoryModel::query()->where('slug->'.App::currentLocale(),$request->category_slug)->firstOrFail();

        $projects=ProjectModel::query()
            ->where('one_category', $data->id)
            ->where('active', 1)
            ->get();

        $newProjects = [];
        foreach ($projects as $key => $project) {
            $newProjects[$key] = (new \App\Services\ProjectCategoryService)->getAllProjectData($project);
        }

        $newData = $this->translateModelWithoutIdAndTime($data);
        $newData['slug'] = $data->getSlugWithoutTranslate();
        return response()->json([
            'status'=>'success',
            'data'=>$newData,
            'projects'=>$newProjects
        ]);
    }




// projectscategoryall

    public function allProjectCategory(){
        $results = ProjectsCategoryModel::query()
            ->select('id','category_name','slug')
            ->withCount([
                'projects' => function($query){
                    $query->where('active',1);
                }
            ])
            ->orderBy('sort_order')
            ->get();
//        dd($results);
        $data = null;
        if($results !== null){
            $count = 0;
            foreach ($results as $key => $result){
//                dump(DB::table('projects')->where('category',$result->name_category)->first());
                if (DB::table('project_models')->where('one_category',$result->id)->first() !== null){
                    $data[$count]['id'] = $result->id;
                    $data[$count]['category_name'] = $result->category_name;
                    $data[$count]['slug'] = $result->slug;
                    $data[$count]['projects_count'] = $result->projects_count;
                    $count++;
                }
            }
        }
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }


}
