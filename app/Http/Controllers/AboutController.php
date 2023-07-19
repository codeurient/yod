<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $data=AboutModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        $data['main_photo'] = $this->getMedia($data['main_photo']);
        $data['char_photo'] = $this->getMedia($data['char_photo']);
        $data['first_photo'] = $this->getMedia($data['first_photo']);
        $data['second_photo'] = $this->getMedia($data['second_photo']);
        $data['og_image'] = $this->getMedia($data['og_image']);
        $data['mobile_photo'] = $this->getMedia($data['mobile_photo']);

        /*$data['some_photo'] = json_decode($data['some_photo'],true);
        foreach ($data['some_photo'] as $keyBlock => $block)
        {
            $data['some_photo'][$keyBlock]['attributes']['photo'] = $this->getMedia($block['attributes']['photo']);
        } если только фото с пом flexible */




        $data['company_photo'] = $this->getMedia($data['company_photo']);
        $data['comand_photo'] = $this->getMedia($data['comand_photo']);


        foreach ($data['slider'] as $key => $slide)
        {
            $data['slider'][$key]['attributes']['slider_photo'] = $this->getMedia($slide['attributes']['slider_photo']);
        }

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }
}
