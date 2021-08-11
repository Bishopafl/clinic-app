@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header"></div>

                <div class="card-body">
                    <p><strong>Date:</strong> {{$prescription->date}}</p>
                    <p> <strong> Patient:</strong> {{$prescription->user->name}}</p>
                    <p> <strong> Doctor:</strong> {{$prescription->doctor->name}}</p>
                    <p> <strong> Disease:</strong> {{$prescription->name_of_disease}}</p>
                    <p> <strong> Symptoms:</strong> {{$prescription->symptoms}}</p>
                    <p> <strong> Medicine(s):</strong> {{$prescription->medicine}}</p>
                    <p> <strong> Procedure to:</strong> use medicine: {{$prescription->use_instructions}}</p>
                    <p> <strong> Doctor Feedback:</strong> {{$prescription->feedback}}</p>
                    <p> <strong> Doctor Signature:</strong> {{$prescription->signature}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection