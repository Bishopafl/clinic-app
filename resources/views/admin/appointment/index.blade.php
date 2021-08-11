@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctors</h5>
                    <span>Add appointment times for the doctor</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('errmessage'))
        <div class="alert bg-danger alert-success text-white">
            {{Session::get('errmessage')}}
        </div>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach

    <form action="{{route('appointment.check')}}" method="post">@csrf
        <div class="card">
            <div class="card-header">
                Choose date
                <br>
                @if(isset($date))
                    Your timetable for:
                    {{$date}}
                @endif
            </div>
            <div class="card-body">
                <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date" >
                <br>
                <button type="submit" class="btn btn-info">Check</button>
            </div>
        </div>
    </form>
                 
    @if(Route::is('appointment.check'))
    <form action="{{route('update')}}" method="post">@csrf
        <!-- AM TIME SLOTS -->
        <div class="card">
            <div class="card-header">
                Choose AM Time
                <span style="margin-left: 700px">Check/Uncheck All
                    <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                </span>
            </div>
            

            
            <div class="card-body">
                <table class="table table-striped ">
                    
                    <tbody>
                        <input type="hidden" name="appointmentID" value="{{$appointmentID}}">
                        <tr>
                            <th scope="row">1</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.00am" @if(isset($times)){{$times->contains('time','6.00am')?'checked':''}}@endif>6:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.15am" @if(isset($times)){{$times->contains('time','6.15am')?'checked':''}}@endif>6:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.30am" @if(isset($times)){{$times->contains('time','6.30am')?'checked':''}}@endif>6:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.45am" @if(isset($times)){{$times->contains('time','6.45am')?'checked':''}}@endif>6:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.00am" @if(isset($times)){{$times->contains('time','7.00am')?'checked':''}}@endif>7:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.15am" @if(isset($times)){{$times->contains('time','7.15am')?'checked':''}}@endif>7:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.30am" @if(isset($times)){{$times->contains('time','7.30am')?'checked':''}}@endif>7:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.45am" @if(isset($times)){{$times->contains('time','7.45am')?'checked':''}}@endif>7:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.00am" @if(isset($times)){{$times->contains('time','8.00am')?'checked':''}}@endif>8:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.15am" @if(isset($times)){{$times->contains('time','8.15am')?'checked':''}}@endif>8:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.30am" @if(isset($times)){{$times->contains('time','8.30am')?'checked':''}}@endif>8:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.45am" @if(isset($times)){{$times->contains('time','8.45am')?'checked':''}}@endif>8:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.00am" @if(isset($times)){{$times->contains('time','9.00am')?'checked':''}}@endif>9:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.15am" @if(isset($times)){{$times->contains('time','9.15am')?'checked':''}}@endif>9:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.30am" @if(isset($times)){{$times->contains('time','9.30am')?'checked':''}}@endif>9:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.45am" @if(isset($times)){{$times->contains('time','9.45am')?'checked':''}}@endif>9:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="10.00am" @if(isset($times)){{$times->contains('time','10.00am')?'checked':''}}@endif>10:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="10.15am" @if(isset($times)){{$times->contains('time','10.15am')?'checked':''}}@endif>10:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="10.30am" @if(isset($times)){{$times->contains('time','10.30am')?'checked':''}}@endif>10:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="10.45am" @if(isset($times)){{$times->contains('time','10.45am')?'checked':''}}@endif>10:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="11.00am" @if(isset($times)){{$times->contains('time','11.00am')?'checked':''}}@endif>11:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="11.15am" @if(isset($times)){{$times->contains('time','11.15am')?'checked':''}}@endif>11:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="11.30am" @if(isset($times)){{$times->contains('time','11.30am')?'checked':''}}@endif>11:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="11.45am" @if(isset($times)){{$times->contains('time','11.45am')?'checked':''}}@endif>11:45 am</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- PM TIME SLOTS -->
        <div class="card">
            <div class="card-header">
                Choose PM Time
            </div>
            <div class="card-body">
                <table class="table table-striped ">
                    
                    <tbody>
                        <tr>
                            <th scope="row">7</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="12.00pm" @if(isset($times)){{$times->contains('time','12.00pm')?'checked':''}}@endif>12:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="12.15pm" @if(isset($times)){{$times->contains('time','12.15pm')?'checked':''}}@endif>12:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="12.30pm" @if(isset($times)){{$times->contains('time','12.30pm')?'checked':''}}@endif>12:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="12.45pm" @if(isset($times)){{$times->contains('time','12.45pm')?'checked':''}}@endif>12:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="1.00pm" @if(isset($times)){{$times->contains('time','1.00pm')?'checked':''}}@endif>1:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="1.15pm" @if(isset($times)){{$times->contains('time','1.15pm')?'checked':''}}@endif>1:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="1.30pm" @if(isset($times)){{$times->contains('time','1.30pm')?'checked':''}}@endif>1:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="1.45pm" @if(isset($times)){{$times->contains('time','1.45pm')?'checked':''}}@endif>1:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="2.00pm" @if(isset($times)){{$times->contains('time','2.00pm')?'checked':''}}@endif>2:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="2.15pm" @if(isset($times)){{$times->contains('time','2.15pm')?'checked':''}}@endif>2:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="2.30pm" @if(isset($times)){{$times->contains('time','2.30pm')?'checked':''}}@endif>2:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="2.45pm" @if(isset($times)){{$times->contains('time','2.45pm')?'checked':''}}@endif>2:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="3.00pm" @if(isset($times)){{$times->contains('time','3.00pm')?'checked':''}}@endif>3:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="3.15pm" @if(isset($times)){{$times->contains('time','3.15pm')?'checked':''}}@endif>3:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="3.30pm" @if(isset($times)){{$times->contains('time','3.30pm')?'checked':''}}@endif>3:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="3.45pm" @if(isset($times)){{$times->contains('time','3.45pm')?'checked':''}}@endif>3:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">11</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="4.00pm" @if(isset($times)){{$times->contains('time','4.00pm')?'checked':''}}@endif>4:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="4.15pm" @if(isset($times)){{$times->contains('time','4.15pm')?'checked':''}}@endif>4:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="4.30pm" @if(isset($times)){{$times->contains('time','4.30pm')?'checked':''}}@endif>4:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="4.45pm" @if(isset($times)){{$times->contains('time','4.45pm')?'checked':''}}@endif>4:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">12</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="5.00pm" @if(isset($times)){{$times->contains('time','5.00pm')?'checked':''}}@endif>5:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="5.15pm" @if(isset($times)){{$times->contains('time','5.15pm')?'checked':''}}@endif>5:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="5.30pm" @if(isset($times)){{$times->contains('time','5.30pm')?'checked':''}}@endif>5:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="5.45pm" @if(isset($times)){{$times->contains('time','5.45pm')?'checked':''}}@endif>5:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">13</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.00pm" @if(isset($times)){{$times->contains('time','6.00pm')?'checked':''}}@endif>6:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.15pm" @if(isset($times)){{$times->contains('time','6.15pm')?'checked':''}}@endif>6:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.30pm" @if(isset($times)){{$times->contains('time','6.30pm')?'checked':''}}@endif>6:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.45pm" @if(isset($times)){{$times->contains('time','6.45pm')?'checked':''}}@endif>6:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">14</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.00pm" @if(isset($times)){{$times->contains('time','7.00pm')?'checked':''}}@endif>7:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.15pm" @if(isset($times)){{$times->contains('time','7.15pm')?'checked':''}}@endif>7:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.30pm" @if(isset($times)){{$times->contains('time','7.30pm')?'checked':''}}@endif>7:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.45pm" @if(isset($times)){{$times->contains('time','7.45pm')?'checked':''}}@endif>7:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">15</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.00pm" @if(isset($times)){{$times->contains('time','8.00pm')?'checked':''}}@endif>8:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.15pm" @if(isset($times)){{$times->contains('time','8.15pm')?'checked':''}}@endif>8:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.30pm" @if(isset($times)){{$times->contains('time','8.30pm')?'checked':''}}@endif>8:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.45pm" @if(isset($times)){{$times->contains('time','8.45pm')?'checked':''}}@endif>8:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">16</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.00pm" @if(isset($times)){{$times->contains('time','9.00pm')?'checked':''}}@endif>9:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.15pm" @if(isset($times)){{$times->contains('time','9.15pm')?'checked':''}}@endif>9:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.30pm" @if(isset($times)){{$times->contains('time','9.30pm')?'checked':''}}@endif>9:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.45pm" @if(isset($times)){{$times->contains('time','9.45pm')?'checked':''}}@endif>9:45 pm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END TIME SLOTS -->
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    
    @else
    <h3>Your current appointment time(s): {{$doctorAppointments->count()}}</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Creator</th>
                <th scope="col">Date</th>
                <th scope="col">View/Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctorAppointments as $appointment)
            <tr>
                <th scope="row">{{$appointment->id}}</th>
                <td>{{$appointment->doctor->name}}</td>
                <td>{{$appointment->date}}</td>
                <td>
                    <form action="{{route('appointment.check')}}" method="post">@csrf
                        <input type="hidden" name="date" value="{{$appointment->date}}">
                        <button type="submit" class="btn btn-primary">View/Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
                    

    @endif

</div>

<style type="text/css">
    input[type="checkbox"]{
        zoom: 1.5;
    }
    body{
        font-size: 20px;
    }
</style>

@endsection