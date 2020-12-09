<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CoursesController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function getData()
    {
        $courses = DB::table('courses')->get();
		$courses_type = DB::table('courses_type')->get();
        return view('courses', compact('courses', 'courses_type'));
    }

    public function insert(Request $request) {
    	$size = $request->input('size');
    	$name = $request->input('coursesName');
    	$uid = $request->user()->id;
		$courses = DB::table('courses')->get();
		$courses_type = DB::table('courses_type')->get();
    	foreach ($courses_type as $key => $value) {
    		if($size == $value->size) {
    			$price = $value->price;
    		}
    	}

    	$data=array('name'=>$name,"size"=>$size,"price"=>$price, 'amount'=> 1, 'uid' => $uid, "created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now(),);
    	$count = DB::table('order')->where('name', $name)->where('size', $size)->where('uid', $uid)->count();
    	if($count > 0) {
    		return redirect()->back()->with('alert', 'Уже в корзине!');
    	}
    	DB::table('order')->insert($data);
    	return redirect()->back();	
    }

    public function getOrders() {
    	$order = DB::table('order')->get();

    	return view('basket', compact('order'));
    }

    public function inc($id) {
    	DB::table('order')
            ->where('id', $id)
            ->increment('amount');

        return redirect()->back();
    }
    
    public function dec($id) {
    	
    	DB::table('order')
            ->where('id', $id)
            ->decrement('amount');
        
        DB::table('order')
            ->where('id', $id)
            ->where('amount', '<=', 0)
            ->delete();

          

        return redirect()->back();
    }

}
