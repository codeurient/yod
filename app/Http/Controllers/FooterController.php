<?php

namespace App\Http\Controllers;

use App\Models\FooterModel;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class FooterController extends Controller
{
    public function footer()
    {
        $data=FooterModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        $data['copyright_file'] = $this->getMedia($data['copyright_file']);
        $data['conditions_file'] = $this->getMedia($data['conditions_file']);

        //$data['social'] = json_decode($data['social'],true);
        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }
}
