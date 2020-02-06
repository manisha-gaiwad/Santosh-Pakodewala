<nav class="main-header navbar navbar-expand navbar-white navbar-light"  style="background: #3c8dbc;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
   
     @guest 
     <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
      @endif
    @else
     <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 <img src="{{ asset('images/avatar5.png') }}" class="resize_img"> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu  user_header" aria-labelledby="navbarDropdown">
                              <img src="{{ asset('images/avatar5.png') }}" class="resize_logout_img">
                               <p style="margin-bottom: 10px;">Member Since 2019-<?php echo date("Y");?></p>
                               <div>
                                  <div class="pull-right">
                                    <a href="" class="user-logout">Profile</a>
                                  </div>
                                   <div class="pull-left ">
                                       <a href="{{ route('logout') }}" class="user-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-key"></i>
                                        <span>{{ __('Logout') }}</span>
                                      </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                 </form>
                                </div>
                               </div>
                             
                            </div>
                        </li>
                    @endguest
       
    </ul>
  </nav>