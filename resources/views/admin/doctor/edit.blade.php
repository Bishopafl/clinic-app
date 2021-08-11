@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Edit Doctor</h5>
                    <span>Update doctor information in our repository</span>
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
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header"><h3>Add Doctor</h3></div>
                <div class="card-body">
                    <form class="forms-sample" action="{{route('doctor.update',[$doctor->id])}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Full name</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Doctor Full Name" value="{{$doctor->name}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="editInputPassword">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="editInputPassword" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{$doctor->email}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                                        <option value="">Please select doctor's gender</option>
                                        @foreach(['male','female','non-binary'] as $gender)
                                            <option value="{{$gender}}" @if($doctor->gender == $gender) selected @endif >{{$gender}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="education">Education</label>
                                    <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="Doctors Highest Degree" value="{{$doctor->education}}">
                                    @error('education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$doctor->email}}" placeholder="Doctor's Office Address" >
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department">Specialist</label>
                                    <!-- <select name="department" class="form-control" id="">
                                        @foreach(App\User::where('department','!=','NULL')->get() as $doctorSpecialist)
                                            <option value="{{$doctorSpecialist->department}}"  >{{$doctorSpecialist->department}}</option>
                                        @endforeach
                                    </select> -->
                                    <!-- <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" value="{{$doctor->department}}" placeholder="Doctors area of speciality"> -->
                                    
                                    <select name="department" class="form-control" id="">
                                        <option value="">Please select department</option>
                                        @foreach(App\Department::all() as $department)
                                            <option value="{{$department->department}}" @if($doctor->department == $department->department) selected @endif>{{$department->department}}</option>
                                        @endforeach
                                    </select>

                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{$doctor->phone_number}}" placeholder="Doctors Phone Number">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>File upload</label>
                                    <div class="input-group col-xs-12">
                                        <input name="image" type="file" class="form-control file-upload-info @error('image') is-invalid @enderror" placeholder="Upload Image">
                                       
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>        
                            </div>
                            <div class="col-md-6">
                                <label for="role">Role</label>
                                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="">
                                    <option value="">Please select role</option>
                                    @foreach(App\Role::where('name','!=','patient')->get() as $role)
                                        <option value="{{$role->id}}" @if($doctor->role_id == $role->id) selected @endif >{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description"  id="description" value="" rows="4">{{$doctor->description}}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection