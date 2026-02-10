<?php

// src/Service/UploaderHelper.php
namespace App\Service;

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class UploaderHelper
{
    private $uploadApi;

    public function __construct(string $cloudinaryUrl)
    {
        // On force la configuration avec la string venant du .env
        Configuration::instance($cloudinaryUrl);
        $this->uploadApi = new UploadApi();
    }

    public function uploadImage($file): string
    {
        $upload = $this->uploadApi->upload($file->getRealPath());
        return $upload['secure_url'];
    }
}