<?php

if (!function_exists('dashboard')) {
    function dashboard($url) {
        return url('dashboard/' . $url);
    }
}
