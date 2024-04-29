<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listPost()
    {
        if(Auth::check()){
            $posts = Posts::paginate(3);
            return view('user_post.list', ['posts' => $posts]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPost()
    {
        //Đường dẫn đến trang tạo post
        return view('user_post.create');
    }

    /**
     * User submit post form
     */
    public function postUserPost(Request $request)
    {
        $request->validate([
            'post_name' => 'required|max:50',
            'post_description' => 'required|max:100',
        ]);

        $data = $request->all();

        $user = Auth::user();

        //Tạo bài post mới
        $post = new Posts([
            'post_name' => $request->post_name,
            'post_description' => $request->post_description,
            
        ]);

        $user->posts()->save($post);
        //Trở lại trang danh sách
        return redirect()->route('user.list')->withSuccess('Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function readPost(Request $request)
    {
        //Lấy id của bài post cần đọc và tìm đúng id đó
        $post_id = $request->get('post_id');
        $post = Posts::find($post_id);
        //Đường dẫn đến trang read với biến truyền đi là post
        return view('user_post.read', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updatePost(Request $request)
    {
        //Tìm id của post cần sửa
        $post_id = $request->get('post_id');
        $post = Posts::find($post_id);
        //Chuyển đến trang update
        return view('user_post.update', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function postUpdatePost(Request $request, string $id)
    {
        $input = $request->all();

        $request->validate([
            'post_name' =>'required|max:50',
            'post_description' =>'required|max:100',
        ]);

        $post = Posts::find($request->id);
        $post->post_name = $request->post_name;
        $post->post_description = $request->post_description;
        $post->save();
        //Trở về trang danh sách với thông báo cập nhật thành công
        return redirect("user_post.list")->withSuccess('Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletePost(Request $request)
    {
        //Tìm id của post cần xóa
    $post_id = $request->get('post_id');
    $post = Posts::find($post_id);

    // Kiểm tra xem bài viết có tồn tại không
    if ($post) {
        $post->delete();
        //Trở về trang danh sách với thông báo xóa thành công
        return redirect("user_post.list")->withSuccess('Post deleted successfully!');
    } else {
        // Nếu không tìm thấy bài viết, có thể chuyển hướng người dùng đến một trang lỗi hoặc thực hiện xử lý khác tùy theo yêu cầu của ứng dụng.
        return redirect()->back()->withError('Post not found.');
    }
    }
}
