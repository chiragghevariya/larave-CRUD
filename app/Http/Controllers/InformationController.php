<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $infodata =Information::all();
        return view('main.information.index',['infodata'=>$infodata]);

//        return view('main.information.index',compact('infodata',$infodata));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info =new Information();
        $info->name =$request->name;
        $info->description =$request->description;
        $info->save();
        session()->flash('message','one iten added successfull');
        return redirect()->route('information.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infoedit=Information::find($id);
        return view('main.information.edit',['infoedit'=>$infoedit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $infoedit=Information::find($id);
        $infoedit->name =$request->name;
        $infoedit->description=$request->description;
        $infoedit->save();
        session()->flash('msg-update','one iten update successfull');
        return redirect()->route('information.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $infodelete =Information::find($id);
        $infodelete->delete();

        session()->flash('msg-delete','one iten deleted successfull');
        return redirect()->route('information.index');
    }
}
