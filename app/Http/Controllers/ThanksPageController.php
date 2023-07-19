<?php

namespace App\Http\Controllers;

use App\Models\ThanksPageModel;
use Illuminate\Http\Request;

class ThanksPageController extends Controller
{
    public function thankPage()
{
    $data=ThanksPageModel::query()->firstOrFail();
    $data = $this->translateModelWithoutIdAndTime($data);

    $data['video'] = $this->getMedia($data['video']);
//    $data['og_image'] = $this->getMedia($data['og_image']);

    return response()->json([
        'status'=>'success',
        'data'=>$data
    ]);
}
}
