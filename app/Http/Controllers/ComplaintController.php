<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Complaint::latest('id')->paginate(10);
        return [
            "status" => 1,
            "data" => $model
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'umur'   => ['required','numeric'],
            'nik'  => ['required','numeric','min:3'],
            'kategori'  => ['required','string','min:3'],
            'keluhan'  => ['required','string','min:3'],
        ]);

        $model = Complaint::create($request->all());
        return [
            "status" => 1,
            "data" => $model
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return [
            "status" => 1,
            "data" =>$complaint
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        $validate = $request->validate([
            'umur'   => ['required','numeric'],
            'nik'  => ['required','numeric','min:3'],
            'kategori'  => ['required','string','min:3'],
            'keluhan'  => ['required','string','min:3'],
        ]);

        $complaint->update($request->all());

        return [
            "status" => 1,
            "data" => $complaint,
            "msg" => "Complaint updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return [
            "status" => 1,
            "data" => $complaint,
            "msg" => "Complaint deleted successfully"
        ];
    }
}
