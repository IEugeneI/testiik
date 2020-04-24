@extends('layouts.app')


@section('content')

    <form action="/profiles" method="POST">
        @csrf
        <div class="form-group col-md">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Валера" required >
        </div>
        <div class="form-group col-md">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Валерьевич" required>
        </div>
        <div class="form-group col-md">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Валерьев" required>
        </div>
        <div class="form-group col-md">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Next">
    </form>

@endsection
