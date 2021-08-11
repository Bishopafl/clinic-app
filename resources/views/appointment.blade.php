@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Doctor Information</h4>
                    <img src="{{asset('images')}}/{{$doctor->image}}" width="70px" style="border-radius: 50%;border:1px solid black;" alt="">
                    <br>
                    <p class="lead">Name: {{ucfirst($doctor->name)}}</p>
                    <p class="lead">Degree: {{$doctor->education}}</p>
                    <p class="lead">Expertise: {{$doctor->department}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{Session::get('errmessage')}}
                </div>
            @endif

            <form action="{{route('book.appointment')}}" method="post">@csrf
                <div class="card">
                    <div class="card-header lead">{{$date}}</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($times as $time)
                            <div class="col-md-3">
                                <label class="btn btn-outline-primary" for="">
                                    <input type="radio" name="time" value="{{$time->time}}">
                                    <span>{{$time->time}}</span>
                                </label>
                            </div>
                            <input type="hidden" name="doctorID" value="{{$doctor_id}}">
                            <input type="hidden" name="appointmentID" value="{{$time->appointment_id}}">
                            <input type="hidden" name="date" value="{{$date}}">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if(Auth::check())
                        <button type="submit" class="btn btn-success" style="width:100%">Book Appointment</button>
                    @else
                        <h3 class="text-center">Please login to book an appointment</h3>
                        <a href="/register">Register</a>
                        <a href="/login">Login</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
