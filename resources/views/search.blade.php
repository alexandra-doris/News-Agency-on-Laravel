@extends('includes.master')

@section('content')
<div class="container" >
        <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
        <h1>Search results:</h1>
          <div class="container">
          @if(isset($post_q))
            <div class="row">
              <!-- post -->
              @foreach ($post_q as $post)
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="post.html"><img src="{{asset('/storage/'.$post->image)}}" style="background-color:rgba(0, 0, 0, 0.8)" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{date('M d | Y', strtotime($post->created_at))}}</div>
                  </div><a href="/post/{{$post->slug}}">
                    <h3 class="h4">{{$post->title}}</h3></a>
                  <p class="text-muted">{!!Str::limit($post->subtitle, 130)!!}</p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="{{asset('/storage/'.$users->where('id', $post->posted_by)->first()->image)}}" alt="..." class="img-fluid"></div>
                      <div class="title meta-last"><span>{{$users->where('id', $post->posted_by)->first()->fname}} {{$users->where('id', $post->posted_by)->first()->lname}}</span></div></a>
                  </footer>
                </div>
              </div>@endforeach
             
            </div>@endif
            <!-- Pagination -->
          </div>
        </main>
        @include('includes.sidebar')
        </div>
</div>
@endsection

@section('scripts')
<script></script>
@endsection