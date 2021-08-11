@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header">Patient Information</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Date</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Time</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Status</th>
                                <th scope="col">Prescription</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($patients as $key => $patient)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td><img src="/profile/{{ $patient->user->image }}" width="80" style="border-radius: 50%;" alt=""></td>
                                <td>
                                    <!-- {{ $patient->date }} -->
                                    {{ $patient->user_id }}
                                </td>
                                <td>{{ $patient->user->name }}</td>
                                <td>{{ $patient->user->email }}</td>
                                <td>{{ $patient->user->phone_number }}</td>
                                <td>{{ $patient->user->gender }}</td>
                                <td>{{ $patient->time }}</td>
                                <td>{{ $patient->doctor->name }}</td>
                                <td>
                                    @if( $patient->status == 1)
                                        checked
                                    @endif
                                </td>
                                <td>
                                    @if(!App\Prescription::where('date', date('Y-m-d'))->where('doctor_id', auth()->user()->id)->where('user_id', $patient->user->id)->exists())
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$patient->user_id}}">
                                        Write Prescription
                                    </button>
                                    @include('prescription.form')

                                    @else 
                                        <a href="{{route('prescription.show',[$patient->user_id, $patient->date])}}" class="btn btn-secondary">View Prescription</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <td>There are no appointments scheduled today.</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection