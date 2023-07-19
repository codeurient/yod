<?php

namespace App\Http\Controllers;

use App\Models\Page404Model;
use Illuminate\Http\Request;

class Page404Controller extends Controller
{
    public function page404()
    {
        $data=Page404Model::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }
}
