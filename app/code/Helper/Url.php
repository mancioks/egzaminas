<?php


namespace Helper;

class Url
{
    public static function redirect($route)
    {
        if ($route === '/') {
            $route = '';
        }

        header('Location: ' . BASE_URL . $route);
        exit();
    }

    public static function link($path, $param = null)
    {
        if ($path == '/') {
            $path = '';
        }

        $link = BASE_URL;
        $link .= $path;
        if (!str_ends_with($link, "/"))
            $link .= "/";
        if ($param !== null)
            $link .= $param;

        return $link;
    }
}