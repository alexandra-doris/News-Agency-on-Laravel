@extends('includes.backmaster')

@section('content')
    <h1><a style="color:#18a4f6" href="/post/{{$post->slug}}">{{$post->title}}</a></h1>

    <img src="{{asset('/storage/'.$post->image)}}" width="auto" height="200px" style="border:5px solid #858796"/></br></br>

    @include('includes.validation')

    <h2>Update post:</h2>
       
    <form method="post" action="{{route('updatepost', $post->id)}}" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" name="title" value="{{$post->title}}"></br>
        <label for="slug">Slug:</label><br>
        <input type="text" name="slug" value="{{$post->slug}}"></br>
        <label for="subtitle">Subitle:</label><br>
        <input type="text" name="subtitle" value="{{$post->subtitle}}"></br>
        <label for="body">Body:</label><br>
        <textarea class="description" type="text" name="body">{{$post->body}}</textarea></br>
        <label for="category_id" class="control-block">Choose a category:</label></br>
        <select class="drop" id="category_id" name="category_id">
              @foreach($cats as $cat)
              <option value="{{ $cat->id }}" @if ($cat->id===$post->category_id) selected @endif>{{ $cat->title }}</option>
              @endforeach
        </select></br>
        <label for="posted_by">Author ID (can't be modified):</label><br>
        <input type="text" name="posted_by" value="{{$post->posted_by}}" readonly="readonly"></br>
        @if ((Auth::user()->admin)===1)
        <label for="image">Post Image:</label></br>
        <input type="file" name="image" id="image"></br>
        @elseif ($post->posted_by===(Auth::user()->id))
        <label for="image">Post Image:</label></br>
        <input type="file" name="image" id="image"></br>
        @endif
        <input type="radio" id="public" name="status" value=1 @if($post->status===1) checked="checked" @endif>
        <label for="status" style="padding-top:10px">Public</label>
        <input type="radio" id="draft" name="status" value=0 @if($post->status===0) checked="checked" @endif>
        <label for="status" style="padding-top:10px">Draft</label>

        @if ((Auth::user()->admin)===1)
        </br><button type="submit" class="btn btn-primary">Save changes</button>
        @elseif ($post->posted_by===(Auth::user()->id))
        </br><button type="submit" class="btn btn-primary">Save changes</button>
        @endif
    </form>
    @if ((Auth::user()->admin)===1)
    </br><a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-primary">Delete post</a>
    @elseif ($post->posted_by===(Auth::user()->id))
    </br><a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-primary">Delete post</a>
    @endif

    </br>
    <a href="/admin/post">To all posts</a>
    </br>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Delete this Post?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Delete" below to delete the post. This action cannot be reverted!</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{route('deletepost', $post->id)}}">Delete</a>
        </div>
    </div>
</div>
</div>

@endsection


@section('scripts')
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector:'textarea.description',
        width: 900,
        height: 300
    });
</script>
@endsection