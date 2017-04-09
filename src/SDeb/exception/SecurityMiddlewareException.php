<?php
/**
 * User: Sudipta Deb <mr.sudiptadeb@gmail.com>
 * Date: 09/04/17
 * Time: 11:39 PM
 */

namespace SDeb\utils;


class SecurityMiddlewareException extends \Exception
{
    private $message;

    /**
     * SecurityMiddlewareException constructor.
     * @param string $param
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function __toString()
    {
        return $this->message;
    }

}