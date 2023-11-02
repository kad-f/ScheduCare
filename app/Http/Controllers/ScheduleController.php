<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.Admin.Schedule.Index', [
            'title' => 'Schedule',
            'schedules' => Schedule::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Admin.Schedule.Create', [
            'title' => 'Add Schedule',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'startTime' => 'required',
            'endTime' => 'required',
            'breakTime' => 'nullable',
            'day' => 'required',
        ]);

        Schedule::query()->create($validatedData);

        Alert::toast('Schedule Successfully Added!', 'success');

        return redirect('/schedule');
    }
    public function destroy($id)
    {
        // Find the schedule by its ID
        $schedule = Schedule::findOrFail($id);
    
        // Add any validation or authorization checks here
        // For example, you can check if the user has the right permissions to delete the schedule.
    
        $schedule->delete();
    
        Alert::toast('Schedule Successfully Deleted!', 'success');
    
        return redirect('/schedule');
    }
    

}
