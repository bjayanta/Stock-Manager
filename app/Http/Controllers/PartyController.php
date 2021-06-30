<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use Illuminate\Support\Facades\Storage;

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
        // get all the records from party table 
        $records = Party::all();

        // pass data and return view
        return view('party.index', compact('records'))->with('meta', $this->meta);
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

        /*
        if($request->balance_type == 1) {
            $data['balance'] = 0 - $request->balance;
        } else {
            $data['balance'] = 0 + $request->balance;
        }
        */

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
    public function show($id) {
        // get the specified data
        $record = Party::findOrFail($id);
        // dd($record);

        // view
        return view('party.show', compact('record'))->with('meta', $this->meta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // get the specified data
        $record = Party::findOrFail($id);

        // view
        return view('party.edit', compact('record'))->with('meta', $this->meta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // get the specified data
        $party= Party::findOrFail($id);

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

        // save the image
        if($request->hasFile('image')) {
            // find the image + delete
            if (Storage::exists('public/' . $party->image)) {
                Storage::delete('public/' . $party->image);
            }

            // insert new image
            $request->image->store('public/images');
            $data['image'] = 'images/' . $request->image->hashName();
        }

        $party->update($data);

        // flash message
        $request->session()->flash('success', "Operation has been Updated successfully!");

        // view
        return redirect(route('party.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $party = Party::findOrFail($id);

        // delete image from stroage
        if (Storage::exists('public/' . $party->image)) {
            Storage::delete('public/' . $party->image);
        }

        // delete from db
        if($party->delete()) {
            // flash message
            session()->flash('success', "Operation has been Updated successfully!");
        }
        
        // view
        return back();
    }
}
