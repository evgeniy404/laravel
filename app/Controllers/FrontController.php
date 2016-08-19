<?php

namespace App\Controllers;

use App\Models\Item;
use App\Models\Group;
use App\Models\Manufacturer;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Controllers\Controller;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $limitPagination = 5;
        
        $query = DB::table('items');        
        
        if (!empty($request->group_id) && $request->group_id !== 0) {
            $query->where(['items.group_id' => $request->group_id]);
        }
        if (!empty($request->manufacturer_id) && $request->manufacturer_id !== 0) {
            $query->where(['items.manufacturer_id' => $request->manufacturer_id]);
        }        
        
        if (!empty($request->price_min) && ctype_digit($request->price_min)) {
            $query->where('items.cost', '>', $request->price_min);
        }
        if (!empty($request->price_max) && ctype_digit($request->price_max) && $request->price_max > $request->price_min) {
            $query->where('items.cost', '<', $request->price_max);
        }
        if (!empty($request->weight_min) && ctype_digit($request->weight_min) && $request->weight_min !== 0) {
            $query->where('items.weight', '>', $request->weight_min);
        }
        if (!empty($request->weight_max) && ctype_digit($request->weight_max) && $request->price_max > $request->price_min) {
            $query->where('items.weight', '<', $request->price_max);
        }
            
        $query->join('groups', 'items.group_id', '=', 'groups.id');
        $query->leftJoin('manufacturers', 'items.manufacturer_id', '=', 'manufacturers.id');
        $query->select('items.*', 'groups.title as group_title', 'manufacturers.title as manufacturer_title');
        
        $items = $query->paginate($limitPagination);
        $items->appends($request->all())->links();
        $groups = Group::all();
        $manufacturers = Manufacturer::all();
        return view('site.index',['items' => $items, 'groups' => $groups, 'manufacturers' => $manufacturers]);
    }
}
