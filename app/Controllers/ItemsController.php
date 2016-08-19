<?php

namespace App\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use App\Models\Item;
use App\Models\Manufacturer;
use App\Models\Group;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.items.items',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Group::all();
        $manufacturers = Manufacturer::all();
        return view('admin.items.create', ['categories' => $categories, 'manufacturers' => $manufacturers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:1|max:255',
            'group_id' => 'required',
        ]);
        
        Item::create($request->all());
        return back()->with('message','Добавлено');
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
        $items = Item::find($id);
        $groups = Group::all();
        $manufacturers = Manufacturer::all();
        return view('admin.items.edit',['items' => $items, 'groups' => $groups, 'manufacturers' => $manufacturers]);
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
        $this->validate($request, [
            'title' => 'required|min:1|max:255',
            'group_id' => 'required',
            'group_id' => 'exists:groups,id',            
        ]);
        
        if (!empty($request->manufacturer_id) && $request->manufacturer_id != 0) {
            $this->validate($request, [
                'manufacturer_id' => 'exists:manufacturers,id',            
            ]);      
        }        
        $item = Item::find($id);
        $item->update($request->all());
        $item->save();
        return back()->with('message', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();     
        return back()->with('message','Удалено');
    }
}
