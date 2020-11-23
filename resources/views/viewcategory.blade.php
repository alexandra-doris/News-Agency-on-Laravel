@extends('includes.backmaster')

@section('content')
    <h1>{{$cat->title}}</h1>

    <img src="{{asset('/storage/'.$cat->image)}}" width="auto" height="200px" style="border:5px solid #858796"/></br></br>

    @include('includes.validation')

    <h2>Update category:</h2>
       
    <form method="post" action="{{route('updatecategory', $cat->id)}}" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" name="title" value="{{$cat->title}}"></br>
        <label for="slug">Slug:</label><br>
        <input type="text" name="slug" value="{{$cat->slug}}"></br>
        <label for="description">Description:</label></br>
        <textarea type="text" name="description" >{{$cat->description}}</textarea></br>
        @if ((Auth::user()->admin)===1)
        <label for="image">Profile Image:</label></br>
        <input type="file" name="image"></br>
        @endif
        @if ((Auth::user()->admin)===1)
        </br><button type="submit" class="btn btn-primary">Save changes</button>
        @endif
    </form>
    @if ((Auth::user()->admin)===1)
    </br><a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-primary">Delete category</a>
    @endif

    </br>
    <a href="/admin/category">To all categories</a>
    </br>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Delete this Category?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Delete" below to delete the category. This action cannot be reverted!</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{route('deletecategory', $cat->id)}}">Delete</a>
        </div>
    </div>
</div>
</div>

@endsection


@section('scripts')

@endsection