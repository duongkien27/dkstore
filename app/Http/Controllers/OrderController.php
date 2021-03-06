<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Social;
use Socialite;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha; 
use PDF;
class OrderController extends Controller
{
	public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function print_order($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_oder_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_oder_convert($checkout_code)
    {
        return $checkout_code;
    }
    public function manage_order()
    {
       $this->AuthLogin();
       $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order  = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order); 
    }
    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*','tbl_payment.*')->first();
        $product_order_by_id = DB::table('tbl_order')->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')->select('tbl_order.*','tbl_order_details.*')->get();
        $manager_order_by_id  = view('admin.view_order')->with('order_by_id',$order_by_id)->with('product_order_by_id',$product_order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id); 
    }
    public function unactive_bill($order_id){
         $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status'=>'??ang ch??? x??? l??']);
        DB::table('tbl_order')->where('order_id',$order_id)->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')->update(['payment_status'=>'??ang ch??? x??? l??']);
        Session::put('message','H???y x??c nh???n ????n h??ng th??nh c??ng');
        return Redirect::to('manage-order');

    }
    public function active_bill($order_id){
         $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status'=>'???? x??c nh???n']);
        DB::table('tbl_order')->where('order_id',$order_id)->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')->update(['payment_status'=>'???? x??c nh???n']);
        Session::put('message','X??c nh???n ????n h??ng th??nh c??ng');
        return Redirect::to('manage-order');
    }
    public function delete_bill($order_id){
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_id)->delete();
        DB::table('tbl_order_details')->where('order_id',$order_id)->delete();
        Session::put('message','X??a h??a ????n th??nh c??ng');
        return Redirect::to('manage-order');
    }
}
