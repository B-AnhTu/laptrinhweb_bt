<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorities;

class UserFavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $sothich = Favorities::all();
        return view('sothich.danhsach', ['sothich' => $sothich]);
    }
}
