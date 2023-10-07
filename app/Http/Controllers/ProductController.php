<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('adminpages.product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpages.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = '';
        if($request->hasFile('image')){
            $this->validate($request, [
                'name' => 'required',
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'unit' => 'required'
            ],[
                'name.required' => 'Bạn chưa nhập tên sản phẩm',
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                'descrtiption.required' => 'Bạn chưa nhập mô tả',
                'unit_price.required' => 'Bạn chưa nhập giá gốc',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
                'unit.required' => 'Bạn cần phải nhập Đơn vị của sản phẩm (Hộp/Cái)'
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name);
        } else {
            $this->validate($request,[
                'name' => 'required',
                'image' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'unit' => 'required'
            ],[
                'name.required' => 'Bạn chưa nhập tên sản phẩm',
                'image.required' => 'Bạn chưa chọn hình ảnh',
                'descrtiption.required' => 'Bạn chưa nhập mô tả',
                'unit_price.required' => 'Bạn chưa nhập giá gốc',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
                'unit.required' => 'Bạn cần phải nhập Đơn vị của sản phẩm (Hộp/Cái)'
            ]);
        }

        $products = new Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        $products->new = 1;
        $products->unit = $request->unit;
        $products->image = $name;
        $products->save();
        return redirect('products')->with('success', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trả về view hiển thị thông tin chi tiết của món ăn
        // return view('foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        return view('adminpages.editproduct', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'name' => 'required',
                'description' => 'required',
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'unit' => 'required'
            ],[
                'name.required' => 'Bạn chưa nhập tên sản phẩm',
                'descrtiption.required' => 'Bạn chưa nhập mô tả',
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'unit_price.required' => 'Bạn chưa nhập giá gốc',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
                'unit.required' => 'Bạn cần phải nhập Đơn vị của sản phẩm (Hộp/Cái)'
            ]);

            $file = $request->file('image');
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('images'); //project\public\car, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'promotion_price' => 'required',
            'unit' => 'required'
        ],[
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'descrtiption.required' => 'Bạn chưa nhập mô tả',
            'unit_price.required' => 'Bạn chưa nhập giá gốc',
            'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
            'unit.required' => 'Bạn cần phải nhập Đơn vị của sản phẩm (Hộp/Cái)'
        ]);
        
        // $product = Product::find($id);
        $products = Product::findOrFail($id);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        //$product->image = $request->image;
        $products->unit = $request->unit;
        if($name = ''){
            $name = $products->image;
        }
        $products->image = $name;
        $products->save();
        return redirect()->route('products.index')->with('success','Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('delete from products where id = ?', [$id]);
        return redirect('products')->with('success', 'Xóa sản phẩm thành công');
    }
}
