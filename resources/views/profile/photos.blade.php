@extends('layouts.app')


@section('content')

        <div class="form-group" id="form">
            @csrf
            <input type="hidden" name="id" id="profileId" value="{{$id}}">
            <label for="image">Images</label>
            <input type="file" class="form-control-file" id="image" name="image" onchange="change(this)" accept=".png, .jpg, .jpeg" >
            <p style="color:green;display:none;" id="status"></p>
        </div>
        <input type="button" class="btn btn-primary" id="mainPage" value="Return to the main page" onclick="mainpage()">



@endsection
