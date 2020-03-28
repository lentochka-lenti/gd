<?php

function sm($text)
{
    $search = array(
        "/:-?\)/",
       // "/:\)/",
        "/:-?\(/",
       // "/:\(/"
    );

    $replace = array(
        "<img src='img/sm.gif' width=50 height=50>",
        //"<img src='img/sm.gif' width=50 height=50>",
        "<img src='img/bad.gif' width=50 height=50>",
       // "<img src='img/bad.gif' width=50 height=50>"
    );

    return preg_replace($search, $replace, $text);
}

function bb_code($text)
{
    return preg_replace(
        "/\[([biu])\](.*?)\[\/([biu])\]/u",
        "<$1>$2</$3>",
        htmlspecialchars(
            $text,
            ENT_QUOTES
        )
    );
}

function filter($text)
{

    return preg_match("/" . file_get_contents("cenz.txt") . "/i", $text);
}


//function bb_code_2($text){
  //  return preg_replace('~\[color=([^"><]*?)\](.*?)\[/color\]~s','<span style="color:$1;">$2</span>',htmlspecialchars($text,ENT_QUOTES));
//}
   