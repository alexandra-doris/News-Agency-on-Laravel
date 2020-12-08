@extends('includes.backmaster')

@section('content')

    <h1>Add New Article</h1>
    
    @include('includes.validation')
    
    <p>Fill in the form:</p>    

    <form method="post" action="{{route('addpost')}}" enctype="multipart/form-data">
        <div class="form-group">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" name="title" value="{{old('title')}}"></br>
        <label for="subtitle">Excerpt:</label><br>
        <textarea type="text" name="subtitle">{{old('subtitle')}}</textarea></br>
        <label for="body">Body:</label><br>
        <textarea class="description" type="text" name="body">{{old('body')}}</textarea></br>
        <label for="category_id" class="control-block">Choose a category:</label></br>
        <select class="drop" id="category_id" name="category_id">
              @foreach($cats as $cat)
              <option value="{{ $cat->id }}">{{ $cat->title }}</option>
              @endforeach
        </select></br>
        <label for="image">Post Image:</label></br>
        <input type="file" name="image" id="image"></br>
        @if ((Auth::user()->admin)===1)
        <input type="radio" id="public" name="status" value=1>
        <label for="status" style="padding-top:10px">Public</label>
        <input type="radio" id="draft" name="status" value=0 checked="checked">
        <label for="status" style="padding-top:10px">Draft</label>
        @endif

        </br><button type="submit" class="btn btn-primary">Create Article</button>
        </div>
    </form>


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