@extends('includes.backmaster')

@section('content')

@include('includes.validation')

<div class="row justify-content-center">
                    <form action="/admin/search" type="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="padding-bottom:20px;">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control bg-dark border-0 small" style="color:white" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(isset($post_q))
    <div class="col-auto">
        <table class="table table-dark table-hover" style="width:90%; text-align:left">
            <tbody>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th width="180px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($post_q as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>
                        @foreach ($cats as $cat)
                            @if ($cat->id === $post->category_id)
                            <a style="color:white" href="/category/{{$cat->slug}}">
                            {{$cat->title}}</a>
                            @endif
                        @endforeach
                        </td>
                        <td>@if($post->status===1)
                        <div style="color:#d4edda">Public</div>
                        @else
                        <div style="color:#f8d7da">Draft</div>
                        @endif</td>
                        <td>
                        @foreach ($users as $user)
                            @if ($user->id === $post->posted_by)
                            {{$user->email}}
                            @endif
                        @endforeach
                        </td>
                        <td><a class="btn-grad" href="/admin/post/{{$post->id}}">Edit post</a> <a class="btn-grad" href="/post/{{$post->slug}}">View post</a></td>
                    </tr>          
                @endforeach
                </tbody>
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
    @else
    <div style="width:100%; margin:0 12px">
    <div class="alert alert-primary" role="alert">
    {{ $message}}</br>
	</div></div>
    @endif

</div>
@endsection


@section('scripts')

@endsection