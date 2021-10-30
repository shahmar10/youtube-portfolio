<?php


namespace App\Http\Traits;


use Illuminate\Support\Facades\File;

trait MediaTrait
{
    public function mediaDestroy($path)
    {
        if(File::exists($path)){
            File::delete($path);
        }
    }

    public function projectMediaAdd($medias,$project)
    {
        foreach ($medias as $media) {

            $fileName = time().rand(1,1000).'.'.$media->extension();  // logo123.pdf
            $fileNameWithUpload = 'storage/uploads/project/'.$fileName;

            //seklin ozunu storage save etmek
            $media->storeAs('public/uploads/project/',$fileName);
            $image_types = ['png','jpg','jpeg','svg'];
            if (in_array($media->extension(),$image_types)){
                $type = 'image';
            }
            elseif($media->extension()=="mp4"){
                $type = 'video';
            }else{
                $type = null;
            }

            //database yuklemek
            $project->media()->create(['media'=>$fileNameWithUpload,'type'=>$type]);
        }
    }
}
