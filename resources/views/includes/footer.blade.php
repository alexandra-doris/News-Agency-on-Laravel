      <div class="container">
        <div class="row">
          <div class="col-md-4" style="padding: 20px 20px">
            <div class="logo">
              <h6 class="text-white">News Agency</h6>
            </div>
            <div class="contact-details">
              <p>The New York Times Company,</p>
              <p>620 Eighth Avenue,</p>
              <p>New York, NY 10018</p>
              <p>Email: <a href="mailto:contact@news.test">contact@news.test</a></p>
              <ul class="social-menu">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-auto" style="padding: 20px 100px 0 0; width: 300px">
            <div class="menus d-flex">
              <ul class="list-unstyled">
                    @if(Auth::check())
                <li>
                    <a href="{{route('showusers')}}">Dashboard</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </li>
                
                <li><a href="/admin/users/{{$auth_user->id}}"><div class="post d-flex align-items-center" >
                  <div class="image"><img src="{{asset('/storage/'.$auth_user->image)}}" width="50px" height="auto" alt="..." class="img-fluid"></div>
                </div></a></li>
                <li><a href="/admin/users/{{$auth_user->id}}"><div class="post d-flex align-items-center" >
                  <div class="title" style="color:white"><strong>{{$auth_user->fname}} {{$auth_user->lname}}</strong></div>
                </div></a></li>
                    @else
                <li>
                    <a href="{{route('register')}}">Register</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}">Login</a>
                </li>
                    @endif
                </ul>
            </div>
          </div>
          <div class="col-md-4" style="background-color:rgba(0, 0, 0, 0.7); padding: 20px 20px">
            <div class="latest-posts" >
            <ul class="list-unstyled">
            @foreach ($public_posts->slice(0, 3) as $post)
                <li><a href="/post/{{$post->slug}}"><div class="post d-flex align-items-center" >
                  <div class="image" style="border:0px;background-color:rgba(255, 255, 255, 1)"><img src="{{asset('/storage/'.$post->image)}}" alt="..." class="img-fluid"></div>
                  <div class="title" style="color:white"><strong>{{$post->title}}</strong><span class="date last-meta" style="color:white">{{date('M d, Y', strtotime($post->created_at))}}</span></div>
                </div></a></li>@endforeach</ul></div>
          </div>
        </div>
      </div>
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>Copyright &copy; NewsAgency 2020</p>
            </div>
            <div class="col-md-6 text-right">
              <!--<p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">Bootstrapious</a>-->
                <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         </p>-->
            </div>
          </div>
        </div>
      </div>



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color:black">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body" style="color:black">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        </div>
    </div>
</div>
</div>