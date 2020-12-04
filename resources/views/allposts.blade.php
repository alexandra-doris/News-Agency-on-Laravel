@extends('includes.backmaster')

@section('content')

@include('includes.validation')

<div class="row justify-content-center">
    <div class="col-auto">
        <table class="table table-dark table-hover" style="width:800px; text-align:left">
            <tbody>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Author ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>@if($post->status===1)
                        <div style="color:#d4edda">Public</div>
                        @else
                        <div style="color:#f8d7da">Draft</div>
                        @endif</td>
                        <td>{{$post->posted_by}}</td>
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