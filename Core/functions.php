<?php

/**
 * get the base path
 */
function base_path($path)
{
    return BASE_PATH.$path;
}

/**
 * returns the view
 */
function view(string $path, array $params=[])
{
    //extract the params so that they are accessible in the view
    extract($params);
    return require(base_path("Views/".$path.".php"));
}