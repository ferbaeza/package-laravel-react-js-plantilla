<?php

namespace Baezeta\App\Shared\Utils;

use RuntimeException;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\File;

class HtmlUtils
{
    /**
     * Get the paths to the JavaScript and CSS files from the asset manifest.
     *
     * @return array
     */
    public static function getAssetPaths()
    {
        $manifestPath = __DIR__ . '/../../../public/asset-manifest.json';

        if (!File::exists($manifestPath)) {
            throw new RuntimeException('Unable to load the asset manifest.');
        }

        $manifest = json_decode(File::get($manifestPath), true);

        $jsFiles = array_filter($manifest['files'], function ($file) {
            return Str::endsWith($file, '.js');
        });

        $cssFiles = array_filter($manifest['files'], function ($file) {
            return Str::endsWith($file, '.css');
        });

        foreach ($manifest['entrypoints'] as $file) {
            if(Str::endsWith($file, '.js')) {
                $js[] = $file;
            }
            if(Str::endsWith($file, '.css')) {
                $css[] = $file;
            }
        }
        return ['js' => $js[0], 'css' => $css[0]];
    }

    /**
     * Get the CSS for the dashboard.
     *
     * @return Illuminate\Contracts\Support\Htmlable
     */
    public static function css()
    {
        $css  = (self::getAssetPaths())['css'];
        if (($app = @file_get_contents(__DIR__.'/../../../public/'. $css )) === false) {
            throw new RuntimeException('Unable to load the dashboard CSS.');
        }

        return new HtmlString(<<<HTML
            <style>{$app}</style>
            HTML);
    }

    public static function hello()
    {
        $js  = (self::getAssetPaths())['js'];
        $script = asset('vendor/zataca/trazer/public/' . $js);
        return "<script src='{$script}'></script>";
    }

    /**
     * Get the JS for the Horizon dashboard.
     *
     * @return \Illuminate\Contracts\Support\Htmlable
     */
    public static function js()
    {
        $js  = (self::getAssetPaths())['js'];
        if (($script = @file_get_contents(__DIR__. '/../../../public/' . $js)) === false) {
            throw new RuntimeException('Unable to load the dashboard JavaScript.');
        }
        return new HtmlString(<<<HTML
                    <script>{$script}</script>
            HTML);
    }
}
