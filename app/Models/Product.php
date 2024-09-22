<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'category_id', 
            'sub_category_id', 
            'child_category_id', 
            'metaTag', 
            'meta_desc', 
            'meta_tag_key', 
            'seo_url', 
            'dynamic_head',
            'dynamic_body',
            'footer_desc', 
            'faq_title',
            'keyword_title',
            'pageCardDescription',
            'PcardTitle',
            'topices',
            'navigation',
            'inquiry'
            
    ];
}


// ALTER TABLE `products` ADD `PcardTitle` VARCHAR(255) NULL AFTER `keyword_title`, ADD `pageCardDescription` TEXT NULL AFTER `PcardTitle`;

// CREATE TABLE `elaar`.`page_card` ( `id` INT NOT NULL AUTO_INCREMENT , `keyword` VARCHAR(255) NULL , `url` VARCHAR(255) NULL , `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , `deleted_at` TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
// ALTER TABLE `page_card` ADD `product_id` INT(11) NULL AFTER `id`;
// 
