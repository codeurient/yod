<?php

namespace App\Http\Controllers;

use App\Models\ProjectPageModel;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $data = ProjectPageModel::query()->firstOrFail();
        $content = $data->getFullData();

        /*return json obj*/
        return response()->json([
            'status' => 'success',
            'data' => $content
        ]);
    }
}
