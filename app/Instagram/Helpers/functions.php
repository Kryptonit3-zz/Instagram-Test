<?php
/*
 * My little helper file :)
 */

if (!function_exists('group')) {
    /**
     * Create a route group with shared attributes.
     *
     * @param  array     $attributes
     * @param  \Closure  $callback
     * @return \Illuminate\Routing\Route
     */
    function group(array $attributes, Closure $callback)
    {
        return app('router')->group($attributes, $callback);
    }
}

if (!function_exists('instagram')) {
    /**
     * Create an Instagram API instance
     */
    function instagram()
    {
        $instagram = new \MetzWeb\Instagram\Instagram([
            'apiKey' => env('INSTAGRAM_KEY'),
            'apiSecret' => env('INSTAGRAM_SECRET'),
            'apiCallback' => env('INSTAGRAM_CALLBACK')
        ]);

        return $instagram;
    }
}