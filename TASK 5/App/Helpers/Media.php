<?php

namespace App\Helpers;

use Exception;

class Media{
    private array $files;
    private string $fileName;
    private string $fileExtention;
    private float $fileSize;

    private array $mediaErrors = [];

    public function __construct(array $files)
    {
        $this->files = $files;
        $this->fileName = $files['name'];
        $this->fileExtention = explode('/',$files['type'])[1] ;
        $this->fileSize = $files['size'];
    }
    public function validationOnExtention(array $extentions)
    {
        if(!in_array($this->fileExtention,$extentions))
        {
            $this->mediaErrors['extention']= "Valid Extention Are: ". implode(' , ',$extentions);
        }
        return $this;
    }
    public function validationOnsize($maxSize)
    {
        if($this->fileSize > $maxSize)
        {
            $this->mediaErrors['size']= "Size must be less than {$maxSize} Bytes";
        }
        return $this;
    }
    public function getMediaErrors()
    {
            return $this->mediaErrors;
    }
    public function getFileName(){
        return $this->fileName;
    }

    public function upload(string $fullPath)
    {
        $this->fileName = uniqid(). '.'. $this->fileExtention;
        $realPath = $fullPath . $this->fileName ;
        try {
            move_uploaded_file($this->files['tmp_name'], $realPath);
            return true;
        }
        catch(\Exception $e)
        {
            return false;

        }
    }

}