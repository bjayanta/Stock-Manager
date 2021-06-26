<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class PartyController extends Controller
{
    public $meta = [
        'title' => 'Party',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('party.index')->with('meta', $this->meta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('party.create')->with('meta', $this->meta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // show all input
        // dd($request->all());

        // validation
        $data = $request->validate([
            'company_name' => 'required|max:100',
            'owner_name' => 'required|max:100',
            'party_type' => 'required',
            'email' => 'nullable',
            'address' => 'nullable',
            'phone' => 'required|max:15',
            'balance' => 'required|numeric',
            'balance_type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'description' => 'nullable',
        ]);

        // file upload 
        if($request->hasFile('image')) {
            $request->image->store('public/images');
            $data['image'] = 'images/' . $request->image->hashName();
        }

        // insert
        Party::create($data);

        // message
        $request->session()->flash("message", "Party reg. has been successful.");

        // view
        return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
