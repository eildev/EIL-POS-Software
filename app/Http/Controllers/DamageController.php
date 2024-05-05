<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepositoryInterfaces\DamageInterface;
use Illuminate\Support\Str;
use App\Models\Damage;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Validator;

class DamageController extends Controller
{

    private $damage_repo;
    public function __construct(DamageInterface $damage_interface)
    {
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

            'product_id' => 'required|max:255',
            'pc' => 'required|max:255',
            'date' => 'required|max:50',
        ]);

        if ($validator->passes()) {
            // $data = $request->all();

            // $this->damage_repo->create($data);
            // @dd($request);
            $damage = new Damage;
            $damage->product_id = $request->product_id;
            $damage->qty = $request->pc;
            $damage->branch_id = Auth::user()->branch_id;
            $damage->date = $request->date;
            $damage->note = $request->note;
            $damage->save();

            $product_qty = Product::findOrFail($request->product_id);
            $product_qty->stock = $product_qty->stock - $request->pc;
            $product_qty->save();
        }
        $notification = array(
            'message' => 'Damage Add Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }


    /**
     * Display the specified resource.
     */
    public function view(){
        $damages = $this->damage_repo->ViewAllDamage();
        return view('pos.damage.view_damage',compact('damages'));
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
