@extends('includes.backmaster')

@section('content')
    <h1>{{$user->fname}} {{$user->lname}} </h1>

    <img src="{{asset('/storage/'.$user->image)}}" width="200px" height="200px" style="border-radius:50%"/></br></br>

    @include('includes.validation')

    <h2>Update user profile:</h2>
       
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
        @if((Auth::user()->admin)===1)
        <input type="radio" id="editor" name="admin" value=1 @if($user->admin===1) checked="checked" @endif>
        <label for="admin" style="padding-top:10px">Editor</label>
        <input type="radio" id="writer" name="admin" value=0  @if($user->admin===0) checked="checked" @endif>
        <label for="admin" style="padding-top:10px">Writer</label>
        @endif
        @if((Auth::user()->admin)===1)
        </br><button type="submit" class="btn btn-primary">Save changes</button>
        @elseif((Auth::user()->id)===$user->id)
        </br><button type="submit" class="btn btn-primary">Save changes</button>
        @endif
    </form>
    @if((Auth::user()->admin)===1)
    </br><a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-primary">Delete user</a>
    @elseif(Auth::user()->id)===$user->id)
    </br><a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-primary">Delete user</a>
    @endif

    </br>
    <a href="/admin">To all users</a>
    </br>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Delete this User?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Delete" below to delete the user. This action cannot be reverted!</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{route('deleteuser', $user->id)}}">Delete</a>
        </div>
    </div>
</div>
</div>

@endsection


@section('scripts')

@endsection