@extends('layouts.app')


@section('content')
    <form  action="{{ route('profiles.update', $profile->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group col-md">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$profile->name}}" required>
        </div>
        <div class="form-group col-md">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{$profile->surname}}" required>
        </div>
        <div class="form-group col-md">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$profile->lastname}}"required>
        </div>
        <div class="form-group col-md">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$profile->email}}" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>

    @if(isset($profile->photos))
     @foreach($profile->photos as $photo)
         <div style="float: left;width:210px;display:block;" id="{{$photo['photo_url']}}">
        <img src="{{$photo['photo_url']}}" style="width:200px;">
             <button class="btn btn-danger" type="submit" data-path="{{$photo['photo_url']}}" onclick="destroyPhoto(this)">Delete</button>
         </div>
         @endforeach
    @endif

    <div class="form-group" id="form">
        <input type="hidden" name="id" id="profileId" value="{{$profile->id}}">
        <input type="file" class="form-control-file" id="image" name="image" onchange="change(this)" accept=".png, .jpg, .jpeg" >
        <p style="color:green;display:none;" id="status"></p>
    </div>
    <input type="button" class="btn btn-primary" id="mainPage" value="Return to the main page" onclick="mainpage()">

@endsection
