<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Time;
use App\User;
use App\Booking;
use App\Mail\AppointmentMail;
use App\Prescription;

class FrontendController extends Controller
{
    public function index() {
        
        //set default date based on geography 
        date_default_timezone_set('America/New_York');
        // if we have input from the welcome.blade
        if (request('date')) {
            $doctors = $this->findDoctorsBasedOnDate(request('date'));
            return view('welcome',compact('doctors', $doctors));
        }

        // get doctor based on todays date
        $doctors = Appointment::where('date', date('Y-m-d'))->get();
        // return $doctors;
        return view('welcome',compact('doctors'));
    }

    public function show($doctorID, $date) { 

        $appointment = Appointment::where('user_id', $doctorID)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $doctor = User::where('id', $doctorID)->first();
        $doctor_id = $doctorID;
        return view('appointment',compact('times','date','doctor','doctor_id'));
    }

    public function findDoctorsBasedOnDate($date) {
        $doctors = Appointment::where('date', $date)->get();
        return $doctors;
    }

    public function store(Request $request) {
        date_default_timezone_set('America/New_York');
        $request->validate(['time' => 'required']);
        // below is time validation for users 
        // only allowed to book once per 24 hrs
        $check = $this->checkBookingTimeInterval(); // returns 1 or 0
        if ($check) {
            return redirect()->back()->with('errmessage', 'Sorry, we have you in our system already. Please give us 24 hours to make next appointment');
        }
        // create booking...
        Booking::create([
            'user_id' => auth()->user()->id,
            'doctor_id' => $request->doctorID,
            'time' => $request->time,
            'date' => $request->date,
            'status' => 0
        ]);
        // update time status to 1 based on the time the appointment is associated with
        Time::where('appointment_id', $request->appointmentID)->where('time', $request->time)->update(['status' => 1]);
        // Send email notification
        $doctorName = User::where('id',$request->doctorID)->first();
        $mailData = [
            'name' => auth()->user()->name,
            'time' => $request->time,
            'date' => $request->date,
            'doctorName' => $doctorName->name
        ];
        try {
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
        } catch (\Exception $e) {
            throw $e;    
        }

        return redirect()->back()->with('message', 'Your appointment was booked');
    }

    /**
     * 
     * The following can be taken out later if necessary
     * based on the job, the admin could want the user 
     * to make multiple booking appointments in a day.
     * 
     * The logic below only allows for the user to 
     * book an appointment ONCE EVERY 24 HOURS
     * 
     */
    public function checkBookingTimeInterval() {
        // check latest booking that exists
        // based on the logged in user
        // only on the date, not the time
        return Booking::orderby('id', 'desc')->where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->exists();
    }

    public function myBookings() {
        $appointments = Booking::latest()->where('user_id', auth()->user()->id)->get();
        return view('booking.index', compact('appointments'));
    }
    // Uses API to send data to Vue
    public function doctorToday(Request $request) {
        $doctors = Appointment::with('doctor')->whereDate('date', date('Y-m-d'))->get();
        return $doctors;
    }
    // Find doctors based on the date of the API endpoint
    public function findDoctors(Request $request) {
        $doctors = Appointment::with('doctor')->whereDate('date', $request->date)->get();
        return $doctors;
    }
    // Get prescriptions for logged in user
    public function myPrescription() {
        $prescriptions = Prescription::where('user_id', auth()->user()->id)->get();
        return view('my-prescription', compact('prescriptions'));
    }

}
