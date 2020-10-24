@extends('includes.master')

@section('content')
    <h1>Register New User</h1>
    
    @include('includes.validation')
    
    <p>Fill in the form:</p>    

    <form method="post" action="{{route('registeruser')}}">
        @csrf
        <label for="fname">First name:</label><br>
        <input type="text" name="fname"></br>
        <label for="lname">Last name:</label><br>
        <input type="text" name="lname"></br>
        <label for="email">Email:</label><br>
        <input type="text" name="email"></br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"></br>
        <label for="description">Description:</label><br>
        <textarea type="text" name="description"></textarea></br>

        </br><button type="submit">Create user</button>
    </form>


@endsection


@section('scripts')
<script></script>
@endsection