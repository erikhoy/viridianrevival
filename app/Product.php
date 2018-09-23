<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	public static function find_products_with_api($status_id, $page, $items_per_page, $items_total_count) {
                if(empty($page)) {
                        $offset = 0;
                } else {
                        $offset         = ($page-1)*25;
                }
                $etsy_base_url  = "https://openapi.etsy.com/v2/shops/viridianrevival/listings/active?api_key=1gzqo6wevm3nobomtzt9jh5j";
                $etsy_url_addons = "&includes=Images(url_fullxfull)&limit=25&offset=".$offset."&fields=listing_id,title,price,description";
                $etsy_url       = $etsy_base_url.$etsy_url_addons;
                $etsy_json      = file_get_contents($etsy_url);
                $etsy_array     = json_decode($etsy_json, true);
                return $etsy_array;
	}

	public static function find_listing_with_api($listing_id) {
                $etsy_url       = "https://openapi.etsy.com/v2/listings/".$listing_id."?api_key=1gzqo6wevm3nobomtzt9jh5j&includes=Images";
                $etsy_json      = file_get_contents($etsy_url);
                $etsy_array     = json_decode($etsy_json, true);

                return $etsy_array;
	}

	public static function count_products_with_api() {
                $etsy_url = "https://openapi.etsy.com/v2/shops/viridianrevival/listings/active?api_key=1gzqo6wevm3nobomtzt9jh5j&includes=Images&limit=50";
                $etsy_json = file_get_contents($etsy_url);
                $etsy_array = json_decode($etsy_json, true);
                $count = array_shift($etsy_array);
                return $count;
        }
}
