<?php

namespace App\Http\Middleware;

use App\Models\Event;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPublishedPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Mengecek kondisi jika id event tidak dipublikasikan maka akan dialihkan ke halaman 404 selain itu akan dijalankan
        // if (!Event::findOrFail($request->id)->is_published) {
        //     abort(404);
        // }

        // $event = Event::findOrFail($request->id);
        // if ($event->is_published) {
        //     return $next($request);
        // }
        return $next($request);
    }
}
