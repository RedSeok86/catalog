<?php
  class Load_images{

    public function get_images($find = ''){
      $DB = new Database();

      $limit = 4;
      $page_number = isset($_GET['page']) ? (int) $_GET['page'] : 1;
      $page_number = $page_number < 1 ? 1 : $page_number;
      $offset = ($page_number - 1) * $limit;

      if($find == ''){
        $query = "SELECT * FROM images ORDER BY id DESC LIMIT $limit OFFSET $offset";
        return $DB->read($query);
      }else{
        $find = esc($find);
        $query = "SELECT * FROM images WHERE title LIKE '%$find%' ORDER BY id DESC LIMIT $limit OFFSET $offset";
        return $DB->read($query);
      }


    }

    public function get_total(){
        $DB = new Database();
        $query = "SELECT * FROM images";
        return count($DB->read($query));
    }

    public function get_single_image($url_address){
        $DB = new Database();
        $arr['url'] = $url_address;
        $query = " UPDATE images SET views = views + 1 WHERE url_address = :url LIMIT 1";
        $DB->write($query , $arr);

        $arr['url'] = $url_address;
        $query = "SELECT * FROM images WHERE url_address = :url LIMIT 1";
        $data = $DB->read($query , $arr);
        return $data[0];
    }

  }

 ?>
