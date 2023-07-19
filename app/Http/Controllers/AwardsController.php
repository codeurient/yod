<?php

namespace App\Http\Controllers;

use App\Models\AwardsModel;
use Illuminate\Http\Request;

class AwardsController extends Controller
{
    public function awards()
    {
        $data=AwardsModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        $data['og_image'] = $this->getMedia($data['og_image']);

        $awards = [];

        $awards['og_image'] =  $data['og_image'];
        $awards['meta_title'] = $data['meta_title'];
        $awards['meta_description'] = $data['meta_description'];
        $awards['og_title'] = $data['og_title'];
        $awards['og_description'] = $data['og_description'];


        $awardsData = [];
        foreach ($data['awards'] as $key => $oneAward)
        {
            $awardData = $oneAward['attributes'];

            $awardData['img'] = $this->getMedia($awardData['img']);
            $awardData['logo'] = $this->getMedia($awardData['logo']);

            $optionsData = [];

            foreach ($awardData['options'] as $optionKey => $optionValue){
                $optionsData[$optionKey . '_' . $optionValue['layout']] = $optionValue['attributes'];
            }
            $awardData['options'] = $optionsData;
            $awardsData[] = $awardData;
        }
        $awards['awards'] = $awardsData;

        return response()->json([
            'status'=>'success',
            'data'=>$awards
        ]);
    }

}
