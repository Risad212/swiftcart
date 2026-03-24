<?php


if (! function_exists('baseUrl')) {
    function baseUrl()
    {
        // get protocol
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

        // get domain address
        $host = $_SERVER['HTTP_HOST'];

        // get get project adress after domain address
        $scriptDir = dirname($_SERVER['SCRIPT_NAME']);

        return rtrim($protocol .  "://" . $host . $scriptDir);
    }
}


if (! function_exists('view')) {
    function view(string $name, array $data)
    {
        $path = __DIR__ . "/src/Views/$name.php";

        if (file_exists($path)) {
            require $path;
        } else {
            echo 'view not found';
        }
    }
}
