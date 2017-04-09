<?php
/**
 * User: Sudipta Deb <mr.sudiptadeb@gmail.com>
 * Date: 07/04/17
 * Time: 4:42 PM
 */

namespace SDeb;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class SecurityMiddleware
 * @package SDeb
 */
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

        // Passing the error variable to all validators
        $errors = new SecurityError();

        if(mode=='global' && !($this->isValidGlobalConfig())){
            $errors->add('global configuration not valid !');
        }

        //calling each validator manually,
        //TODO make this sequence configurable
        $this->throttling($request,$response,$errors);
        $this->authValidation($request,$response,$errors);
        $this->inputValidation($request,$response,$errors);

        //check if the request has errors
        if(!empty($errors)){
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

    /**
     * @param $pathConfig
     * @return bool
     */
    private function isValidConfig()
    {
        //For now no required configs. In future we may have some
        return true;
    }

    private function isValidGlobalConfig()
    {
        if(!($this->globalSecurityConfigurations.key_exists('properties'))){
            return false;
        }

        if(!($this->globalSecurityConfigurations.key_exists('paths'))){
            return false;
        }

    }

    /**
     * @param $request
     * @param $response
     * @param $errors
     * @return mixed
     */
    private function throttling($request, $response, $errors)
    {
        //TODO Actual validations happen here

        return $errors;
    }

    /**
     * @param $request
     * @param $response
     * @param $errors
     * @return mixed
     */
    private function authValidation($request, $response, $errors)
    {
        //TODO Actual validations happen here

        return $errors;
    }

    /**
     * @param $request
     * @param $response
     * @param $errors
     * @return mixed
     */
    private function inputValidation($request, $response, $errors)
    {
        //TODO Actual validations happen here

        return $errors;
    }
}