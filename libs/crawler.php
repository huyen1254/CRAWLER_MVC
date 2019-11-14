<?php
include "db/database.php";
class crawler{
    public $title;
    public $content;
    
   
    public function _http($url)
     {
        
         //Initialize Handle
         $handle = curl_init();
         
         //Define Settings
         curl_setopt($handle, CURLOPT_HTTPGET, true);
         curl_setopt($handle, CURLOPT_HEADER, true);
         curl_setopt($handle, CURLOPT_URL, $url);
         curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);
         curl_setopt($handle, CURLOPT_MAXREDIRS, 4);
         curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
         //Execute Request
         $output = curl_exec($handle);
         //Close cURL handle
         curl_close($handle);
     }
     public function parseData(){
        $this->_http($url);
        preg_match($this->title, $this->response, $matchesTitle);
        preg_match($this->content, $this->response, $matchesContent);
        if(isset($matchesTitle[1]) && isset($matchesContent[1])){
          $this->title = $matchesTitle[1];
          $this->content = $matchesContent[1];
        }
      }
      
    public function getFactory($dataPage, PagesFactory $page)
    {
        $keyPage = array(
            'vnexpress', 'vietnamnet', 'dantri'
        );

        foreach ($keyPage as $param) {
            if (preg_match("/$param/", $dataPage['host'])) {
                $page->html = $dataPage['html'];
                $website = $page->makeWebsite($param);
                $title = $website->getTitle();
                $content = $website->getContent();
            }
        }
        echo '<h2> ' . $title . '</h2> ' .' <br>' . $content;

        $data = [
            'host' => $dataPage['host'],
            'path' => $dataPage['path'],
            'title' => $title,
            'content' => $content,
            
        ];

        $this->model->addPage($data['path'], $data['host'], $data['title'], $data['content']);
    }

   
 }
     

     
?>