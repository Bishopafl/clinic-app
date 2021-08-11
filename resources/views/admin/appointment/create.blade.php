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
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach

    <form action="{{route('appointment.store')}}" method="post">@csrf
        <div class="card">
            <div class="card-header">
                Choose date
            </div>
            <div class="card-body">            
                <!-- <input type="name" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date" > -->

                
                <input type="date" name="date" id="datepicker" class="form-control">
            </div>
        </div>
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
                        <tr>
                            <th scope="row">1</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.00am">6am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.15am">6.15am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.30am">6.30am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.45am">6.45am</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.00am">7:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.15am">7:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.30am">7:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.45am">7:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.00am">8:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.15am">8:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.30am">8:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.45am">8:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.00am">9:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.15am">9:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.30am">9:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.45am">9:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="10.00am">10:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="10.15am">10:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="10.30am">10:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="10.45am">10:45 am</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="11.00am">11:00 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="11.15am">11:15 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="11.30am">11:30 am</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="11.45am">11:45 am</td>
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
                            <td><input class="mr-1" type="checkbox" name="time[]" value="12.00pm">12:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="12.15pm">12.15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="12.30pm">12.30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="12.45pm">12.45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="1.00pm">1:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="1.15pm">1:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="1.30pm">1:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="1.45pm">1:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="2.00pm">2:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="2.15pm">2:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="2.30pm">2:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="2.45pm">2:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="3.00pm">3:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="3.15pm">3:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="3.30pm">3:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="3.45pm">3:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">11</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="4.00pm">4:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="4.15pm">4:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="4.30pm">4:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="4.45pm">4:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">12</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="5.00pm">5:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="5.15pm">5:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="5.30pm">5:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="5.45pm">5:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">13</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.00pm">6:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.15pm">6:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.30pm">6:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="6.45pm">6:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">14</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.00pm">7:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.15pm">7:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.30pm">7:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="7.45pm">7:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">15</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.00pm">8:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.15pm">8:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.30pm">8:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="8.45pm">8:45 pm</td>
                        </tr>
                        <tr>
                            <th scope="row">16</th> 
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.00pm">9:00 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.15pm">9:15 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.30pm">9:30 pm</td>
                            <td><input class="mr-1" type="checkbox" name="time[]" value="9.45pm">9:45 pm</td>
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
</div>

<style type="text/css">
    input[type="checkbox"]{
        zoom: 1.5;
    }
    body{
        font-size: 20px;
    }
</style>

<script>
    $( function() {
        $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'}).val();
    } );
    </script>
@endsection