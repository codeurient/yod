<?php

namespace App\Http\Controllers;

use App\Models\OneServiceModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service()
    {
        $data = ServiceModel::query()
        ->with('oneService', function ($q){
            $q->where('active', 1)->OrderBy('sort_order');
        })->firstOrFail();
        $servicePage = $data->getFullData();

        return response()->json([
            'status'=>'success',
            'data'=>$servicePage
        ]);
    }

    public function getServicesList()
    {
        $data = OneServiceModel::query()->orderBy('sort_order')->get();
        $servicesList = [];
        foreach ($data as $service) {
            $servicesList[] = $service->getFullData();
        }


        return response()->json([
            'status'=>'success',
            'data'=>$servicesList
        ]);
    }

    public function getOneService(Request $request)
    {
        $data = OneServiceModel::query()
            ->with('projects', function ($q){
                $q->select(
                    'project_models.id',
                    'project_title',
                    'project_year',
                    'city_country',
                    'project_photo',
                    'project_slug',
                )->orderBy('sort_order');
            })
            ->where('slug', $request->slug)->firstOrFail();
        $data = $data->getFullData();

        return response()->json([
            'status'=>'success',
            'data'=>$data,
        ]);
    }
}
