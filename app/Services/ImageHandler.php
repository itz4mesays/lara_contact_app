<?php

namespace App\Services;

class ImageHandler {
    
    /**
     * imageHandler
     *
     * @var mixed
     */
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
     * @return array
     */
    public function uploadImage(): array
    {
        $result = $this->imageHandler;
        
        $profileInfo =$result->validated();
        
        if($result->hasFile('profile_picture')){
            $data['fileName'] = $this->generateFileName($result);
            $path = $result->file('profile_picture')->storeAs($this->imagePath(), $data['fileName']);
            $profileInfo['profile_picture'] = !empty($path) ?? $data['fileName'];
        };

        return $profileInfo;
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