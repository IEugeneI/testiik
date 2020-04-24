@extends('layouts.app')


@section('content')
    <form action="/profiles/create" method="GET">
    <input type="submit" class="btn btn-success" value="Create profile">
    </form>
    @if(isset($status))
        <div class="alert alert-info" role="alert">
            {{$status}}
        </div>
    @endif
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Photo</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($profiles as $profile)
            <tr>
            <td>{{$profile->id}}</td>
            <td>{{$profile->name}}</td>
            <td>{{$profile->surname}}</td>
            <td>{{$profile->lastname}}</td>
            <td>{{$profile->email}}</td>
            <td><img src="{{$profile->photos}}"  style='width:100px;'></td>
            <td><img src="{{$profile->photos}}"  style='width:100px;'></td>
            <td>
                <a href="{{ route('profiles.show',$profile->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('profiles.destroy', $profile->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

            </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
