<?php

use Illuminate\Support\Facades\File;

if (! function_exists('publish_nomic_assets')) {
    function publish_nomic_assets()
    {
        $publicPath = public_path('vendor/keygun/nomic');

        if (! is_dir($publicPath)) {
            mkdir($publicPath, 0755, true);
        }

        $srcPath = __DIR__.'/../public/css';
        $files = File::allFiles($srcPath);

        foreach ($files as $file) {
            $path = $publicPath.'/'.$file->getRelativePathname();
            File::copy($file->getPathname(), $path);
        }
    }
}
