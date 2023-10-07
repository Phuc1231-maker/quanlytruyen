<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::all();
        return view('adminpages.bill.bills', ['bills' => $bills]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bills = Bill::find($id);
        return view('adminpages.bill.bill_edit', compact('bills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasfile('image')) {
            $this->validate($request, [
                'total' => 'required',
                'payment' => 'required',             
            ], 
            [
                'total.required' => 'Bạn chưa nhập total',
                'payment.required' => 'Bạn chưa nhập hình thức thanh toán',                
            ]);
            // $file = $request->file('image');
            // $imgname = time() . '_' . $file->getClientOriginalName();
            // $destinationPath = public_path('source/image/product'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            // $file->move($destinationPath, $imgname); //lưu hình ảnh vào thư mục public/category
        } else {
            $this->validate($request, [
                'total' => 'required',
                'payment' => 'required',             
            ], 
            [
                'total.required' => 'Bạn chưa nhập total',
                'payment.required' => 'Bạn chưa nhập hình thức thanh toán',                
            ]);
        }
        $total = $request->total;
        $pm = $request->payment;
        $nt = $request->note;
       
        // $description = $request->description; 
        // $name = $request->name;
        // $image = $imgname;
       
        DB::table('bills')->where('id', $id)->update([
            'total' => $total,
            'payment' => $pm,
            'note' => $nt,
           
        ]);
        
        return redirect(route('bills.index'))->with('success','Cập nhật sản phẩm thành công!');
    }

    public function updateBillAdmin(Request $request, string $id){
        $bill = Bill::find($id);
        $bill->status = $request->input('status');
        $bill->save();
        return redirect('bills')->with('success','Cập nhật đơn hàng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Bill::find($id)->delete();
        return redirect()->back()->with('success','Xóa danh mục thành công');
    }
}
