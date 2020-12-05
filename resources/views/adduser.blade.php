@extends('includes.backmaster')

@section('content')

    <h1>Add New User</h1>
    
    @include('includes.validation')
    
    <p>Fill in the form:</p>    

    <form method="post" action="{{route('adduser')}}" enctype="multipart/form-data">
        <div class="form-group">
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
        <label for="image">Profile Image:</label></br>
        <input type="file" name="image" id="image"></br>
        @if((Auth::user()->admin)===1)
        <input type="radio" id="editor" name="admin" value=1>
        <label for="admin" style="padding-top:10px">Editor</label>
        <input type="radio" id="writer" name="admin" value=0 checked="checked">
        <label for="admin" style="padding-top:10px">Writer</label>
        @endif

        </br><button type="submit" class="btn btn-primary">Create user</button>
        </div>
    </form>

@endsection


@section('scripts')
<script>
    //THE NAME OF THE FILE APPEARS ON SELECT
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endsection