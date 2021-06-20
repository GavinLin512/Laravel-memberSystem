<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\ProductImg;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    //建構值
    function __construct()
    {
        $this->index = 'admin.product.item.index';
        $this->create = 'admin.product.item.create';
        $this->edit = 'admin.product.item.edit';
        $this->show = 'admin.product.item.show';
    }

    public function index()
    {
        $lists = Product::get();
        // foreach ($lists as $key => $value) {
        //      $record = ProductImg::where('photo')->get();
        // }

        // $photos = $record->photos;
        // dd($record);

        return view($this->index, compact('lists'));
    }

    public function create()
    {
        $type = ProductType::get();
        return view($this->create, compact('type'));
    }

    public function store(Request $request)
    {
        // Product::create([
        //     'product_name' => $request['product_name'],
        //     'price' => $request['price'],
        //     'discript' => $request['discript'],
        //     'product_type_id' => $request['product_type_id'],
        // ]);
        $new_record = Product::create($request->all());

        if ($request->hasFile('photos')) {
            // dd($request->photos);
            foreach ($request->file('photos') as $item) {

                // 因為已經跑 foreach，所以 $item 後面就不用再指定
                $path = FileController::imageUpload($item);
                // dd($request->img, public_path());

                ProductImg::create([
                    'photo' => $path,
                    'product_id' => $new_record->id,
                ]);
            }
        }

        return redirect('/admin/product/item')->with('message', '新增產品品項成功！');
    }


    public function edit($id)
    {
        $record = Product::find($id);
        $type = ProductType::get();
        $photos = $record->photos;
        // dd($type);

        return view($this->edit, compact('record', 'type', 'photos'));
    }

    public function update(Request $request, $id)
    {
        $old_record = Product::find($id);
        $old_record->product_name = $request->product_name;
        $old_record->price = $request->price;
        $old_record->discript = $request->discript;
        $old_record->product_type_id = $request->product_type_id;
        $old_record->save();

        return redirect('/admin/product/item')->with('message', '編輯產品品項成功！');
    }

    public function delete(Request $request, $id)
    {
        $old_record = Product::find($id);
        $old_record->delete();

        return redirect('/admin/product/item')->with('message', '刪除產品品項成功！');
    }

    public function deleteImage(Request $request)
    {
        dd($request->id);
        // 先透過 ID 找出要刪除的資料
        $old_record = ProductImg::find($request->id);
        // 判斷要刪除的檔案
        if (file_exists(public_path() . $old_record->photo)) {
            // 如果該檔案存在，就刪除該檔案
            File::delete(public_path() . $old_record->photo);
        }
    }
}