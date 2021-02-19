<?php
  class User
  {
    public function login($POST){

        $_SESSION['error'] = "";

        if($_SESSION['error'] == ""){
          $arr['email'] = esc($POST['email']);
          $arr['password'] = esc($POST['password']);


          $DB = new Database();
          $query = "SELECT * FROM users WHERE email = :email && password = :password LIMIT 1";
          $data = $DB->read($query,$arr);

          if(is_array($data)){
            $data = $data[0];
              $_SESSION['user_url'] = $data->url_address;
              $_SESSION['user_email'] = $data->email;
              header("Location: " . ROOT . "photos");
              die;

          }


        }
    }
      public function signup($POST){
          $_SESSION['error'] = "";
          if($_SESSION['error'] == ""){
            $arr['email'] = esc($POST['email']);
            $arr['password'] = esc($POST['password']);
            $arr['date'] = date("Y-m-d H:i:s");
            $arr['url_address'] = get_random_string_max(60);
            $arr['image'] = "";

            $DB = new Database();
            $query = "INSERT INTO users(email,password,date,url_address,image) values (:email,:password,:date,:url_address,:image)";
            $DB->write($query,$arr);
            // header("Location: " . ROOT . "Photos");
            header("Location: " . ROOT . "login");
            die;
          }
      }

      public function get_single_user($url_address){

          $arr['url'] = $url_address;
          $query = "SELECT * FROM users WHERE url_address = :url LIMIT 1";
          $data = $DB->read($query , $arr);
          return $data[0];
      }

      public function is_loged_in(){

        if(isset($_SESSION['user_url']) && isset($_SESSION['user_email'])){
          return true;
        }
        return false;
      }
  }
  ?>
