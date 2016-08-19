<?php

namespace App\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Manufacturer;
use App\Models\Group;
use App\Models\Item;

class GroupsController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = Group::all();
        return view('admin.groups.groups',['groups' => $group]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $categories = Manufacturer::all();
        return view('admin.groups.create', ['categories' => $categories]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        Group::create($request->all());      
        return back()->with('message','Группа добавлена');
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
        $group = Group::find($id); 
        $categories = Manufacturer::all();
        return view('admin.groups.edit',['group' => $group, 'categories' => $categories]);
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
        $group = Group::find($id);
        $group->update($request->all());       
        return back()->with('message','Группа сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        
        /* Удаляем элементы группы т.к. группы больше не существует */
        $item = Item::where('group_id', '=', $id);
        $item->delete();
        return back()->with('message','Группа удалена');
    }
}
