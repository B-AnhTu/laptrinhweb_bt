<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    /**
     * Show the form for creating a new resource.
     */
    public function createFavorite()
    {
        return view('favorite.create');
    }
    public function postFavorite(Request $request){
        $request->validate([
            'favorite_name' => 'required|max:50',
            'favorite_description' => 'required|max:100',
        ]);

        $data = $request->all();

        $user = Auth::user();

        $favorite = new Favorities([
            'favorite_name' => $data['favorite_name'],
            'favorite_description' => $data['favorite_description'],
        ]);
    }
    public function updateFavorite(Request $request){
        $favorite_id = $request->get('favorite_id');

        // Tìm bản ghi có ID tương ứng và thuộc về người dùng hiện tại
        $favorite = Favorities::find($favorite_id);
        return view('favorite.update', ['favorite' => $favorite]);
    }
    public function postUpdateFavorite(Request $request){
        $input = $request->all();

        $request->validate([
            'favorite_name' =>'required|max:50',
            'favorite_description' =>'required|max:100',
        ]);
        $favorite_id = $request->get('favorite_id');

        // Tìm bản ghi có ID tương ứng và thuộc về người dùng hiện tại
        $favorite = Favorities::find($favorite_id);
        $favorite->favorite_name = $input['favorite_name'];
        $favorite->favorite_description = $input['favorite_description'];
        $favorite->save();

        return redirect()->route('favorite.list');
    }
    public function deleteFavorite(Request $request){
    
        $favorite_id = $request->get('favorite_id');

        // Tìm bản ghi có ID tương ứng và thuộc về người dùng hiện tại
        $favorite = Favorities::find($favorite_id);
        $favorite->delete();

        return redirect()->route('favorite.list');
    }
}
