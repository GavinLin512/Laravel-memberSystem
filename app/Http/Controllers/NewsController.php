<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    //
    //建構值
    function __construct()
    {
        $this->index = 'admin.news.index';
        $this->create = 'admin.news.create';
        $this->edit = 'admin.news.edit';
        $this->show = 'admin.news.show';
    }

    public function index()
    {
        # 通常不會在 controller 限制，會在 Route
        // if (Gate::allows('admin')) {
        //     return view($this->index);
        // } else {
        //     return '你不是系統管理員';
        // }

        $lists = News::get();
        return view($this->index, compact('lists'));
    }

    public function create()
    {
        $type = News::TYPE;
        return view($this->create, compact('type'));
    }

    public function store(Request $request)
    {

        // dd($request->img, public_path());
        if ($request->hasFile('img')) {
            $path = FileController::imageUpload($request->file('img'));
        }

        News::create([
            'type' => $request['type'],
            'publish_date' => date("Y-m-d"),
            'title' => $request->title,
            'img' => $path ?? '',
            'content' => $request->content
        ]);

        return redirect('/admin/news')->with('message', '新增最新消息成功！');
    }

    public function edit($id)
    {
        $record = News::find($id);
        $type = News::TYPE;

        return view($this->edit, compact('record', 'type'));
    }

    public function update(Request $request, $id)
    {
        $old_record = News::find($id);

        // dd(public_path() . $old_record->img);


        // 較不嚴謹的寫法：$file = $request->img;
        $file = $request->file('img');
        // dd($request->img, public_path());
        if ($request->hasFile('img')) {
            // 刪除舊圖片
            File::delete(public_path() . $old_record->img);
            // 如果上傳檔案的資料夾不存在
            if (!is_dir('upload/')) {
                // 創造一個上傳檔案的資料夾
                mkdir('upload/');
            };
            // 取得副檔名
            $extention = $request->img->getClientOriginalExtension();
            // 亂數命名，有很多方式，估狗“php 產生亂數”
            $filename = md5(uniqid(rand())) . '.' . $extention;
            // dd($filename . '.' . $extention);
            $path = '/upload/' . $filename;

            // 用原始路徑：/Users/linjiamin/Documents/GitHub/Laravel-memberSystem/public 會寫死，檔案或資料夾移位就報錯了
            move_uploaded_file($file, public_path() . $path);
            // 讓
            $old_record->img = $path;
        }

        $old_record->type = $request->type;
        $old_record->publish_date = $request->publish_date;
        $old_record->title = $request->title;
        $old_record->content = $request->content;
        $old_record->save();

        return redirect('/admin/news')->with('message', '編輯最新消息成功！');
    }

    public function delete(Request $request, $id)
    {
        $old_record = News::find($id);
        $old_record->delete();

        return redirect('/admin/news')->with('message', '刪除最新消息成功！');
    }
}
