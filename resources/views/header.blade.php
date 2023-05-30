<div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="preloader-circle"></div>
          <div class="preloader-img pere-text">
            <img src="assets/images/logo/logo.png" alt="" />
          </div>
        </div>
      </div>
    </div>
    <!-- Preloader Start-->
    <header>
      <!-- Header Start -->
      <div class="header-area">
        <div class="main-header header-sticky">
          <div class="container-fluid">
            <div
              class="menu-wrapper d-flex align-items-center justify-content-between"
            >
              <div class="header-left d-flex align-items-center">
                <!-- Logo -->
                <div class="logo">
                  <a href="index.html">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="" />
                  </a>
                </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-lg-block">
                  <nav>
                    <ul id="navigation" class="browsemore">
                      <li><a href="{{ url('index') }}">Home</a></li>
                      <li><a href="{{ url('shop') }}">Shop</a></li>
                      <li><a href="{{ url('about') }}">About</a></li>
                      <li><a href="{{ url('product_details') }}">Contact</a></li>
                      <li><a class="navprofile" href="#">Profile</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="header-right1 d-flex align-items-center">
                <!-- Social -->
                <!-- <div class="header-social d-none d-md-block">
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="https://bit.ly/sai4ull"
                    ><i class="fab fa-facebook-f"></i
                  ></a>
                  <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div> -->
                <!-- Search Box -->
                <div class="search d-md-block">
                  <ul class="d-flex align-items-center">
                    <li class="srch">
                      <form class="form-inline">
                        <input class="form-control mr-sm-2 search" type="search" placeholder="Search" aria-label="Search"/>
                        <div class="btn search-switch">
                          <i class="ti-search"></i>
                        </div>
                      </form>
                    </li>
                    <li>
                      <a href="wishlist.php">
                      <div class="card-stor mx-3">
                        <img id="heart" src="{{ asset('assets/images/logo/heart.svg') }}" media="(min-width: 800px)" alt="" />
                        <span>0</span>
                      </div>
                    </a>
                    </li>
                    <li class="logocart">
                      <div class="card-stor">
                        <img id="cart" src="{{ asset('assets/images/logo/card.svg') }}" alt="" />
                        <span>0</span>
                      </div>
                    </li>
                    
                    {{-- <li class="logocart-login">
                      <!-- <a href="profile.php"> -->
                        <div class="user mx-3" style="cursor:pointer;">
                          <img src="{{ asset('assets/images/logo/person.svg') }}" alt="" />
                        </div>
                      <!-- </a> -->
                    </li> --}}
                    {{-- <li class="logocart-login">
                      @if(session('customer_id'))
                        <a href="/profile">
                      @else
                        <a href="/login">
                      @endif
                        <div class="user mx-3" style="cursor:pointer;">
                          <img src="{{ asset('assets/images/logo/person.svg') }}" alt="" />
                        </div>
                      </a>
                    </li> --}}
                    @if(session('customer_id'))
                    @php
                        $loginTime = session('login_time');
                        $currentTime = time();
                        $remainingTime = $loginTime + 5 * 60 * 60 - $currentTime;
                    @endphp
                
                    @if($remainingTime > 0)
                    <li class="logocart-login">
                         <a href="/profile">
                        <div class="user mx-3" style="cursor:pointer;">
                          <img src="{{ asset('assets/images/logo/person.svg') }}" alt="" />
                        </div>
                      </a>
                      </li>
                    
                    @endif
                        {{-- <div class="user mx-3" style="cursor:pointer;">
                            <img src="{{ asset('assets/images/logo/person.svg') }}" alt="" />
                        </div>
                    </a> --}}
                    @else
                    <script>console.log("halooooooo")</script>
                    <li class="logocart-login">
                      <!-- <a href="profile.php"> -->
                        <div class="user mx-3" style="cursor:pointer;">
                          <img src="{{ asset('assets/images/logo/person.svg') }}" alt="" />
                        </div>
                      <!-- </a> -->
                    </li>
                @endif
                    
                  </ul>
                </div>
              </div>
              <!-- Mobile Menu -->
              <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header End -->
      
    </header>