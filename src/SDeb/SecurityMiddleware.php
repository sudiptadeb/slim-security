<?php
/**
 * User: Sudipta Deb <mr.sudiptadeb@gmail.com>
 * Date: 07/04/17
 * Time: 4:42 PM
 */

namespace SDeb;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SecurityMiddleware
{
    private $globalSecurityConfigurations ;
    private $mode = "global";
    private $pathConfigurations ;

    public function __construct($pathConfig = array())
    {
        if(empty($pathConfig)){
            $this->globalSecurityConfigurations = SecurityConfigutations::getConfig();
            $this->mode = "global";
        }elseif ($this->isValidConfig($pathConfig)){
            $this->mode = "single";
            $this->pathConfig = $pathConfig;
        }
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null) {

        //TODO Validate the request according to the mode and the config
        $errors = $this->validate($request,$response);

        if(!empty($errors)){
            // Request is invalid. Log and drop the request with corresponding error code (400 mostly)
            return $response->withStatus(400,$errors->getReason());
        }

        // If no next is present then return the response directly else call the next and return the response
        if (!$next) {
            return $response;
        }
        else{
            return $next($request, $response);
        }
    }

    private function isValidConfig($pathConfig)
    {
        //TODO Validate the config array. If minimum requirements donot meet then fallback to global mode. #securebydefault
        return true;
    }

    /**
     * @param $request
     * @param $response
     * @return SecurityError
     */
    private function validate($request, $response)
    {
        $errors = new SecurityError();

        //TODO Actual validations happen here

        return $errors;
    }
}