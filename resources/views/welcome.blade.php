@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/pexels-thirdman-5327915.jpg" class="img-fluid" alt="Doctor sitting at the computer" style="border-radius:15px; box-shadow: 5px 5px 5px #c3c3c3;">
        </div>
        <div class="col-md-6">
            <h2>Create an Account & Book your Appointment</h2>
            <p>Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt.Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada feugiat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh. Sed porttitor lectus nibh. </p>
            <div class="mt-3">
                <a href="{{url('/register')}}"> <button class="btn btn-success">Patient Registration</button> </a>
                <a href="{{url('/login')}}"> <button class="btn btn-secondary">Login</button> </a>
            </div>
        </div>
    </div>
    <hr>
    <!-- Search doctor by date -->
    <div class="card">
        <div class="card-header">
            Doctor Search Tool
        </div>
        <form action="{{url('/')}}" method="GET">@csrf     
            <div class="card-body">
                <h5 class="card-title">Find your Doctor</h5>
                <p class="card-text">Use the date box to search for your doctor based on appointment date.</p>
                <div class="row">
                    <div class="col-md-8">
                        <!-- <input type="date" name="date" id="datepicker" class="form-control"> -->
                        <input type="name" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date" >
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit">Search Doctors</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <!-- Display available doctors  -->
    <div class="card">
        <div class="card-header">
            Available Doctor List
        </div>
        <div class="card-body">
            <h5 class="card-title">Doctors Available</h5>
            <p class="card-text">Below is a list of doctors and their area of experience.</p>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Doctor name</th>
                            <th>Expertise</th>
                            <th>Book Appointment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($doctors as $doctor)
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <img src="{{asset('images')}}/{{$doctor->doctor->image}}" width="70px" style="border-radius: 50%;border:1px solid black;" alt="">
                            </td>
                            <td>
                                {{$doctor->doctor->name}}
                            </td>
                            <td>
                                {{$doctor->doctor->department}}
                            </td>
                            <td>
                                <a href="{{route('create.appointment',[$doctor->user_id,$doctor->date])}}">
                                    <button class="btn btn-success">
                                            Book Appointment 
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <td>No doctors available today.</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
