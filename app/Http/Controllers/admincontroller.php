<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_products;
use App\products;
class admincontroller extends Controller
{
    public function get_list_pro(){
        return view('admin.product.list');
    }
    public function get_add_pro()
    {
        return view('admin.product.add');
    }
    public function get_edit_pro()
    {
        return view('admin.product.edit');
    }

    public function get_list_type()
    {
        $product_type = type_products::all();
        return view('admin.product_type.list',compact('product_type'));
    }
    public function get_add_type()
    {
        return view('admin.product_type.add');

    }
    public function post_add_type(Request $req)
    {
       $this->validate($req,
       [
                'name' => 'unique:type_products|min:5|max:50'

       ],
       [
            'name.unique' => 'Tên bị trùng',
           'name.min'=> 'Nhập từ 5 đến 50 kí tự',
            'name.max' => 'Nhập từ 5 đến 50 kí tự',
       ]);
       $pro_type = new type_products;
       $pro_type->name= $req->name;
        $pro_type->image = $req->image;
       $pro_type->save();

       return redirect('admin/product_type/add')->with('thongbao','Thêm thành công');
 
    }
    public function get_edit_type($id)
    {
        $type=type_products::find($id);
        return view('admin.product_type.edit',compact('type'));
    }
    public function post_edit_type(Request $req,$id)
    {
        $type= type_products::find($id);
        $this->validate(
            $req,
            [
                'name' => 'unique:type_products|min:5|max:50'

            ],
            [
                'name.unique'=>'Tên bị trùng',
                'name.min' => 'Nhập từ 5 đến 50 kí tự',
                'name.max' => 'Nhập từ 5 đến 50 kí tự',
            ]
        );

        $type->name=$req->name;
        $type->image = $req->image;
        $type->save();
        // return redirect()->back()->with('thongbao','Sửa thành công');
        return redirect('admin/product_type/list')->with('thongbao','sua thanh cong');
    }
    public function get_delete_type($id)
    {
        $type = type_products::find($id);
        $type->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
    }

}
