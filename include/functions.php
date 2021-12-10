<?php
//File put contents fails if you try to put a file in a directory that doesn't exist. This creates the directory.

function file_force_contents($fullPath, $contents, $flags = 0)
{
   $parts = explode('/', $fullPath);
   array_pop($parts);
   $dir = implode('/', $parts);

   if (!is_dir($dir))
      mkdir($dir, 0777, true);

   file_put_contents($fullPath, $contents, $flags);
}

// Echo out the input number
// @param inputNumber:int
function substitute($inputNumber)
{
   return $inputNumber;
}


function redirect($url, $statusCode = 303)
{
   header('Location:' . $url, true, $statusCode);
   die();
}
function checkForKeys($array, $keys): bool
{
   foreach ($keys as $item) {
      if (!isset($array[$item])) {
         return false;
      }
   }
   return true;
}
//Utility function to get base url
if (!function_exists('base_url')) {
   function base_url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE)
   {
      if (isset($_SERVER['HTTP_HOST'])) {
         $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
         $hostname = $_SERVER['HTTP_HOST'];
         $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

         $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
         $core = $core[0];

         $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
         $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
         $base_url = sprintf($tmplt, $http, $hostname, $end);
      } else $base_url = 'http://localhost/';

      if ($parse) {
         $base_url = parse_url($base_url);
         if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
      }

      return $base_url;
   }
}
