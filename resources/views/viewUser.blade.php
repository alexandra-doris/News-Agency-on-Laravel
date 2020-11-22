@extends('includes.backmaster')

@section('content')
    <h1>{{$user->fname}} {{$user->lname}} </h1>

    @include('includes.validation')

    <p>Update user profile:</p>

    <img src="{{asset('/storage/'.$user->image)}}" width="200px" height="200px" style="border-radius:50%"/>
       
    <form method="post" action="{{route('updateuser', $user->id)}}" enctype="multipart/form-data">
        @csrf
        <label for="fname">First name:</label><br>
        <input type="text" name="fname" value="{{$user->fname}}"></br>
        <label for="lname">Last name:</label><br>
        <input type="text" name="lname" value="{{$user->lname}}"></br>
        <label for="email">Email:</label><br>
        <input type="text" name="email" value="{{$user->email}}"></br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" value="{{$user->password}}"></br>
        <label for="description">Description:</label></br>
        <textarea type="text" name="description" >{{$user->description}}</textarea></br>
        <label for="image">Profile Image:</label></br>
        <input type="file" name="image"></br>

        </br><button type="submit" class="btn btn-primary">Save changes</button>
    </form>

    <form action="{{route('deleteuser', $user->id)}}" method="post">
        @csrf

        </br><input type="text" name="userid" placeholder="Enter user id">

        </br></br><button type="submit" class="btn btn-primary">Delete user</button>
    </form>

    </br>
    <a href="/admin">To all users</a>



@endsection


@section('scripts')

@endsection