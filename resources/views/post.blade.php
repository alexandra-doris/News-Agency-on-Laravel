@extends('includes.master')

@section('content')
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img src="{{asset('/storage/'.$post->image)}}" style="background-color:rgba(0, 0, 0, 0.8)" alt="..." class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="/category/{{$cat->slug}}">{{$cat->title}}</a></div>
                </div>
                <h1>{{$post->title}}</h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{asset('/storage/'.$user->image)}}" alt="..." class="img-fluid"></div>
                    <div class="title"><span>{{$user->fname}} {{$user->lname}}</span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="far fa-clock"></i> {{date('d M Y', strtotime($post->created_at))}}</div>
                    <div class="views meta-last"><i class="far fa-eye"></i>{{$post->views}}</div>
                  </div>
                </div>
                <div class="post-body">{!!$post->body!!}</div>
              </div>
            </div>
          </div>
        </main>
@endsection

@section('scripts')
<script></script>
@endsection