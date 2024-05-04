<?php

namespace App\Http\Controllers;

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
        // Sau khi cập nhật thành công, redirect về trang read của user
        return redirect()->route('user.list')->withSuccess('Bài viết đã được tạo thành công!');    }

    /**
     * Display the specified resource.
     */
    public function readPost(Request $request)
    {
        // Lấy id của bài post cần đọc và tìm đúng id đó
        $post_id = $request->get('id');
        $post = Posts::find($post_id);
        // Đường dẫn đến trang read với biến truyền đi là post và thông tin về người dùng
        return view('user_post.read', ['post' => $post]);

        }

    /**
     * Show the form for editing the specified resource.
     */
    public function updatePost(Request $request)
    {
        //Tìm id của post cần sửa
        $post_id = $request->get('id');
        $post = Posts::where('post_id', $post_id);
        
        // Trả về view cập nhật bài viết với dữ liệu của post
        return view('user_post.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function postUpdatePost(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'post_name' =>'required|max:50',
            'post_description' =>'required|max:100',
        ]);
        $post_id = $request->get('id');

        // Tìm bản ghi có ID tương ứng và thuộc về người dùng hiện tại
        $post = Posts::where('post_id', $post_id)->where('user_id', auth()->id())->first();

        if (!$post) {
            // Nếu không tìm thấy bản ghi, bạn có thể xử lý theo ý của mình, ví dụ: thông báo lỗi hoặc chuyển hướng.
            return redirect()->back()->withErrors(['message' => 'Post not found or you do not have permission to update it.']);
        }

        // $post = Posts::find($request->id);
        $post->post_name = $request->post_name;
        $post->post_description = $request->post_description;
        $post->save();
        // Trở về trang read của người dùng sau khi hoàn tất cập nhật
    return view('crud_user.read', ['id' => $post->user_id])->withSuccess('Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletePost(Request $request)
    {
        //Tìm id của post cần xóa
        $post_id = $request->get('id');
        $post = Posts::find($post_id);

        // Kiểm tra xem bài viết có tồn tại không
        if ($post) {
            $post->delete();
            // Trở về trang người dùng với thông báo xóa thành công
            return redirect()->route('user.list')->withSuccess('Bài viết đã được tạo thành công!');    
        } else {
            // Xử lý nếu không tìm thấy bài viết
        }
    }
}
