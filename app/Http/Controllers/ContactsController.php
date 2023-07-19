<?php

namespace App\Http\Controllers;

use App\Models\ContactsModel;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function contacts()
    {
        $data=ContactsModel::firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        $data['og_image'] = $this->getMedia($data['og_image']);
        $data['photo'] = $this->getMedia($data['photo']);

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);

    }
}
