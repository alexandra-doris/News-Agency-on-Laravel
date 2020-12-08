<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
  @foreach($public_posts->slice(0, 3) as $key => $post)
    <div class="carousel-item {{$key == 0 ? 'active' : '' }}" >
        <img class="d-block w-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9))" src="{{asset('/storage/'.$post->image)}}" height='600px' alt="First slide">
      <div class="carousel-caption text-justify" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));padding:10px; margin-bottom:50px; margin-left:30%">
        <a class="title " style="width: 100%; color:white; float: right;" href="/post/{{$post->slug}}"><h4>{{$post->title}}</h4></a>
        <p style="width: 90%;">{{Str::limit($post->subtitle, 200)}}</p>
      </div>
    </div>
  @endforeach
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->