<?php


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
