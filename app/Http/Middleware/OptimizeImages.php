<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\Laravel\Facades\Image;

class OptimizeImages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (
            $response->headers->get('content-type') === 'image/jpeg' ||
            $response->headers->get('content-type') === 'image/png'
        ) {

            $image = Image::make($response->getContent());

            // Optimize image
            $image->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Convert to WebP if supported
            if (strpos($request->header('Accept'), 'image/webp') !== false) {
                $response->setContent($image->encode('webp', 80));
                $response->headers->set('Content-Type', 'image/webp');
            } else {
                $response->setContent($image->encode(null, 80));
            }
        }

        return $response;
    }
}
