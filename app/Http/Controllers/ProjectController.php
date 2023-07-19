<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use App\Models\ProjectsCategoryModel;
use App\Services\ProjectCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function project(Request $request)
    {
        $category=ProjectsCategoryModel::query()->where('slug', $request->category_slug)->firstOrFail();

        $data=ProjectModel::query()->where('project_slug',$request->slug)->where('active', 1)->firstOrFail();


        $newData = (new ProjectCategoryService)->getProjectData($data, $category);

        $charData = [];
        foreach ($newData['character'] as $keyChar => $character)
        {
            $charData[$keyChar . '_' . 'char'] = $character['attributes'];
        }
        $newData['character'] = $charData;

        $blocks = [];
        foreach ($newData['blocks'] as $key => $block)
        {
            $blocks[$key . '_' . $block['layout']] = $block['attributes'];
        }
        $newData['blocks'] = $blocks;


        if ($data->one_category == $category->id){
            return response()->json([
                'status'=>'success',
                'data'=>$newData
            ]);
        } else{
            return abort(404);
        }
    }

    public function getAllProjects(){
        $data = [];
        $projects = ProjectModel::query()->where('active', 1)->orderBy('sort_order')->get();
        $service = (new ProjectCategoryService);
        foreach ($projects as $project){
            $oneProject = $service->getAllProjectData($project, false);;
            $res = ProjectsCategoryModel::query()->select('slug')->where('id',$project->one_category)->first();

            if ($res){
                $res = $res->getAttribute('slug');
            }

            $oneProject['category_slug'] = $res;


            $charData = [];
            foreach ($oneProject['character'] as $keyChar => $character)
            {
                $charData[$keyChar . '_' . 'char'] = $character['attributes'];
            }
            $oneProject['character'] = $charData;

            $blocks = [];
            foreach ($oneProject['blocks'] as $key => $block)
            {
                $blocks[$key . '_' . $block['layout']] = $block['attributes'];
            }
            $oneProject['blocks'] = $blocks;

            $data[] = $oneProject;
        }


        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }

    public function getAllProjectList(){
        $data = [];
        $projects = ProjectModel::query()->where('active', 1)->orderBy('sort_order')->get();

        $service = (new ProjectCategoryService);
        $trueProject = [];
        foreach ($projects as $project){
            $oneProject = $service->getAllProjectData($project, false);
            $projectCategory = ProjectsCategoryModel::query()->select('slug','category_name')->where('id',$project->one_category)->first();
            if ($projectCategory){
                $projectCategorySlug = $projectCategory->getAttribute('slug');
                $projectCategoryName = $projectCategory->getAttribute('category_name');
            }
            $oneProject['category_slug'] = $projectCategorySlug;



            $trueProject['main_page'] = $oneProject['main_page'];
            $trueProject['project_slug'] = $oneProject['project_slug'];
            $trueProject['img'] = $oneProject['project_photo'];
            $trueProject['header'] = $oneProject['project_title'];
            $trueProject['city'] = $oneProject['city_country'];
            $trueProject['date'] = $oneProject['project_year'];
            $trueProject['category'] = $projectCategoryName;
            $trueProject['category_slug'] = $projectCategorySlug;
            $data[] = $trueProject;

        }

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }

    public function getOneProject(Request $request){
;
        $project = ProjectModel::query()
            ->with('services', function ($q){
                $q->select(
                    'hero_title',
                    'hero_img',
                    'slug',
                )->orderBy('sort_order');
            })
            ->where('active', 1)->where('project_slug', $request->slug)->firstOrFail();
        $oneProject = $project->getFullData();
//        $service = (new ProjectCategoryService);
//
//            $oneProject = $service->getAllProjectData($project, false);
//
////            $oneProject['category_slug'] = Str::slug($project->category->slug, '_');
//            $oneProject['category_name'] = $project->category->category_name;
//
//            $charData = [];
//            foreach ($oneProject['character'] as $keyChar => $character)
//            {
//                $charData[$keyChar . '_' . 'char'] = $character['attributes'];
//            }
//            $oneProject['character'] = $charData;
//
//            $blocks = [];
//            foreach ($oneProject['blocks'] as $key => $block)
//            {
//                $blocks[$key . '_' . $block['layout']] = $block['attributes'];
//            }
//            $oneProject['blocks'] = $blocks;
//
//            $data[] = $oneProject;

        return response()->json([
            'status'=>'success',
            'data'=>$oneProject
        ]);
    }
}
