<?php

namespace App\Http\Controllers;
use App\slide;
use App\products;
use App\Cart;
use Illuminate\Http\Request;
use App\type_products;
use Session;
use App\customer;
use App\bill;
use App\bill_detail;
use App\User;
use Hash;
use Auth;
class layoutcontroller extends Controller
{
    public function getindex(){
        $slide=Slide::all();    
        //return view('page.index',['Slite'=>$slide]);
        $new_product=Products::where('new',1)->paginate(8);
        $sale_product = Products::where('promotion_price','<>' ,0)->paginate(8);
        return view('page.index', compact('slide','new_product','sale_product'));
    }

    public function gettype_product($type){
        $sp_theoloai= Products::where('id_type',$type)->paginate(6);
        $sp_khac = Products::where('id_type','<>',$type)->paginate(3);
        $loai = type_products::all();
        $loai_sp = type_products::where('id',$type)->first() ;
        return view('page.type_product',compact('sp_theoloai','sp_khac','loai', 'loai_sp'));
    }

    public function get_product(request $req){

        $sanpham=Products::where('id',$req->id)->first();
        $sp_tt=Products::where('id_type', $sanpham->id_type)->paginate(6);
        $sp_gg= Products::where('promotion_price', '<>', 0)->get();
       
        return view('page.product',compact('sanpham','sp_tt','sp_gg'));
    }
    public function get_about()
    {
        return view('page.about');
    }
    public function get_contacts()
    {
        return view('page.contacts');
    }

    public function get_addtocart(request $req,$id){
        $product= Products::find($id);
        $oldcart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->add($product,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();  
    }

    public function get_deletetocart($id){
        $oldcart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id);
        if(count($cart->items) >0){
            Session::put('cart',$cart);     
        }
        else {
            Session::forget('cart');
            
        } 
        return redirect()->back();
    }


    public function get_checkout()
    {
        return view('page.checkout');
    }
    public function get_login()
    {
        return view('page.login');
    }
    public function get_signup()
    {
        return view('page.signup');
    }    
    public function post_checkout(request $req){
        $cart =Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address= $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order= date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment= $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();
        
        foreach ($cart->items as $key => $value) {
             $bill_detail = new bill_detail;
             $bill_detail->id_bill = $bill->id;
             $bill_detail->id_product = $key;
             $bill_detail->quantity = $value['qty'];
             $bill_detail->unit_price=($value['price']/ $value['qty']);
             $bill_detail->save();

        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');

      
    }

    public function post_signup(Request $req)
    {
       $this->validate($req,
           [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:25',
                'fullname'=> 'required',
                're_password'=>'required|same:password'
           ],
           [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email này đã được sử dụng.Nhập lại email',
                'password.required'=> 'Vui lòng nhập password',
                'password.min'=> 'Mật khẩu phải từ 6 đến 25 kí tự',
                'password.max' => 'Mật khẩu phải từ 6 đến 25 kí tự',
                'fullname.required' => 'Vui lòng nhập fullname',
                're_password.required' => 'Vui lòng nhập re_password',
                're_password.same'=>'Mật khẩu không trùng.Vui lòng nhập lại'
           ]);
        
        $user = new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thongbao','Tạo tài khoản thành công','thongbao2','Tạo tài khoản thất bại');
    }  

    public function post_login(Request $req)
    {
        $this->validate($req,
        [
            'password'=>'required|min:6|max:25',
            'email' =>'required|email'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email khong đúng định dạng',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=> 'Password phải từ 6 đến 25 kí tự',
            'password.max' => 'Password phải từ 6 đến 25 kí tự'
        ]);

        $credential= array('email'=>$req->email,'password'=>$req->password);
        if(auth::attempt($credential)){
            return redirect()->back()->with(['flag'=>'success','thongbao'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag' => 'danger', 'thongbao' => 'Đăng nhập không thành công']);
        }
    }

    public function get_logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function get_search(Request $req)
    {
       $product= products::where('name','like','%'.$req->key.'%')
                            ->orwhere('unit_price',$req->key)->get();
        return view('page.search',compact('product'));
    } 
}

