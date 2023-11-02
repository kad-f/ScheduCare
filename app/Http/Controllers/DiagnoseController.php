<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnoseController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnose $diagnose)
    {
        return view('Pages.Doctor.Diagnose.Show', [
            'title' => 'Diagnose Detail',
            'diagnose' => $diagnose,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnose  $diagnose
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnose $diagnose)
    {
        if ($diagnose->doctor_id !== auth()->user()->id) {
            Alert::toast('Diagnose Not Found!', 'error');
            return redirect('/');
        }
        return view('Pages.Doctor.Diagnose.Edit', [
            'title' => 'Diagnose',
            'diagnose' => $diagnose,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnose  $diagnose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnose $diagnose)
    {
        if ($diagnose->doctor_id !== auth()->user()->id) {
            Alert::toast('Diagnose Not Found!', 'error');
            return redirect('/');
        }

        $validatedData = $request->validate([
            'diagnosis' => 'required',
            'prescription' => 'required',
        ]);

        Diagnose::query()->where('id', $diagnose->id)->update($validatedData);

        Alert::toast('Diagnose Successfully Added!', 'success');

        return redirect('/');
    }
}
