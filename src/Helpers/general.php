<?php

if ( ! function_exists('mockaroo_prefix')) {

    /**
     * Prefix the table name
     *
     * @param $string
     * @return string
     */
    function mockaroo_prefix($string)
    {
        $prefix = config('mockaroo.prefix', '');

       if (! empty($prefix)) {
           return $prefix . '_' . $string;
       }

       return $string;
    }

}