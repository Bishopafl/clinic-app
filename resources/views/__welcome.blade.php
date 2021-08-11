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
    
    <!-- date picker Vue JS component -->
    <find-doctor></find-doctor>
</div>
@endsection
