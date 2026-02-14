<?php

use App\Models\Page;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Language;
use App\Models\Notification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
function getPagination($ITEM)
{
    return view('common.pagination', compact('ITEM'));
}

function setting($name)
{
    $setting_data = Setting::where('name', $name)->first();
    if ($setting_data) {
        return $setting_data->value;
    }

    return null;
}

function findDirectionOfLang()
{
    $data = Language::where('code', Cache::get('locale'))->select('direction')->first();
    return @$data->direction != null ? strtolower(@$data->direction) : '';
}

// for menu active
if (!function_exists('set_menu')) {
    function set_menu(array $path, $active = 'mm-active')
    {
        foreach ($path as $route) {
            if (Route::currentRouteName() == $route) {
                return $active;
            }
        }
        return (request()->is($path)) ? $active : '';
    }
}

// for  submenu list item active
if (!function_exists('menu_active_by_route')) {
    function menu_active_by_route($route)
    {
        return request()->routeIs($route) ? 'mm-show' : 'in-active';
    }
}

// for  submenu list item active
if (!function_exists('isActiveRoute')) {
    function isActiveRoute($route)
    {
        return request()->url() === $route ? 'active' : '';
    }
}


if (!function_exists('frontendActiveMenu')){
    function frontendActiveMenu($route)
    {
        if (Route::currentRouteName() == $route){
            return 'active';
        }
        return null;
    }
}

if (!function_exists('isModuleEnabled')) {
    function isModuleEnabled($moduleName)
    {
        $fileContents = File::get(base_path('modules_statuses.json'));

        // Decode the JSON content
        $moduleStatuses = json_decode($fileContents, true);
        return $moduleStatuses && isset($moduleStatuses[$moduleName]) && $moduleStatuses[$moduleName];
    }
}


if (!function_exists('flattenPages')) {
    function flattenPages($content)
    {
        $flattened = [
            "user_id" => 1,
            "title" => $content->title,
            "slug" => $content->slug,
            "content" => $content->content,
            "serial" => $content->serial,
            "parent_id" => $content->parent_id,
            "show_menu" => $content->show_menu,
        ];

        // Check if $content has children
        if (!empty($content->children)) {
            foreach ($content->children as $childContent) {
                $flattened['children'][] = flattenContent($childContent);
            }
        }

        return $flattened;
    }
}


if (!function_exists('frontendMenus')){
    function frontendMenus(){
        $menus = Cache::get('frontend_menus');
        if (empty($menus)){
            $getMenus = Page::with(['children' => function ($query) {
                    $query->orderBy('serial','asc');
                }])->whereNull('parent_id')
                ->where('show_menu', 1)
                ->orderBy('serial', 'asc')
                ->get();
            Cache::put('frontend_menus', $getMenus);
        }
        return $menus ?? [];
    }
}

function ___($key = null, $replace = [], $locale = null)
{
    $input = explode('.', $key);
    $file = $input[0];
    $term = $input[1];
    $app_local = app()->getLocale();

    $jsonString = file_get_contents(resource_path('lang/' . $app_local . '/' . $file . '.json'));
    $data = json_decode($jsonString, true);
    if (@$data[$term]) {
        return $data[$term];
    }

    return $term;
}

// global thumbnails
if (!function_exists('globalAsset')) {
    function globalAsset($path, $default_image = null)
    {
        if ($path == "") {
            return url('backend/uploads/default-images/no-image-default.png');
        } else {
            try {
                if (setting('file_system') == "s3" && Storage::disk('s3')->exists($path) && $path != "") {
                    return Storage::disk('s3')->url($path);
                } else if (setting('file_system') == "local" && file_exists(@$path)) {
                    return url($path);
                } else {
                    if ($default_image == null) {
                        return url('backend/uploads/default-images/no-image-default.png');
                    } else {
                        return url("backend/uploads/default-images/$default_image");
                    }
                }
            } catch (\Exception $c) {
                return url("backend/uploads/default-images/$default_image");
            }
        }
    }
}

// Permission check
if (!function_exists('hasPermission')) {
    function hasPermission($keyword)
    {
        if(auth()->user()->role_id == \App\Enums\Role::SUPER_ADMIN){
            return true;
        }
        if (in_array($keyword, Auth::user()->permissions ?? [])) {
            return true;
        }
        return false;
    }
}


if (!function_exists('userTheme')) {
    function userTheme()
    {
        $session_theme = Cache::get('user_theme');

        if (isset($session_theme)) {
            return $session_theme;
        } else {
            return 'default-theme';
        }
    }
}

if (!function_exists('leadingZero')) {
    function withLeadingZero($number)
    {
        return $number;
    }
}

if (!function_exists('setEnvironmentValue')) {
    function setEnvironmentValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $str .= "\n"; // In case the searched variable is in the last line without \n
        $keyPosition = strpos($str, "{$envKey}=");
        $endOfLinePosition = strpos($str, PHP_EOL, $keyPosition);
        $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
        $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
        $str = substr($str, 0, -1);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
}

if (!function_exists('s3Upload')) {
    function s3Upload($directory, $file)
    {
        $directory = 'public/' . $directory;
        return Storage::disk('s3')->put($directory, $file, 'public');
    }
}

if (!function_exists('s3ObjectCheck')) {
    function s3ObjectCheck($path)
    {
        return Storage::disk('s3')->exists($path);
    }
}

// return path for all api call
if (!function_exists('apiAssetPath')) {
    function apiAssetPath($path)
    {
        if ($path == "") {
            return url('frontend/img/favicon.png');
        } else {
            if (file_exists($path)) {
                return url($path);
            } else {
                return url('frontend/img/favicon.png');
            }
        }
    }
}
if (!function_exists('include_route_files')) {
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder)
    {
        try {
            $rdi = new RecursiveDirectoryIterator($folder);
            $it = new RecursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('update_settings_table')) {
    function update_settings_table($model, $name, $value)
    {
        $setting = $model::where('name', $name)->first();
        if ($setting) {
            $setting->value = $value;
        } else {
            $setting = new $model;
            $setting->name = $name;
            $setting->value = $value;
        }
        $setting->save();
    }
}

if (!function_exists('_translation')) {
    function _translation($key)
    {
        $trans = trans($key);
        try {
            $exp = explode('.', $trans);
            if (count($exp) == 2) {
                // $exp = str_replace('_', ' ', $exp[1]);
                return $exp[1];
            } else {
                return $trans;
            }
        } catch (\Throwable $th) {
            return $key;
        }
    }
}

if (!function_exists('verifyUrl')) {
    function verifyUrl($verifier = 'auth')
    {
        $url = config('app.verifier');
        return $url;
    }
}
if (!function_exists('curlIt')) {

    function curlIt($url, $postData = array())
    {
        $url = preg_replace("/\r|\n/", "", $url);
        try {
            $response = Http::timeout(3)->acceptJson()->get($url);
            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (\Exception $e) {
        }
        return [
            'goto' => $url . '&from=browser',
        ];
    }
}
if (!function_exists('gv')) {

    function gv($params, $key, $default = null)
    {
        return (isset($params[$key]) && $params[$key]) ? $params[$key] : $default;
    }
}

if (!function_exists('gbv')) {
    function gbv($params, $key)
    {
        return (isset($params[$key]) && $params[$key]) ? 1 : 0;
    }
}
if (!function_exists('appMode')) {
    function appMode()
    {
        $APP_NESTKEEPER = Config::get('app.APP_NESTKEEPER');
        if ($APP_NESTKEEPER == false) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('_trans')) {
    function _trans($key)
    {
        try {
            $local = auth()->user()->lang ?? app()->getLocale();
            $langPath = resource_path('lang/' . $local . '/');

            if (!file_exists($langPath)) {
                mkdir($langPath, 0777, true);
            }
            $parts = explode('.', $key);
            if (count($parts) === 2) {
                $file = base_path("resources/lang/{$local}/{$parts[0]}.json");
                $translationKey = strtolower(str_replace([' ', '/', '_', '-'], '_', $parts[1]));
                return putContent($file, $translationKey);

            } else if (!str_contains($key, '.')) {
                $file = base_path("resources/lang/{$local}/{$local}.json");
                $translationKey = strtolower(str_replace([' ', '/', '_', '-'], '_', $key));

                return putContent($file, $translationKey);
            }else {
                $translateString = explode('.', $key);
                return !empty($translateString[2]) ? $translateString[2] : $translateString[1];
            }
            // Return the original key if it doesn't match the expected format or if the key is not found
            return $key;
        } catch (\Exception $exception) {
            return $key;
        }
    }
}

function putContent($file, $translationKey)
{
    if (!File::exists($file)) {
        // Create the file with an empty object if it doesn't exist
        File::put($file, '{}');
    }

    // Get the current translations from the JSON file
    $translations = json_decode(File::get($file), true);
    // Check if the translation key exists in the JSON file
    if (!isset($translations[$translationKey])) {
        // If the key doesn't exist, add it to the translations array
        $translations[$translationKey] = ucwords(str_replace(['/', '_', '-'], ' ', $translationKey));
        // Update the JSON file with the new translations
        File::put($file, json_encode($translations, JSON_PRETTY_PRINT));
    }
    return $translations[$translationKey];
}


if (!function_exists('app_url')) {
    function app_url()
    {
        $saas = config('app.saas_module_name', 'Saas');
        $module_check_function = config('app.module_status_check_function', 'moduleStatusCheck');
        if (function_exists($module_check_function) && $module_check_function($saas)) {
            return config('app.url');
        }
        return url('/');
    }
}
function openJSONFile($lang)
{
    $jsonString = [];
    if (File::exists(resource_path('lang/' . $lang . '.json'))) {
        $jsonString = file_get_contents(resource_path('lang/' . $lang . '.json'));
        $jsonString = json_decode($jsonString, true);
    }
    return $jsonString;
}

function getRating($r)
{
    $str = '';
    if ($r == 5) {
        $str = '
       <i class="fas fa-star active"></i>
       <i class="fas fa-star active"></i>
       <i class="fas fa-star active"></i>
       <i class="fas fa-star active"></i>
       <i class="fas fa-star active"></i>';
    } elseif ($r == 4) {
        $str = '

        <i class="fas fa-star active"></i>
        <i class="fas fa-star active"></i>
        <i class="fas fa-star active"></i>
        <i class="fas fa-star active"></i>
        <i class="fas fa-star " ></i>';
    } elseif ($r == 3) {
        $str = '

        <i class="fas fa-star active"></i>
        <i class="fas fa-star active"></i>
        <i class="fas fa-star active"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>';
    } elseif ($r == 2) {

        $str = '
        <i class="fas fa-star active"></i>
        <i class="fas fa-star active"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>';
    } elseif ($r == 1) {
        $str = '
        <i class="fas fa-star active"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>';
    } elseif ($r == 0) {
        $str = '
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>';
    }

    return $str;
}

function saveJSONFile($lang, $data)
{
    $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents(resource_path('lang/' . $lang . '.json'), stripslashes($jsonData));
}

if (!function_exists('envu')) {
    function envu($data = array())
    {
        foreach ($data as $key => $value) {
            if (env($key) === $value) {
                unset($data[$key]);
            }
        }

        if (!count($data)) {
            return false;
        }

        // write only if there is change in content

        $env = file_get_contents(base_path() . '/.env');
        $env = explode("\n", $env);
        foreach ((array)$data as $key => $value) {
            foreach ($env as $env_key => $env_value) {
                $entry = explode("=", $env_value, 2);
                if ($entry[0] === $key) {
                    $env[$env_key] = $key . "=" . (is_string($value) ? '"' . $value . '"' : $value);
                } else {
                    $env[$env_key] = $env_value;
                }
            }
        }
        $env = implode("\n", $env);
        file_put_contents(base_path() . '/.env', $env);
        return true;
    }
}
if (!function_exists('is_Admin')) {

    function is_Admin()
    {
        if (auth()->user()->role->slug == 'superadmin' || auth()->user()->role->slug == 'admin' || auth()->user()->role->slug == 'landlord') {
            return true;
        } else {
            return false;
        }
    }
}
if (!function_exists('userLocal')) {
    function userLocal()
    {
        try {
            $user = auth()->user();
            if (isset($user->lang)) {
                $user_lang = $user->lang;
            } elseif ($user->company->configs) {
                $user_lang = $user->company->configs->where('key', 'lang')->first()->value;
            } else {
                $user_lang = App::getLocale();
            }
            return $user_lang;
        } catch (\Throwable $th) {
            return 'en';
        }
    }
}
if (!function_exists('isConnected')) {
    function isConnected()
    {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            fclose($connected);
            return true;
        }

        return false;
    }
}
if (!function_exists('isTestMode')) {
    function isTestMode()
    {
        if (env('APP_LAND') == true && env('APP_ENV') == 'local') {
            return true;
        } else {
            return false;
        }
    }
}
if (!function_exists('aboutSystem')) {
    function aboutSystem()
    {
        $data = [
            'version' => '',
            'release_date' => '',
        ];
        try {
            $about_system = base_path('version.json');
            $about_system = file_get_contents($about_system);
            $about_system = json_decode($about_system, true);
            $data['version'] = $about_system['version'];
            $data['release_date'] = $about_system['release_date'];
            return $data;
        } catch (\Throwable $th) {
            return $data;
        }
    }
}
if (!function_exists('putEnvConfigration')) {
    function putEnvConfigration($envKey, $envValue)
    {
        $envValue = str_replace('\\', '\\' . '\\', $envValue);
        $value = '"' . $envValue . '"';
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $str .= "\n";
        $keyPosition = strpos($str, "{$envKey}=");

        if (is_bool($keyPosition)) {

            $str .= $envKey . '="' . $envValue . '"';
        } else {
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
            $str = str_replace($oldLine, "{$envKey}={$value}", $str);

            $str = substr($str, 0, -1);
        }

        if (!file_put_contents($envFile, $str)) {
            return false;
        } else {
            return true;
        }
    }
}
// allowedUrls
if (!function_exists('allowedUrls')) {
    function allowedUrls()
    {
        $allowedUrls = [
            URL::route('service.install'),
            URL::route('service.checkEnvironment'),
            URL::route('service.license'),
            URL::route('service.license_post'),
            URL::route('service.database'),
            URL::route('service.database_post'),
            URL::route('service.uninstall'),
            URL::route('service.verify'),
            URL::route('service.user'),
            URL::route('service.user_post'),
            URL::route('service.done'),
            URL::route('service.reinstall'),
            URL::route('service.import_sql'),
            URL::route('service.import_sql_post'),
        ];
        return $allowedUrls;
    }
}

if (!function_exists('AuthPermitCheck')) {
    function AuthPermitCheck()
    {
        if (env('APP_DEMO')){
            return true;
        }
        // Check if all required files exist
        $WelcomeNote = Storage::disk('local')->exists('.WelcomeNote') ? Storage::disk('local')->get('.WelcomeNote') : null;
        $CheckEnvironment = Storage::disk('local')->exists('.CheckEnvironment') ? Storage::disk('local')->get('.CheckEnvironment') : null;
        $LicenseVerification = Storage::disk('local')->exists('.LicenseVerification') ? Storage::disk('local')->get('.LicenseVerification') : null;
        $DatabaseSetup = Storage::disk('local')->exists('.DatabaseSetup') ? Storage::disk('local')->get('.DatabaseSetup') : null;
        $AdminSetup = Storage::disk('local')->exists('.AdminSetup') ? Storage::disk('local')->get('.AdminSetup') : null;
        $Complete = Storage::disk('local')->exists('.Complete') ? Storage::disk('local')->get('.Complete') : null;

        // Check if all required files are present
        return $allFilesExist = $WelcomeNote && $CheckEnvironment && $LicenseVerification && $DatabaseSetup && $AdminSetup && $Complete;
    }
}

function formatDate($dateString)
{
    // Check if the date string is empty, null, or invalid
    if (empty($dateString) || $dateString === null || strtotime($dateString) === false) {
        // If it's empty, null, or invalid, return today's date
        $formattedDate = date('jS M Y');
    } else {
        // Convert the valid date string to a DateTime object
        $dateTime = new DateTime($dateString);
        // Format the date as "dS M Y" (e.g., "15th Sept 2023")
        $formattedDate = $dateTime->format('jS M Y');
    }
    return $formattedDate;
}

function sendSMSTwilio($number, $messageText)
{

    $sid = "AC318a64585f1f0e01e2b55c9b420ea5e8";
    $token = "a9cbff31ad1b58bcd8e8fd524c6ac382";
    $fromNumber = "+447893952353";
    $client = new Twilio\Rest\Client($sid, $token);
    $message = $client->messages->create(
        $number, // Text to this number
        [
            'from' => $fromNumber, // From a valid Twilio number
            'body' => $messageText,
        ]
    );

    return $message;
}


if (!function_exists('formatFileSize')) {
    function formatFileSize(int $size)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $size > 1024; $i++) {
            $size /= 1024;
        }

        return round($size, 2) . ' ' . $units[$i];
    }
}

if (!function_exists('getFileSize')) {
    /**
     * Get the size of a file in a human-readable format.
     *
     * @param string $path The path to the file.
     * @return string The size of the file in human-readable format.
     */
    function getFileSize($path)
    {
        // Check if the file exists
        if (file_exists($path)) {
            $size = filesize($path);
            $units = ['B', 'KB', 'MB', 'GB', 'TB'];

            // Calculate the appropriate unit and size
            $i = floor(log($size, 1024));
            return round($size / (1024 ** $i), 2) . ' ' . $units[$i];
        } else {
            return 'File not found';
        }
    }
}

if (!function_exists('getFileExtension')) {
    function getFileExtension($filePath) {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        return $extension;
    }
}

if (!function_exists('calculatePercentage')) {
    function calculatePercentage($oparetor, $percentValue, $total, $precision = 2)
    {
        if ($total == 0) {
            return 0;
        }
        if ($oparetor == 'fixed') {
            return $percentValue;
        } else {
            $percentage = ($total / $percentValue) * 100;

            return round($percentage, $precision);
        }
    }
}


// Price Format
if (!function_exists('priceFormat')) {
    function priceFormat($price)
    {
        return currency() . number_format($price ?? 0, 2);
    }
}

// currency
if (!function_exists('currency')) {
    function currency($field = 'symbol')
    {
        $currency = Currency::find(Setting('currency_id'));
        return $currency ? $currency[$field] : '$';
    }
}

// currency
if (!function_exists('currency')) {
    function currency($field = 'symbol')
    {
        $currency = Currency::find(Setting('currency_id'));
        return $currency ? $currency[$field] : '$';
    }
}


if (!function_exists('breadcrumb')) {
    function breadcrumb($list)
    {
        $html = '<div class="breadcrumb-warning d-flex justify-content-between ot-card">';
        if (@$list['title']) {
            $html .= '<h3>' . @$list['title'] . '</h3>';
            unset($list['title']);
        }
        $html .= '<nav aria-label="breadcrumb ">';
        $html .= '<ol class="breadcrumb ot-breadcrumb ot-breadcrumb-basic">';
        foreach ($list as $key => $value) {
            if ($key == '#') {
                $html .= '<li class="breadcrumb-item active">' . $value . '</li>';
            } else {
                $html .= '<li class="breadcrumb-item ">';
                $html .= '<a href="' . $key . '">' . $value . '</a>';
                $html .= '</li>';
            }
        }
        $html .= '</ol>';
        $html .= '</nav>';
        $html .= '</div>';
        return $html;
    }
}

if (!function_exists('notifications')) {
    function notifications()
    {
        return \App\Models\Notification::query()
            ->when(!isSuperAdmin(), function ($q) {
                $q->where('receiver_id', \auth()->id());
            })
            ->where('is_read', false)
            ->latest('created_at')
            ->get();
    }
}

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin()
    {
        if (\auth()->check()){
            return auth()->user()->role_id == 1 ? true : false;
        }
        return false;
    }
}






