<header class="header-top bg-dark py-4">
    <div class="container">
        <nav class="navbar navbar-expand-lg navigation menu-white">
              <a class="navbar-brand" href="{{ asset('frontend') }}/#">
                <img src="{{ asset('frontend') }}/images/logo-w.png" alt="" class="img-fluid">
              </a>
  
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu  text-white"></span>
              </button>
  
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="menu navbar-nav ml-auto">
                        
                        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
  
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                       
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="{{ asset('frontend') }}/#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                <a class="dropdown-item" href="{{ asset('frontend') }}/post-video.html">Video Formats</a>
                                <a class="dropdown-item" href="{{ asset('frontend') }}/post-audio.html">Audio Format</a>
                                <a class="dropdown-item" href="{{ asset('frontend') }}/post-link.html">Quote Format</a>
                                <a class="dropdown-item" href="{{ asset('frontend') }}/post-gallery.html">Gallery Format</a>
                                <a class="dropdown-item" href="{{ asset('frontend') }}/post-image.html">Image Format</a>
                              </div>
                          </li>
                        
                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                    </ul>
                <div class="text-lg-right search ml-4">
                  <div class="search_toggle"><i class="ti-search text-white"></i></div>
                </div>
           </div>
        </nav>
    </div>
  </header>
  
  <!--search overlay start-->
    <div class="search-wrap">
        <div class="overlay">
            <form action="#" class="search-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-9">
                            <input type="text" class="form-control" placeholder="Search..."/>
                        </div>
                        <div class="col-md-2 col-3 text-right">
                            <div class="search_toggle toggle-wrap d-inline-block">
                                <i class="ti-close"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--search overlay end-->