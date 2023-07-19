<?php

namespace App\Http\Controllers;

use App\Models\PressModel;
use Illuminate\Http\Request;

class PressController extends Controller
{
    public function press()
    {
        $data = PressModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        $data['og_image'] = $this->getMedia($data['og_image']);

        $smallData = [];
        foreach ($data['category_names'] as $key => $item){

            $blocksData = [];
            $blocksData['category_name'] = $item['attributes']['add_category_name'];

            foreach ($item['attributes']['block'] as $keyBlock => $block)
            {
                if(array_key_exists('logo', $block['attributes'])){
                    $block['attributes']['logo'] = $this->getMedia($block['attributes']['logo']);
                }

                if(array_key_exists('file',  $block['attributes'])){
                    $block['attributes']['file'] = $this->getMedia($block['attributes']['file']);
                }

                if(array_key_exists('photo',  $block['attributes'])){
                    $block['attributes']['photo'] = $this->getMedia($block['attributes']['photo']);
                }

                $blocksData[$keyBlock . '_' . $block['layout']]  = $block['attributes'];

            }

            $smallData[] = $blocksData;
        }
        $data['category_names'] = $smallData;


        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }
}
