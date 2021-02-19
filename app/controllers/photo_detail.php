<?php

  class Photo_detail extends Controller
  {
    public function index($url_address = '')
    {
      $data['page_title'] = "Photo Details";
      $load_class = $this->loadModel("load_images");
      $data['image'] = $load_class->get_single_image($url_address);
      $data['random_images'] = $load_class->get_images();
      $this->view("catalog/Photo_detail", $data);

      $image_class = $this->loadModel("image_class");

      if(is_array($data['random_images'])){
        foreach ($data['images'] as $key => $row){
          $data['images'][$key]->image = $image_class->get_thumbnail($row->image);
        }
      }
    }
}
?>
