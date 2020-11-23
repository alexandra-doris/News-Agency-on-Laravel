@extends('includes.backmaster')

@section('content')

    <h1>Add New Article</h1>
    
    @include('includes.validation')
    
    <p>Fill in the form:</p>    

    <form method="post" action="{{route('addpost')}}" enctype="multipart/form-data">
        <div class="form-group">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" name="title"></br>
        <label for="subtitle">Subitle:</label><br>
        <input type="text" name="subtitle"></br>
        <label for="body">Body:</label><br>
        <textarea type="text" name="body"></textarea></br>
        <label for="category_id" class="control-block">Choose a category:</label></br>
        <select class="drop" id="category_id" name="category_id">
              @foreach($cats as $cat)
              <option value="{{ $cat->id }}">{{ $cat->title }}</option>
              @endforeach
        </select>
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
@endsection