<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('adminpages.user.user', ['users' => $users]);
    }

    public function destroy(string $id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        return redirect('users')->with('success', 'Xóa sản phẩm thành công');
    }
    
    public function sanpham(){
        $products = Product::where('new', 1)->get();
        return view('adminpages.product', ['products' => $products]);
    }

    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ Email',
            'email.email' => 'Không đúng định dạng @email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất phải 6 kí tự'
        ]);
        $credentials = array('email' => $request->email, 'password' => $request->password);
        // $level = $request->level;
        If(Auth::attempt($credentials)){
            // if($request->level == 1 || $request->level == 2){
                return redirect('/')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
            // }else{
            //     return redirect('/')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
            // }            
        }else{
            return redirect()->back()->with(['flag' => 'danger', 'thongbao' => 'Đăng nhập không thành công']);
        }
    }

    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getLogin');
    }

    // Admin User Area
    public function useraccount(){
        $users = User::all();
        return view('adminpages.user.user', ['users' => $users]);
    }

    public function create(){
        return view('adminpages.user.createuser');
    }

    public function store(Request $request)
    {
        // $name = '';
        $this->validate($request, [
            'full_name' => 'required',
            'password' => 'required',
            'email' => 'required|email:rfc,dns',
            'address' => 'required',
            'level' => 'required|numeric'
        ],[
            'full_name.required' => 'Bạn chưa nhập tên!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Bạn nhập không đúng định dạng Email!',
            'address.required' => 'Bạn chưa nhập địa chỉ!',
            'level.required' => 'Bắt buộc phải nhập số Cấp bậc (Level)!',
            'level.numeric' => 'Phải là số!'
        ]);

        $users = new User;
        $users->full_name = $request->full_name;
        $users->password = $request->password;
        $users->email = $request->email;
        $users->address = $request->address;
        $users->level = $request->level;
        $users->save();
        return redirect('users')->with('success', 'Thêm mới thành công!');
    }

    public function edit(string $id)
    {
        $users = User::find($id);
        return view('adminpages.user.edituser', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'full_name' => 'required',
            // 'password' => 'required',
            'email' => 'required|email:rfc,dns',
            'address' => 'required',
            'level' => 'required|numeric'
        ],[
            'full_name.required' => 'Bạn chưa nhập tên!',
            // 'password.required' => 'Bạn chưa nhập mật khẩu!',
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Bạn nhập không đúng định dạng Email!',
            'address.required' => 'Bạn chưa nhập địa chỉ!',
            'level.required' => 'Bắt buộc phải nhập số Cấp bậc (Level)!',
            'level.numeric' => 'Phải là số!'
        ]);
        
        // $product = Product::find($id);
        $users = User::findOrFail($id);
        $users->full_name = $request->full_name;
        // $users->password = $request->password;
        $users->email = $request->email;
        $users->address = $request->address;
        $users->level = $request->level;
        $users->save();
        return redirect()->route('users.index')->with('success','Bạn đã cập nhật thành công');
    }
}