@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    <p>Name: {{auth()->user()->name}}</p>
                    <p>Email: {{auth()->user()->email}}</p>
                    <p>Address: {{auth()->user()->address}}</p>
                    <p>Phone Number: {{auth()->user()->phone_number}}</p>
                    <p>Gender: {{ucfirst(auth()->user()->gender)}}</p>
                    <p>Bio: {{auth()->user()->description}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Update Profile</div>
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="card-body">
                    <form action="{{route('profile.store')}}" method="post">@csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{auth()->user()->address}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone number</label>
                            <input type="text" name="phone_number" value="{{auth()->user()->phone_number}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Select...</option>
                                <option value="male" @if(auth()->user()->gender === 'male') selected @endif >Male</option>
                                <option value="female" @if(auth()->user()->gender === 'female') selected @endif >Female</option>
                                <option value="non-binary" @if(auth()->user()->gender === 'non-binary') selected @endif >Non-binary</option>
                            </select>
                             
                        </div>
                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="10">{{auth()->user()->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update Profile</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Update Image</div>
                <form action="{{route('profile.pic')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        @if(!auth()->user()->image)
                            <img src="/images/426-4261485_free-user-avatar-icons-flat-customer-icon-png.png" width="120" alt="">                    
                        @else
                            <img src="/profile/{{auth()->user()->image}}" width="120" alt="">                    
                        @endif
                        <br>
                        <input type="file" name="file" class="form-control">
                        <br>
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="submit" class="btn btn-primary">Update Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
