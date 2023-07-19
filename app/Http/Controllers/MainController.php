<?php

namespace App\Http\Controllers;

use App\Models\MainModel;
use ClassicO\NovaMediaLibrary\API;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        $data=MainModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        $data['company_photo'] = $this->getMedia($data['company_photo']);
        $data['photo'] = $this->getMedia($data['photo']);
        $data['og_image'] = $this->getMedia($data['og_image']);

/*        foreach ($data['photo_with_caption'] as $key => $slide)
        {
            $data['photo_with_caption'][$key]['attributes']['photo'] = $this->getMedia($slide['attributes']['photo']);
        }*/

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }
}
