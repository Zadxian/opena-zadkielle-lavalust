<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * Middleware: ProdMiddlewareMiddleware
 * 
 * Automatically generated via CLI.
 */
class ProdMiddleware
{
    /**
     * Handle the incoming request
     *
     * @param Closure $next
     * @return mixed
     */
    public function handle(Closure $next)
    {
        // TODO: Add your middleware logic here (authentication, authorization, etc.)
             $lava = lava_instance();
        $lava->call->library('session');

        if (!$lava->session->userdata('logged_in')) {
            redirect('Login');
        }
        return $next();
    }


    
}
