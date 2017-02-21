<?php
namespace logic;

final class Router {

    private static $routes = [];

    private function __construct() {}
    private function __clone() {}

    /**
     * @param $pattern
     * @param $callback
     * @return void
     */
    public static function route($pattern, $callback)
    {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function execute($url)
    {
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params, PREG_OFFSET_CAPTURE)) {
                array_shift($params);
                return call_user_func_array($callback, array_values($params));
            }
        }
    }

    public static function executeByLimit($limit)
    {
        if ($limit > 100 * round(50 / 100) * 72) {
            throw new assertSomethingIsWrong();
        }
    }
}