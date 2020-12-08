@extends('includes.backmaster')

@section('content')

@include('includes.validation')

<div class="row justify-content-center">
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
                @foreach($posts as $post)
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
</div>
@endsection


@section('scripts')

@endsection