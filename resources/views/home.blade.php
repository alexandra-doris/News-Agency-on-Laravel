@extends('includes.master')

@section('content')
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">Some great intro here</h2>
            <p class="text-big">Place a nice <strong>introduction</strong> here <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
          </div>
        </div>
      </div>
    </section>
    @php
      $public_posts->appends(['users'=>$users])->render();
    @endphp

    <section class="featured-posts no-padding-top">
    <div class="container">
    @foreach($public_posts as $key => $post)
                @php
                $post_user;
                foreach ($users as $user)
                  if($user->id == $post->posted_by)
                    $post_user=$user;
                @endphp

        @if($key%2==0)
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category">
                  @foreach ($cats as $cat)
                    @if ($cat->id === $post->category_id)
                    <a href="/category/{{$cat->slug}}">
                      {{$cat->title}}</a>
                      @endif
                  @endforeach
                  </div><a href="/post/{{$post->slug}}">
                    <h2 class="h4">{{$post->title}}</h2></a>
                </header>
                <p>{{Str::limit($post->subtitle, 250)}}</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{asset('/storage/'.$post_user->image)}}" width="40px" height="auto" alt="..." class="img-fluid"></div>
                    <div class="title" style="padding: 0 10px"><span>{{$post_user->fname}} {{$post_user->lname}}   </span></div></a>
                  <div class="date"><i class="far fa-clock"></i> {{date('M d | Y', strtotime($post->created_at))}}</div>
                  <div class="comments"><i class="far fa-eye" style="padding: 0 10px"></i>{{$post->views}}</div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5" ><img src="{{asset('/storage/'.$post->image)}}" alt="..."></div>
        </div>
        @else
        <!-- Post        -->
        <div class="row d-flex align-items-stretch">
        <div class="image col-lg-5"><img src="{{asset('/storage/'.$post->image)}}" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                    <div class="category">
                    @foreach ($cats as $cat)
                    @if ($cat->id === $post->category_id)
                    <a href="/category/{{$cat->slug}}">
                      {{$cat->title}}</a>
                      @endif
                    @endforeach
                    </div><a href="/post/{{$post->slug}}">
                    <h2 class="h4">{{$post->title}}</h2></a>
                </header>
                <p>{{Str::limit($post->subtitle, 250)}}</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{asset('/storage/'.$post_user->image)}}" width="40px" height="auto" alt="..." class="img-fluid"></div>
                    <div class="title" style="padding: 0 10px"><span>{{$post_user->fname}} {{$post_user->lname}}   </span></div></a>
                  <div class="date"><i class="far fa-clock"></i> {{date('M d | Y', strtotime($post->created_at))}}</div>
                  <div class="comments"><i class="far fa-eye" style="padding: 0 10px"></i>{{$post->views}}</div>
                </footer>
              </div>
            </div>
          </div>
        </div>
        @endif

    @endforeach
    <!--<div style="padding: 10px;">{{$public_posts->links()}}</div>-->
    </div>

    </section>
@endsection

@section('scripts')
<script></script>
@endsection