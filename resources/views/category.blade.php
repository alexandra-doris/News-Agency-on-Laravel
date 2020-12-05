@extends('includes.master')

@section('content')
        <h1>{{$cat->title}}</h1>
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
              <!-- post -->
              @foreach ($posts_cat as $post)
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="post.html"><img src="{{asset('/storage/'.$post->image)}}" style="background-color:rgba(0, 0, 0, 0.8)" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{date('M d | Y', strtotime($post->created_at))}}</div>
                    <div class="category"><a href="/category/{{$cat->slug}}">{{$cat->title}}</a></div>
                  </div><a href="/post/{{$post->slug}}">
                    <h3 class="h4">{{$post->title}}</h3></a>
                  <p class="text-muted">{!!Str::limit($post->body, 100)!!}</p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="{{asset('/storage/'.$users->where('id', $post->posted_by)->first()->image)}}" alt="..." class="img-fluid"></div>
                      <div class="title meta-last"><span>{{$users->where('id', $post->posted_by)->first()->fname}} {{$users->where('id', $post->posted_by)->first()->lname}}</span></div></a>
                  </footer>
                </div>
              </div>@endforeach
             
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
            {{$posts_cat->links()}}
            </nav>
          </div>
        </main>
@endsection

@section('scripts')
<script></script>
@endsection