<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Time;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $doctorAppointments gets all of the appointments where the user is the logged in user... 
        // Putting this commit here for further description as the variable might not be descriptive
        $doctorAppointments = Appointment::latest()->where('user_id', auth()->user()->id)->get();
        return view('admin.appointment.index', compact('doctorAppointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'date' => 'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'time' => 'required'
        ]);
        $appointment = Appointment::create([
            'user_id' => auth()->user()->id,
            'date'    => $request->date
        ]);
        foreach ($request->time as $time) {
            Time::create([
                'appointment_id' => $appointment->id,
                'time'  => $time,
                // 'status' =>   0
            ]);
        }
        return redirect()->back()->with('message', 'Appointment created for '. $request->date);
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

    public function check(Request $request) {
        $date = $request->date;
        $appointment = Appointment::where('date', $date)->where('user_id', auth()->user()->id)->first(); // find the date and the currently logged in user and get the first record from DB
        if (!$appointment) {
            return redirect()->to('/appointment')->with('errmessage', 'Appointment time not available for this date'); // doctor hasn't created appointments for that date, redirect to index
        }
        $appointmentID = $appointment->id;
        $times = Time::where('appointment_id', $appointmentID)->get(); // get all times with the current appointment ID
        
        return view('admin.appointment.index', compact('times', 'appointmentID', 'date'));
    }

    public function updateTime(Request $request) {
        $appointmentID = $request->appointmentID;
        $appointment = Time::where('appointment_id', $appointmentID)->delete();
        foreach ($request->time as $time) {
            Time::create([
                'appointment_id' => $appointmentID,
                'time' => $time,
                'status' => 0,
            ]);
        }
        return redirect()->route('appointment.index')->with('message', 'Appointment time(s) updated.'); //we are using resources for routing, this will make it easier

    }
}
