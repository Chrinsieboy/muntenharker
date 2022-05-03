<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class AutoLogout
{
    protected $session;
    // timeout after 15 minutes
    protected $timeout = 900;
    // protected $timeout = 10;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $is_logged_in = $request->path() != 'logout';

        if(!session('last_active')) {
            $this->session->put('last_active', time());
        } elseif(time() - $this->session->get('last_active') > $this->timeout) {
            
            $this->session->forget('last_active');
            
            $cookie = cookie('intend', $is_logged_in ? url()->current() : 'dashboard');
            
            auth()->logout();
            // redirect to login page with message
            return redirect('login')->withCookie($cookie)->with('status', 'U bent uitgelogd omdat u langer dan 15 minuten weg was.');
        }

        $is_logged_in ? $this->session->put('last_active', time()) : $this->session->forget('last_active');
        
        return $next($request);
    }
}