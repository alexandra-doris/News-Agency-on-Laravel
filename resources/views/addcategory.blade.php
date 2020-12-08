@extends('includes.backmaster')

@section('content')

    <h1>Add New Category</h1>
    
    @include('includes.validation')
    
    <p>Fill in the form:</p>    

    <form method="post" action="{{route('addcategory')}}" enctype="multipart/form-data">
        <div class="form-group">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" name="title" value="{{old('title')}}"></br>
        <label for="description">Description:</label><br>
        <textarea type="text" name="description">{{old('body')}}</textarea></br>
        <label for="image">Category Image:</label></br>
        <input type="file" name="image" id="image"></br>

        </br><button type="submit" class="btn btn-primary">Create Category</button>
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