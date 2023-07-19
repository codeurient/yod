<?php


namespace App\Services;


use App\Http\Controllers\Controller;



class ProjectCategoryService extends Controller
{

    public function getProjectData($data, $category){
        $newData = $this->translateModelWithoutIdAndTime($data);

        $newData['category_slug']=$category->getSlugWithoutTranslate();
        $newData['category_name']=$category->category_name;

//        $newData['project_slug']=$data->getSlugWithoutTranslate();

        $newData['project_photo'] = $this->getMedia($newData['project_photo']);
        $newData['logo_awards'] = $this->getMedia($newData['logo_awards']);
        $newData['og_image'] = $this->getMedia($newData['og_image']);

        foreach ($newData['blocks'] as $keyBlock => $block)
        {
            switch ($newData['blocks'][$keyBlock]['layout'])
            {
                case 'vertical_photo':
                case 'horizontal_photo':
                case 'heading_block_2':
                case 'large_vertical_photo':
                case 'heading_block_3':
                case 'horizontal_photo_2':
                case 'square_photo_4':
                case 'big_square_photo':

                    $newData['blocks'][$keyBlock]['attributes']['photo'] = $this->getMedia($block['attributes']['photo']);
                    break;

                case 'add_video':
                    if(isset($newData['blocks'][$keyBlock]['attributes']['video_media'])&&$newData['blocks'][$keyBlock]['attributes']['video_media']  !== null)
                    {
                        $newData['blocks'][$keyBlock]['attributes']['video_media'] = $this->getMedia($block['attributes']['video_media']);
                    }
                    break;
            }
        }
        return $newData;
    }







    public function getAllProjectData($data, $oneProject = true){
        $newData = $this->translateModelWithoutIdAndTime($data);

        if ($oneProject){
            $newData['project_slug']=$data->getSlugWithoutTranslate();
        }



        $newData['project_photo'] = $this->getMedia($newData['project_photo']);
        $newData['logo_awards'] = $this->getMedia($newData['logo_awards']);
        $newData['og_image'] = $this->getMedia($newData['og_image']);

        foreach ($newData['blocks'] as $keyBlock => $block)
        {
            switch ($newData['blocks'][$keyBlock]['layout'])
            {
                case 'vertical_photo':
                case 'horizontal_photo':
                case 'heading_block_2':
                case 'large_vertical_photo':
                case 'heading_block_3':
                case 'horizontal_photo_2':
                case 'square_photo_4':
                case 'big_square_photo':

                    $newData['blocks'][$keyBlock]['attributes']['photo'] = $this->getMedia($block['attributes']['photo']);
                    break;

                case 'add_video':
                    if(isset($newData['blocks'][$keyBlock]['attributes']['video_media'])&&$newData['blocks'][$keyBlock]['attributes']['video_media']  !== null)
                    {
                        $newData['blocks'][$keyBlock]['attributes']['video_media'] = $this->getMedia($block['attributes']['video_media']);
                    }
                    break;
            }
        }
        return $newData;
    }

}




















/*foreach ($newData['video'] as $key => $slide)
{
    if(isset($newData['video'][$key]['attributes']['video_media'])&&$newData['video'][$key]['attributes']['video_media']  !== null)
    {
        $newData['video'][$key]['attributes']['video_media'] = $this->getMedia($slide['attributes']['video_media']);
    }
}*/
