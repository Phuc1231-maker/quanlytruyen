<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    //liên hệ
    public function getUserContacts(){
        return view('contacts.contact');
    }
// liên kết admin
    public function getContactMail(){
        $contact = Contact::all();
        return view('adminpages.contacts.contacts', ['contacts' => $contact]);
    }

    public function postContactMail(Request $request){
        $name = $request->input('name');
        $contact = $request->input('email');
        $content = $request->input('message');

        $data = [
            'title' => 'Thư phản hồi:',
            'body' => 'Cảm ơn bạn ' . $name . ' đã phản hồi, chúng tôi sẽ liên lạc lại bạn sớm nhất có thể!',
            'content' => 'Nội Dung phản hồi: ' . $content
        ];
        Mail::to($request->user())->cc($contact)->bcc($contact)->send(New ContactMail($data));

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ],[
            'name.required' => 'Bạn chưa nhập tên',
            'email.required' => 'Bạn chưa nhập gmail',
            'message.required' => 'Bạn chưa nhập mô tả',
        ]);

        $contacts = new Contact;
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->message = $request->message;
        $contacts->save();
        Session::flash('message', 'Send email successfully!');
        return view('contacts.contact');
    }

    public function destroy(string $id)
    {
        DB::delete('delete from contacts where id = ?', [$id]);
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }

    // public function addContactMail(Request $request){
    //     // $your_name = '';
        
    //     return redirect()->back()->with('success','Thêm danh mục thành công');
    // }
}