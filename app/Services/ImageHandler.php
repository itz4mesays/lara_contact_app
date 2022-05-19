<?php

namespace App\Services;

class ImageHandler {

    protected $imageHandler;
    
    public function __construct($imageData)
    {
        $this->imageHandler = $imageData;    
    }

    /**
     * Handles Profile Upload Image
     */
    public function uploadImage(): string
    {
        $result = $this->imageHandler; //get the instance of the uploaded file
        $data['fileName'] = $this->generateFileName($result);
        $uploadPath = 'public/upload';  
        $path = $result->file('profile_picture')->storeAs($uploadPath, $data['fileName']);
        
        if(empty($path)){
            $fileName = null;
        }else{
            $fileName = $data['fileName'];
        }
        return $fileName;
    }

    protected function generateFileName($data): string
    {
        return auth()->user()->id.'_'.time().'.'.$data->file('profile_picture')->getClientOriginalExtension();
    }
}