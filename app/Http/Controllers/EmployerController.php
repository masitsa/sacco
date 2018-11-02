<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use Auth;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::all();
        return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employers/createemployer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'employer_name' => 'required'
        ]);

        Employer::create([
            'employer_name' => $request->employer_name,
            'employer_email' => $request->employer_email,
            'employer_phone_number' => $request->employer_phone_number,
            'employer_postal_address' => $request->employer_postal_address,
            'created_by' => Auth::user()->id,
        ]);
        return redirect('/employer');
        session()->flash("Employer created successfully");
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
        $employer = Employer::find($id);
        return view('employers.edit', compact('employer'));
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
        $this->validate(request(), [
            'employer_name' => 'required',
        ]);
        Employer::where('id', $id)
            ->update(request([
                'employer_name', 'employer_email', 'employer_phone_number', 'employer_postal_address', 'updated_at' => date('Y-m-d H:i:s')
            ]));
        return redirect('/employer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Employer::where('id', $id)
            ->update([
                'deleted' => 1, 
                'deleted_on' => date('Y-m-d H:i:s'), 
                'deleted_by' => Auth::user()->id
            ]);
        return redirect('/employer');
    }

}
