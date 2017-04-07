<?php
/**
 * User: Sudipta Deb <mr.sudiptadeb@gmail.com>
 * Date: 07/04/17
 * Time: 4:46 PM
 */

namespace SDeb;


class SecurityConfigutations
{

    public static function getConfig()
    {
        return self::loadFromFile();
    }

    private static function loadFromFile()
    {
        return array();
    }
}