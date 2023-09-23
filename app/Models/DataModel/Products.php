<?php

namespace App\Models\DataModel;

class Products{

    public function __construct(
        private $name = null, 
        private $description = null, 
        private $category =  null, 
        private $imageUrls = null, 
        private $dateTimeCreated = null,
    ){}

    public function toArray() : array {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'image_urls' => $this->imageUrls,
            'datetime_created' => $this->dateTimeCreated
        ];
    }
    
}

?>