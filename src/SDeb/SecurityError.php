<?php
/**
 * User: Sudipta Deb <mr.sudiptadeb@gmail.com>
 * Date: 07/04/17
 * Time: 5:08 PM
 */

namespace SDeb;


class SecurityError
{

    private $errors ;
    /**
     * SecurityError constructor.
     */
    public function __construct()
    {
        $this->errors = array();
    }

    /**
     * @return string
     */
    public function getReason($all=true)
    {
        if(empty($this->errors)){
            return "";
        }

        if($all){
            return utf8_encode(json_encode($this->errors,JSON_PRETTY_PRINT));
        }else{
            return $this->errors[0];
        }
    }

    public function add($error_message)
    {
        array_push($this->errors,$error_message);
    }
}