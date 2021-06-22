<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    //
    public function __construct()
    {
        $this->index = 'admin.contact_us.index';
        $this->create = 'admin.contact_us.create';
        $this->edit = 'admin.contact_us.edit';
    }

    public function index()
    {
        $lists = ContactUs::get();
        return view($this->index, compact('lists'));
    }

    public function delete($id)
    {
        $old_record = ContactUs::find($id);
        $old_record->delete();

        return redirect('/admin/contact_us')->with('message', '刪除聯絡我們成功！');
    }

    public function store(Request $request)
    {
        // dd($request ->all());
        ContactUs::create($request->all());

        // ContactUs::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'subject' => $request->subject,
        //     'message_return' => $request->message_return

        // ]);
        //messenge session
        return redirect('/contact_us')->with('message', '成功聯絡我們！');
    }

    public function edit($id)
    {
        $record = ContactUs::find($id);

        return view($this->edit, compact('record'));

    }
}
