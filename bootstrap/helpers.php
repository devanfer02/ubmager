<?php


function isActive(array $path) : bool {
    if ($path[0][0] === "/" && strlen($path[0]) !== 1) {
        $path[0] = substr($path[0], 1);
    }

    // $active = 'tw-text-cst-yellow';
    // $notActive = 'tw-text-white hover:tw-text-gray-400 tw-duration-300 tw-ease-in-out';

    return call_user_func_array('Request::is', $path);
}

