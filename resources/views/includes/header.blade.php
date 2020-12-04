      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
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
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="{{route('home')}}" class="navbar-brand">NewsAgency</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="{{route('home')}}" class="nav-link active ">{{__('header.home')}}</a>
              </li>
              <li class="nav-item"><a href="{{route('categories')}}" class="nav-link ">{{__('header.categories')}}</a>
              </li>
              <li class="nav-item"><a href="post.html" class="nav-link ">{{__('header.about')}}</a>
              </li>
              <li class="nav-item"><a href="#" class="nav-link ">{{__('header.contact')}}</a>
              </li>
            </ul>
            <div class="navbar-text"><a href="#" class="search-btn"><i class="fas fa-search"></i></a></div>
            <ul class="langs navbar-text"><a href="#" class="active">EN</a><span>           </span><a href="#">RO</a></ul>
          </div>
        </div>
      </nav>
