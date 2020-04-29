<?php

namespace Ksoft\Klaravel\Traits;

trait CallsInteractions
{
    /**
     * Run an interaction method.
     *
     * @param  string  $interaction
     * @param  array  $parameters
     * @return mixed
     */
    public static function call($interaction, array $parameters = [])
    {
        return static::interact($interaction, $parameters);
    }

    /**
     * Run an interaction method.
     *
     * @param  string  $interaction
     * @param  array  $parameters
     * @return mixed
     */
    public static function interact($interaction, array $parameters = [])
    {
        if (!str_contains($interaction, '@')) {
            $interaction = $interaction.'@handle';
        }

        list($class, $method) = explode('@', $interaction);

        $base = class_basename($class);

        return call_user_func_array([app($class), $method], $parameters);
    }

    /**
     * Execute the given interaction.
     *
     * This performs the common validate and handle methods for common interactions.
     *
     * @param  string  $interaction
     * @param  array  $parameters
     * @return mixed
     */
    public static function interaction($interaction, array $parameters)
    {
        static::interact($interaction.'@validator', $parameters)->validate();

        return static::interact($interaction, $parameters);
    }

}
