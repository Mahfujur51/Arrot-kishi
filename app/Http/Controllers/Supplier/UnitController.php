<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    public  function  index(){
        $units=Unit::all();
        return view('supplier.unit.index',compact('units'));
    }
    public  function  store(Request $request){
        $request->validate([
            'name'=>'required|string',
        ]);
        $unit=new Unit();
        $unit->name = $request->name;
        $unit->save();
        Session::flash('success','Unit added successfully!!');
        return redirect()->back();

    }
    public  function  delete($id){
        $unit=Unit::findOrFail($id);
        $unit->delete();
        Session::flash('success','Unit Deleted successfully!!');
        return redirect()->back();
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|string',
        ]);
        $unit=Unit::findOrFail($id);
        $unit->name=$request->name;
        $unit->update();
        Session::flash('success','Unit Updated successfully!!');
        return redirect()->back();


    }
}
