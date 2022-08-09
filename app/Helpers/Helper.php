<?php

use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

if (! function_exists('upload')) {
    function upload ($directory, $file, $filename = "") {
        $extensi = $file->getClientOriginalExtension();
        $filename = "{$filename}_". date('Ymdhis') ."{$extensi}";

        Storage::disk('public')->putFileAs("/$directory", $file, $filename);

        return "/$directory/$filename";
    }
}

if (! function_exists('menu')) {
    function getMenu () {
       return Menu::with('submenu')->get();
    }
}