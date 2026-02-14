<?php

namespace App\Http\Middleware;

use App\Repositories\Installer\InitRepository;
use Closure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ServiceMiddleware
{
    protected $repo, $service_repo;

    public function __construct(
        InitRepository $service_repo
    ) {
        $this->service_repo = $service_repo;
    }

    public function handle($request, Closure $next)
    {
        // return $next($request);
        if (env('APP_DEMO') && env('APP_DEBUG')){
            return $next($request);
        }
        // Check if all required files exist
        $WelcomeNote = Storage::disk('local')->exists('.WelcomeNote') ? Storage::disk('local')->get('.WelcomeNote') : null;
        $CheckEnvironment = Storage::disk('local')->exists('.CheckEnvironment') ? Storage::disk('local')->get('.CheckEnvironment') : null;
        $LicenseVerification = Storage::disk('local')->exists('.LicenseVerification') ? Storage::disk('local')->get('.LicenseVerification') : null;
        $DatabaseSetup = Storage::disk('local')->exists('.DatabaseSetup') ? Storage::disk('local')->get('.DatabaseSetup') : null;
        $AdminSetup = Storage::disk('local')->exists('.AdminSetup') ? Storage::disk('local')->get('.AdminSetup') : null;
        $Complete = Storage::disk('local')->exists('.Complete') ? Storage::disk('local')->get('.Complete') : null;

        // Check if all required files are present
        $allFilesExist = $WelcomeNote && $CheckEnvironment && $LicenseVerification && $DatabaseSetup && $AdminSetup && $Complete;

        // Define an array of allowed URLs
        $allowedUrls = [
            URL::route('service.checkEnvironment'),
            URL::route('service.license'),
            URL::route('service.database'),
            URL::route('service.done'),
            URL::route('service.uninstall'),
            URL::route('service.verify'),

            URL::route('service.update'),
            URL::route('service.delete'),
            URL::route('service.revoke'),

            URL::route('service.install'),
            URL::route('service.user'),
            URL::route('service.user_post'),
        ];

        // Get the current URL
        $currentUrl = URL::current();

        // If the current URL is in the list of allowed URLs or all required files exist
        if (in_array($currentUrl, $allowedUrls) || $allFilesExist) {
            // Continue to the next middleware in the pipeline
            return $next($request);
        }

        // If the Install Route is not being accessed, and not all required files exist
        if (strpos($currentUrl, URL::route('service.install')) === false) {
            // Redirect to the Install Route
            return redirect()->route('service.install');
        }

        // If the current URL is the Install Route and not all required files exist
        // Display an error message and allow access to the route
        return $next($request);
    }

}
