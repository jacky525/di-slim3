<?php

if (! function_exists('base_path')) {
    /**
     * Get the path to the base of the install.
     *
     * @param  string  $path
     * @return string
     */
    function base_path($path = '')
    {
        return dirname(dirname(__DIR__)).($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}
if (! function_exists('config')) {
    /**
     * 快速取 config 內容
     *
     * @param  string  $key
     * @return string
     */
    function config(string $key)
    {
        return Jbcp104\App::getStaticConfig()->get($key);
    }
}
