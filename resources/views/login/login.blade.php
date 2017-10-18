@extends('login.layout')

@section('content')

    <form action="{{ route('postLogin') }}" class="mt" method="post">

        {{ csrf_field() }}

        <label for="" class="text-uppercase text-sm">Your Username or Email</label>
        <input type="text" placeholder="Email" class="form-control mb" name="email">

        <label for="" class="text-uppercase text-sm">Password</label>
        <input type="password" placeholder="Password" class="form-control mb" name="password">

        <div class="checkbox checkbox-circle checkbox-info">
            <input id="checkbox7" type="checkbox" checked>
            <label for="checkbox7">
                Keep me signed in
            </label>
        </div>

        <button class="btn btn-primary btn-block" type="submit">LOGIN</button>

    </form>

@endsection