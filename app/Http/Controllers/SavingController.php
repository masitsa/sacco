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
    public function create()
    {
        // create page
        // $members = Member::all();
        // $saving_types = SavingType::all();
        // return view('savings.create', compact('members', 'saving_types'));
        return view('savings.create');
    }

    public function search(){
        $member_id = Input::get('member_id');
        if ($member_id != "") {
            $member = Member::where('employer_id', 'LIKE', '%' . $member_id . '%')->get();
            // check if any records have been return
            if (count($member) > 0) {
                return view('savings.create')->withDetails($member)->withQuery($member_id);
            }
        }
        return view('savings.create')->withMessage("No details found, try searching again!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
