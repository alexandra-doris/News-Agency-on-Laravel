      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg fixed-top" style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 3px 8px 0 rgba(0, 0, 0, 0.19); padding: 20px">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="#">
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container" >
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between" >
            <!-- Navbar Brand --><a href="{{route('home')}}" class="navbar-brand">NewsAgency</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="{{route('home')}}" class="nav-link active ">{{__('header.home')}}</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{__('header.categories')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach ($cats as $cat)
                  <a class="dropdown-item" href="/category/{{$cat->slug}}">{{$cat->title}}</a>
                  @endforeach
                </div>
              </li>
              <li class="nav-item"><a href="#" class="nav-link ">{{__('header.about')}}</a>
              </li>
              <li class="nav-item"><a href="#" class="nav-link ">{{__('header.contact')}}</a>
              </li>
            </ul>
            <ul class="langs navbar-text"><a href="#" class="active">EN</a><span>           </span><a href="#">RO</a></ul>
          </div>
        </div>
      </nav>
