<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        $data=MenuModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        $menuItemData = [];
        foreach ($data['menu_items'] as $key => $item){
            $menuItemData[] = $item['attributes'];
        }
        $data['menu_items'] = $menuItemData;

        $socialItemData = [];
        foreach ($data['social'] as $key => $item){
            $socialItemData[] = $item['attributes'];
        }
        $data['social'] = $socialItemData;

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }
}
