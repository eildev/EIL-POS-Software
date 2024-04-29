<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterfaces\DamageInterface;
use Illuminate\Support\Str;
use App\Models\Damage;

use Illuminate\Support\Facades\Auth;
use Validator;

class DamageController extends Controller
{

    private $damage_repo;
    public function __construct(DamageInterface $damage_interface){
        $this->damage_repo = $damage_interface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pos.damage.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [

            'product' => 'required|max:255',
            'pc' => 'required|max:255',
        ]);

        if ($validator->passes()) {
            // $data = $request->all();

            // $this->damage_repo->create($data);
            // @dd($data->product);
            $damage = new Damage;
            $damage->product_id = $request->product;
            $damage->qty = $request->pc;
            $damage->branch_id = Auth::user()->branch_id;

            $damage->date = $request->date;
            $damage->note = $request->note;
            $damage->save();

            return response()->json([
                'status' => 200,
                'message' => 'Damage added Successfully',
            ]);
        } else {
            return response()->json([
                'status' => '500',
                'error' => $validator->messages()
            ]);
        }//
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
