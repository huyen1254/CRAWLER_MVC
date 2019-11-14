<?php
class Vnexpress extends Regex
{
    public function getTitle()
    {
        preg_match("/<title>(.*?)<\/title>/", $this->html, $title);

        return $title[1];
    }
    public function getDate()
    {
        preg_match("/<span+\s+class=\"time\sleft\">(.*?)<\/span>/", $this->html, $date);
        return $date[1];
    }
    public function getContent()
    {
        preg_match_all("/<p class=\"Normal\">\n(.*?)<\/p>/", $this->html, $content, PREG_SET_ORDER, 0);
        $output = '';
        foreach ($content as $para) {
            $output = $output . $para[0];
        }
        return $output;
    }
  

}