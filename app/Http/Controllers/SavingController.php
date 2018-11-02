<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Saving;
use App\Member;
use App\SavingType;

class SavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // index page
        $savings = Saving::all();
        return view('savings.index', compact('savings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $members = Member::all();
        $saving_types = SavingType::all();
        return view('savings.create', compact('members', 'saving_types'));
    }

    // show search member form
    public function search_member(){
        return view('savings.search_member');
    }

    // search member function
    public function search(){
        $member_number = Input::get('member_number');
        if ($member_number != "") {
            $member = Member::where('member_number', 'LIKE', '%' . $member_number . '%')->get();
            // check if any records have been return
            if (count($member) > 0) {
                return view('savings.search_member')->withDetails($member)->withQuery($member_number);
            }
        }
        return view('savings.search_member')->withMessage("No details found, try searching again!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate(request(),[
            'member_id'=>'required',
            'saving_type_id'=>'required',
            'saving_amount'=>'required'
        ]);
        Saving::create(request([
            'member_id','saving_type_id','saving_amount'
        ]));
        // $saving = new Saving();
        // $saving->member_id = $request->member_id;
        // $saving->saving_type_id = $request->input('saving_type_id');
        // $saving->saving_amount = $request->input('saving_amount');

        // $saving->save();
        return redirect('/savings');
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
        // edit page
        $saving = Saving::find($id);
        return view('savings.edit', compact('saving'));
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
        // delete savings
        Saving::where('id', $id)->delete($id);
        return redirect('/savings');
    }
}
