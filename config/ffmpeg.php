<?php

return [

    /*
    |--------------------------------------------------------------------------
    | FFmpeg & FFProbe Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the paths to the FFmpeg and FFProbe binaries.
    | You may also configure the timeout for the underlying process.
    |
    */

    'ffmpeg' => [
        'binaries' => env('FFMPEG_BINARIES', '/path/to/ffmpeg'),
        'timeout' => env('FFMPEG_TIMEOUT', 3600), // in seconds
    ],

    'ffprobe' => [
        'binaries' => '/opt/homebrew/bin/ffprobe', // Path to FFProbe binary
        'timeout' => env('FFPROBE_TIMEOUT', 3600), // in seconds
    ],

];
