<?php

namespace App\Http\Controllers;

use App\Mail\phucMail;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\List_Like;
use App\Models\Product;
use App\Models\product_type;
use App\Models\Slide;
use App\Models\User;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index(){
        // $products = Product::all();
        $products = Product::where('new', 1)->get();
        $new_slides = Slide::all();
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(4);
        // $top_products = Product::where('top', 1)->get();
        return view('index', ['products' => $products, 'new_slides' => $new_slides, 'sanpham_khuyenmai' => $sanpham_khuyenmai]);
    }

    public function product(Request $req){
        // $details = Product::all();
        $sanpham = Product::where('id', $req->id)->first();
        if ($sanpham) {
            $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(3);
            // Tiếp tục xử lý dữ liệu ở đây
        } else {
            // Xử lý trường hợp khi $sanpham là null
            if (!$sanpham) {
                // Xử lý trường hợp không tìm thấy sản phẩm
                // Ví dụ: trả về 404 hoặc thông báo lỗi
                return abort(404); // Trả về trang lỗi 404
            }
        }
            
        // $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(3);
        // return view('product', ['products' => $details]);
        return view('product', compact('sanpham', 'sp_tuongtu'));
    }

    public function sanpham_main(){
        $details = Product::all();
        return view('product', ['products' => $details]);
    }

    public function product_type($type){
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type','<>', $type)->paginate(3);
        $loai = product_type::all();
        $loai_sp = product_type::where('id', $type)->first();
        return view('product_type', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }

    public function getChitiet(Request $req){
        $sp = Product::where('id', $req->id)->first();
        return view('product_detail', compact('sp'));
    }

    //liên hệ
   
    //thông tin
    public function about(){
        return view('about');
    }
    //kiểm tra
    public function checkout(){
        return view('checkout');
    }

    public function postCheckout(Request $request){
       
        $cart=Session::get('cart');
        $customer=new Customer();
        $customer->name=$request->input('name');
        $customer->gender=$request->input('gender');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->phone_number=$request->input('phone_number');
        $customer->note=$request->input('note');
        $customer->save();

        $bill=new Bill();
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$request->input('payment_method');
        $bill->note=$request->input('notes');
        $bill->save();

        foreach($cart->items as $key=>$value)
        {
            $bill_detail=new BillDetail();
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('success','Đặt hàng thành công');
    }

    public function getCheckout(){
        return view('checkout');
    }

    // End Checkout area

    public function shopping_cart(){
        return view('shopping_cart');
    }

    public function addToCart(Request $request,$id){
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

    //thêm 1 sản phẩm có số lượng >1 có id cụ thể vào model cart rồi lưu dữ liệu của model cart vào 1 session có tên cart (session được truy cập bằng thực thể Request)
    public function addManyToCart(Request $request,$id){
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->addMany($product,$id,$request->qty);
        $request->session()->put('cart',$cart);
       
        return redirect()->back();
    }


    public function delCartItem($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else Session::forget('cart');
        return redirect()->back();
    }

    // Khu vuc signin
    public function getSignin(){
        return view('signup');
    }

    public function postSignin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'full_name'=>'required',
            'repassword'=>'required|same:password'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử  dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'repassword.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]);

        $user=new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        // $user->repassword = $req->repassword;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->level = 3;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $user->save();
        return redirect()->back()->with('success','Tạo tài khoản thành công');
     }

     public function getSearch(Request $request){
        $product = Product::where('name','like','%'.$request->key.'%')->orWhere('unit_price',$request->key)->get();
        return view('search', compact('product'));
    }

    //yêu thích
    public function list_like()
    {
        $list_like = session('list_like');
        $new_products = [];

        if ($list_like) {
            foreach ($list_like->items as $item) {
                $new_products[] = $item['item'];
            }
        }

        return view('list_like', compact('new_products'));
    }

    // Thêm 1 sản phẩm có id cụ thể vào danh sách yêu thích
    public function addToList(Request $request, $id)
    {
        $product = Product::find($id);
        $oldList = $request->session()->has('list_like') ? $request->session()->get('list_like') : null;
        $list = new List_Like($oldList);
        $list->add($product, $id);
        $request->session()->put('list_like', $list);
        
        // Thông báo đã thêm sản phẩm vào danh sách yêu thích
        $message = 'Đã thêm sản phẩm vào danh sách yêu thích.';
        return redirect()->back()->with('message', $message);
    }

    // Xóa 1 sản phẩm khỏi danh sách yêu thích dựa trên id
    public function delListItem($id)
    {
        $oldList = Session::has('list_like') ? Session::get('list_like') : null;
        $list = new List_Like($oldList);
        
        // Kiểm tra xem người dùng muốn xóa sản phẩm hay không

            $list->removeItem($id);
            if (count($list->items) > 0) {
                Session::put('list_like', $list);
            } else Session()->forget('list_like');
            // Thông báo đã xóa sản phẩm khỏi danh sách yêu thích
            $message = 'Đã xóa sản phẩm khỏi danh sách yêu thích.';
            return redirect()->back()->with('message', $message);
        
    }

    public function getinputEmail() {
        return view('emails.input-email');
    }
    public function postinputEmail(Request $req) {
        $email=$req->email;
        //validate

        // kiểm tra có user có email như vậy không
        $user=User::where('email',$email)->get();
        //dd($user);
        // if($user->count()!=0){
            //gửi mật khẩu reset tới email
            $sentData = [
                'title' => 'Mật khẩu mới của bạn là:',
                'body' => '123456'
            ];
            Mail::to($req->user())->cc("phucnguyentk196@gmail.com")->bcc("phucnguyentk196@gmail.com")->send(new phucMail($sentData));
            Session::flash('message', 'Send email successfully!');
           
            return view('emails.input-email');  //về lại trang đăng nhập của khách
        // }
        // else {
        //       return redirect()->route('getInputEmail')->with('message','Your email is not right');
        // }
    }//hết postInputEmail
}
