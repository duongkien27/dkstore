<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    // public function send_mail(){
    //      //send mail
    //             $to_name = "Hieu Tan Tutorial";
    //             $to_email = "hieuchance2018@gmail.com";//send to this email
               
             
    //             $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php
                
    //             Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

    //                 $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
    //                 $message->from($to_email,$to_name);//send from this mail

    //             });
    //             // return redirect('/')->with('message','');
    //             //--send mail
    // }

    public function index(Request $request){
        //seo 
        $meta_desc = "Chuyên bán những phụ kiện gym và thực phẩm dinh dưỡng, Là 1 gymer ngoài việc có body đẹp cần là 1 người có ích trong xã hội: trí tuệ, sức khỏe"; 
        $meta_keywords = "thuc pham chuc nang, thực phẩm chức năng, phụ kiện gym";
        $meta_title = "Thực phẩm bổ sung thể hình, phụ kiện tập GYM VIP";
        $url_canonical = $request->url();
        //--seo
        
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(15)->get(); 

    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function search(Request $request){
        //seo 
        $meta_desc = "Tìm kiếm sản phẩm"; 
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);

    }
}
