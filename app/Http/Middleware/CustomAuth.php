<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controllers\RegisterController;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $session = session();
        $adminData = $session->get('admin_data');
    
        // Check if 'admin_data' session is empty
        if (empty($adminData)) {
            return redirect()->to('/');
        }
        // Continue processing the request if 'admin_data' is not empty
        return $next($request);
    }
    

}
