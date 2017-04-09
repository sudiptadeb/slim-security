<?php
/**
 * User: Sudipta Deb <mr.sudiptadeb@gmail.com>
 * Date: 09/04/17
 * Time: 11:36 PM
 */

namespace SDeb\utils;


use SDeb\SecurityMiddleware;

class Utils
{
    /**
     * @param $fileLocation
     * @return SecurityMiddlewareException|string
     * @throws SecurityMiddlewareException
     */
    public static function readFileToString($fileLocation){

        if($fileLocation==null){
            return new SecurityMiddlewareException("File location null !");
        }

        if(!file_exists($fileLocation)){
            throw new SecurityMiddlewareException("File not found ! : "+$fileLocation);
        }

        return utf8_decode(file_get_contents($fileLocation));
    }

    public static function parseJSONString($str){
        return json_decode($str,true);
    }
}