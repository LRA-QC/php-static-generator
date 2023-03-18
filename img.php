<?php

/**
 * render an HTML tag for an image
 * if the image exists, it will specify 3  different sizes
 */
function img( $path, $file="", $alt="", $class="", $style="")
{

    /// TODO : create a config for defining the image size for small,medium,large in a config file and load the values

    $html='<picture>';
    $path=trim($path);
    $file=trim($file);

    $p=sprintf('%s/large/%s',$path,$file);
    if (file_exists($p))
    {
        $size = getimagesize($p);
        $html.=sprintf('<source media="(min-width:1500px)" srcset="%s" %s>',$p,$size[3]);
    }
    $p=sprintf('%s/medium/%s',$path,$file);
    if (file_exists($p))
    {
        $size = getimagesize($p);
        $html.=sprintf('<source media="(min-width:1000px)" srcset="%s" %s>',$p,$size[3]);
    }

    $p=sprintf('%s/small/%s',$path,$file);
    if (file_exists($p))
    {
        $size = getimagesize($p);
        //var_dump($size);
        $html.=sprintf('<img src="%s" alt="%s" class="%s" style="%s" %s>',$p,$alt,$class,$style,$size[3]);
    }

    $html.='</picture>';
    return $html;

}