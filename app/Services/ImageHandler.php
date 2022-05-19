<?php

namespace App\Services;

class ImageHandler {

    protected $imageHandler;
        
    /**
     * __construct
     *
     * @param  mixed $imageData
     * @return void
     */
    public function __construct($imageData)
    {
        $this->imageHandler = $imageData;    
    }
  
    /**
     * Handles Profile Upload Image
     *
     * @return string
     */
    public function uploadImage(): string
    {
        $result = $this->imageHandler;
        $data['fileName'] = $this->generateFileName($result);
        $path = $result->file('profile_picture')->storeAs($this->imagePath(), $data['fileName']);
        
        return empty($path) ? null : $data['fileName'];
    }
    
    /**
     * Generate Filename for an image
     *
     * @param  mixed $data
     * @return string
     */
    protected function generateFileName($data): string
    {
        return auth()->user()->id.'_'.time().'.'.$data->file('profile_picture')->getClientOriginalExtension();
    }

        
    /**
     * Image Path
     *
     * @return string
     */
    public function imagePath(): string
    {
        return 'public/upload';
    }
}