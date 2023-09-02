<?php

use app\core\Controller;
use app\models\Auth;
use app\models\User;

class Home extends Controller
{
    public $limit = 12;
    public $offset;
    public $page_num;
    public function __construct()
    {
        // get page offset
        $this->offset = Pagination::get_offset($this->limit)[0];
        $this->page_num = Pagination::get_offset($this->limit)[1];
    }

    public function index()
    {

        $this->view("landing_page", ['page_title' => 'Home Page']);
    }


    private function get_segment_data(array $categories, &$product, &$image_class): array
    {

        // display only 5 categories
        $mycats = [];
        $result = [];
        $num = 0;

        foreach ($categories as $cat) {
            // get thiers products
            $rows = $product->get_products_by_cat_id($cat->id, 'segment');
            if (is_array($rows)) {
                $cat->category = str_replace(" ", "_", $cat->category);
                $cat->category = preg_replace("/\W+/", "", $cat->category);

                // crop images
                foreach ($rows as $key => $row) {
                    $rows[$key]->image = $image_class->get_thumb_post($rows[$key]->image);
                }

                // add to catgories
                $result[$cat->category][] = $rows;
            }

            // break if it reaches five cats
            $num++;
            if ($num > 5) break;
        }

        return $result;
    }
}
