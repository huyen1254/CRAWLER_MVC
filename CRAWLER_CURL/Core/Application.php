<?php

include_once('./Libs/Crawler.php');
include_once('./Libs/Curl.php');
include_once('./Controller/songs.php');
include_once('./Controller/Check.php');

class Application{
    public function __construct()
    {
        
        // create array with URL parts in $url
        $this->splitUrl();

        // check for controller: no controller given ? then load start-page
        if (!$this->url_controller) {

            require APP . 'Controller/home.php';
            $page = new Home();
            $page->index();
        }
    }
    private function slitUrl(){

        if (isset($_POST['submit'])) {
            $urlPages = $_POST['urlPages'];
            if (empty($urlPages)) {
                include_once('./View/index.php');
            }
            $curl = new Curl();
            $crawler=new Crawler($curl);
            $rows = array(
                "vnexpress" => new Vnexpress(),
                "vietnamnet" => new Vietnamnet(),
                "dantri" => new Dantri()
            );
    
           
             }
    }
}

?>