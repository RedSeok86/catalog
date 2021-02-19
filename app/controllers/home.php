<?php

  class Home extends Controller
  {
    public function index()
    {
      $data['page_title'] = "Photos";

      //paginnation
      $pag = $this->loadModel("pagination");
      $data['page_next'] = $pag->generate_like($pag->current_page_number() + 1);
      $data['page_perv'] = $pag->generate_like($pag->current_page_number() - 1);
      $data['page_1'] = $pag->generate_like(1);
      $data['page_2'] = $pag->generate_like($pag->current_page_number() + 1);
      $data['page_3'] = $pag->generate_like($pag->current_page_number() + 2);
      $data['page_4'] = $pag->generate_like($pag->current_page_number() + 3);
      $data['page_current'] = $pag->current_page_number();

      $load_class = $this->loadModel("load_images");
      $data['page_total'] = $load_class->get_total();
      $find = isset($_GET['find']) ? $_GET['find'] : "";

      $data['images'] = $load_class->get_images($find);

      $image_class = $this->loadModel("image_class");

      if(is_array($data['images'])){
          foreach ($data['images'] as $key => $row){
            $data['images'][$key]->image = $image_class->get_thumbnail($row->image);
          }
      }
      foreach ($data['images'] as $key => $row){
        $data['images'][$key]->image = $image_class->get_thumbnail($row->image);
      }
      $this->view("catalog/index", $data);
    }
}
?>
