<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = tag::paginate(16);
        return $tags;
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
}
