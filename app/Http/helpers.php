<?php

use App\Models\WebInfo;

if (!function_exists('uploadFile')) {
  function uploadFile($file, $path, $old_file = null)
  {
    $realName = $file->getClientOriginalName();
    $filename = $file->hashName();
    $file->move($path, $filename);
    $fullpath = $path . $filename;

    if ($old_file) {
      if (file_exists($old_file)) {
        unlink($old_file);
      }
    }
    return $fullpath;
  }
}

if (!function_exists('webinfo')) {
  function webinfo()
  {
    $info = WebInfo::first();
    return $info;
  }
}
