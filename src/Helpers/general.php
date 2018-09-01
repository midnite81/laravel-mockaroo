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

if ( ! function_exists('console_write')) {

    /**
     * Write a line to the console
     *
     * @param $string
     */
    function console_write($string)
    {
        if (class_exists('Symfony\Component\Console\Output\ConsoleOutput')) {
            $output = new Symfony\Component\Console\Output\ConsoleOutput();

            $output->writeln($string);
        }
    }

}