<?php

namespace App\Http\Controllers;

use App\Models\HeaderModel;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function header()
    {
        $data = HeaderModel::query()->firstOrFail();

        $data['logo'] = $this->getMedia($data['logo']);

        return response()->json([
            'status'=>'success',
            'data'=> [
                'logo' => $data['logo']
            ]
            //'data'=>$data
        ]);
    }
}
