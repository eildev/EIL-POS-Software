<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Validator;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::get();
        return view('pos.products.unit', compact('units'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:39',
            'related_to_unit' => 'required|max:39',
            'related_sign' => 'required|max:19',
            'related_by' => 'required|max:10',
        ]);

        if ($validator->passes()) {
            $unit = new Unit;
            $unit->name =  $request->name;
            $unit->related_to_unit = $request->related_to_unit;
            $unit->related_sign = $request->related_sign;
            $unit->related_by = $request->related_by;
            $unit->save();
            return response()->json([
                'status' => 200,
                'message' => 'Unit Save Successfully',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages()
            ]);
        }
    }
    public function view()
    {
        $units = Unit::get();
        return view('pos.products.unit-show', compact('units'))->render();
    }
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        if ($unit) {
            return response()->json([
                'status' => 200,
                'unit' => $unit
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "Data Not Found"
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:39',
            'related_to_unit' => 'required|max:39',
            'related_sign' => 'required|max:19',
            'related_by' => 'required|max:10',
        ]);
        if ($validator->passes()) {
            $unit = Unit::findOrFail($id);
            $unit->name =  $request->name;
            $unit->related_to_unit = $request->related_to_unit;
            $unit->related_sign = $request->related_sign;
            $unit->related_by = $request->related_by;
            $unit->save();
            return response()->json([
                'status' => 200,
                'message' => 'Unit Update Successfully',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages()
            ]);
        }
    }
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Unit Deleted Successfully',
        ]);
    }
}
