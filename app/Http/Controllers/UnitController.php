<?php

namespace App\Http\Controllers;

use App\unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    private function unitnameexist($unitname){
        $unit = unit::where(
            'unit_name','=', $unitname
        )->first();

        if ( !isNull($unit) ){
            return false;
        }

        return true;
    }

    private function unitcodeexist($unitname){
        $unit = unit::where(
            'unit_code','=', $unitname
        )->first();

        if ( !isNull($unit) ){
            return false;
        }

        return true;
    }



    public function index(){
        $units = unit::paginate(16);
        return $units;
    }

    public function store(Request $request){
        $request->validate([
            'unit_name' => 'required',
            'unit_code' => 'required']);

        $unitname = $request->input('unit_name');
        $unitcode = $request->input('unit_code');
        if ($this->unitnameexist($unitname)){
            return redirect()->back();
        }
        if ($this->unitcodeexist($unitcode)){
            return redirect()->back();
        }

        $unit = new unit();
        $unit->unit_name = $request->input('unit_name');
        $unit->unit_code = $request->input('unit_code');
        $unit->save();
        return redirect()->back();

    }

    public function delete(Request $request){
        if (isNull($request->input('unit_id')) || empty($request->input('unit_id'))){
            return redirect()->back();
        }
       $id = $request->input('unit_id');
        unit::destroy($id);
        return redirect()->back();

    }

    public function update(Request $request){
        $request->validate([
            'unit_name' => 'required',
            'unit_code' => 'required',
            'unit_id' => 'required' ]);

        $unitname = $request->input('unit_name');
        $unitcode = $request->input('unit_code');
        if ($this->unitnameexist($unitname)){
            return redirect()->back();
        }
        if ($this->unitcodeexist($unitcode)){
            return redirect()->back();
        }




        $unitid = intval($request->input('unit_id'));
        $unit = unit::find($unitid);

        $unit->unit_name = $request->input('unit_name');
        $unit->unit_code = $request->input('unit_code');
        $unit->save();
        return redirect()->back();


    }

    public function search(Request $request){
        $request->validate([
            'unit_search' => 'required']);

        $searchterm = $request->input('unit_search');

        $units = unit::where(
            'unit_name'.'like'.'%'.$searchterm.'%'
        )->orwhere(
            'unit_code'.'like'.'%'.$searchterm.'%'
        )->get();
        if (count($units)>0){
            return;
        }
        return redirect()->back();
    }
}
