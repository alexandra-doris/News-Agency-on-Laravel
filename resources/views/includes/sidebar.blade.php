<aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search" style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 3px 8px 0 rgba(0, 0, 0, 0.19); padding: 20px">
            <header>
              <h3 class="h6">Search for news</h3>
            </header>
            <form action="/search/post" type="get" class="search-form">
              @csrf
              <div class="form-group">
                <input type="search" name="q" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="fas fa-search"></i></button>
              </div>
            </form>
          </div>
          
          <!-- Widget [Categories Widget]-->
          <div class="widget categories" style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 3px 8px 0 rgba(0, 0, 0, 0.19); padding: 20px">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
            @foreach ($cats as $cat)
            <div class="item d-flex justify-content-between"><a href="/category/{{$cat->slug}}">{{$cat->title}}</a></div>
            @endforeach
          </div>
          
</aside>