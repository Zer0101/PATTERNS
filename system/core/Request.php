<?php

namespace MVC\Core;

class Request
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var array
     */
    private $trust_proxy = [];

    public function __construct()
    {
        $this->uri = $this->stripUri();
    }

    private function stripUri()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            return $_SERVER['PATH_INFO'];
        }

        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
            $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            if (!empty($request_uri)) {
                // Valid URL path found, set it.
                $uri = $request_uri;
            }

            // Decode the request URI
            return rawurldecode($uri);
        }

        if (isset($_SERVER['PHP_SELF'])) {
            return $_SERVER['PHP_SELF'];
        }

        if (isset($_SERVER['REDIRECT_URL'])) {
            return $_SERVER['REDIRECT_URL'];
        }
        return null;
    }

    /**
     * Check if connection is secure (via SSL or TSL)
     * @return bool
     */
    public function isSecureConnection()
    {
        if (!empty($_SERVER['HTTPS']) && filter_var($_SERVER['HTTPS'], FILTER_VALIDATE_BOOLEAN)) {
            return TRUE;
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            return TRUE;
        } elseif (!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && filter_var($_SERVER['HTTP_FRONT_END_HTTPS'], FILTER_VALIDATE_BOOLEAN)) {
            return TRUE;
        } elseif (in_array($_SERVER['REMOTE_ADDR'], $this->trust_proxy)) {
            return TRUE;
        }

        return FALSE;
    }

    public function uri(){
        return $this->uri;
    }
}