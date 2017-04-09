<?php
/**
 * User: Sudipta Deb <mr.sudiptadeb@gmail.com>
 * Date: 07/04/17
 * Time: 4:46 PM
 */

namespace SDeb;


use SDeb\utils\Utils;

class SecurityConfigutations
{

    public static function getConfig()
    {
        return Utils::loadFromFile('security.json');
    }

}