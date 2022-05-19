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
        $result = $this->imageHandler;
        $data['fileName'] = $this->generateFileName($result);
        $path = $result->file('profile_picture')->storeAs($this->imagePath(), $data['fileName']);
        
        return empty($path) ? null : $data['fileName'];
    }

    protected function generateFileName($data): string
    {
        return auth()->user()->id.'_'.time().'.'.$data->file('profile_picture')->getClientOriginalExtension();
    }

    public function imagePath(): string
    {
        return 'public/upload';
    }
}