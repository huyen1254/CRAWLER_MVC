<?php
include "db/database.php";
include "libs/crawler.php";
include "libs/Page/Dantri.php";
include "libs/Page/Vietnamnet.php";
include "libs/Page/Vnexpress.php";
?>
<form method="POST" action="">
        <input type="text" value="" placeholder="" name="urlPages"><br>
        <input type="submit" name="submit" value="SUBMIT"/>
</form>
<?php
  $curl = new Crawler();
  
  if (isset($_POST['submit'])) {
    $urlPages = $_POST['urlPages'];
    $crawler=new Crawler($curl);
    
     }
  if(isset($curl->url)){
    $src1 = explode('://',$curl->url);
    if(isset($src1[1])){
      $src2 = explode('/',$src1[1]);
      $getSource = $src2[0];
    } 
  }
  switch (strtolower($param)) {
    case 'vnexpress':
        return new Vnexpress($this->html);
        break;
    case 'vietnamnet':
        return new Vietnamnet($this->html);
        break;
    case 'dantri':
        return new Dantri($this->html);
        break;
    default:
        return null;
        break;
}
  if($ch != ""){
    $ch->setUrl($_POST['submit']);
    $ch->parseData();
    $inputTitle = $ch->title;
    $inputContent = $ch->content;
    $ch->getFactory();
  } 
?>