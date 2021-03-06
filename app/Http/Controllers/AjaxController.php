<?php

namespace App\Http\Controllers;
use App\Ajax;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){
    	$data =Ajax::all();
    	return view('main.ajax.index',['data'=>$data]);
    }
    public function create(Request $request){

    	$ajax = new Ajax;
    	$ajax->name=$request->text;
    	$ajax->save();
    	return 'working';
    }

    public function delete(Request $request){

        Ajax::where('id',$request->id)->delete();
        return 'done';
    }

    public function update(Request $request){

        $item =Ajax::find($request->id);
        $item->name=$request->new_name;
        $item->save();

        return $request->all();
    }
}
