<?php
include "libs/crawler.php";
class Regex
{

    function regexDate($regex, $key, $contentHTML)
    {
        preg_match($regex, $contentHTML, $date);
        return $date[$key];
    }

    function regexContent($regexParent, $regexChild, $contentHTML)
    {
        preg_match_all($regexParent, $contentHTML, $matches, PREG_SET_ORDER, 1);

        preg_match_all($regexChild, $matches[0][1], $content, PREG_SET_ORDER, 1);

        $output = '';
        foreach ($content as $para) {
            $output .= $para[1];
        }
        return $output;
    }
}
?>