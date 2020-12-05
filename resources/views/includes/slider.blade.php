<script type="text/javascript">
    $(document).ready(function() {
    $('.carousel').carousel({interval: 1000});});
    </script>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="background:rgba(0,0,0, 0.9);" role="listbox">
  @foreach($public_posts->slice(0, 3) as $key => $post)
  <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="background: url({{asset('/storage/'.$post->image)}})no-repeat center center fixed;">
      <img class="d-block w-100" style="opacity: 0;" src="{{asset('/storage/'.$post->image)}}" width="auto" height="600px" alt="{{$post->title}}">
      <div class="carousel-caption d-none d-md-block">
        <a style="color:white" href="/post/{{$post->slug}}"><h4>{{$post->title}}</h4></a>
        <p>{{$post->subtitle}}</p>
        </div>
  </div>
  @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>