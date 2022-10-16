
<div class="sticky-top bg-white">
    <div class="container justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            @php
                $settingee = App\Models\settings::find(1);
            @endphp
            <a class="navbar-brand" href="{{ url('/') }}">
            @if ($settingee)
            <img src="{{ asset('uploads/settings/'.$setting->logo) }}" alt="logo" style="width:55px;height:55px">
            @endif
              </a>
                




            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @php
                    $categories = App\Models\categories::where('navbar_status','1')->where('status','1')->get();
                    @endphp
                    @foreach ($categories as $categorie )
                    <li class="nav-item">
                        <a class="nav-link display-6" href="{{ url('tutorials/'.$categorie->slug) }}">{{ $categorie->name }} </a>
                    </li>
                    @endforeach
                </ul>
                <div class="my-2 my-lg-0">
                    <a href="{{ url('login') }}" class="btn btn-outline-primary px-4 my-2 mx-2 my-sm-0">Login</a>
                    <a href="{{ url('register') }}" class="btn btn-outline-success px-4 my-2 mx-2 my-sm-0" >Register</a>
                </div>
                <div class="my-2 my-lg-0">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow d-flex">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                @php
                                 if (Auth::check()) {
                                     $usersName = Illuminate\Support\Facades\Auth::user()->name;
                                     echo $usersName;
                                 }                               
                                @endphp
                            </span>
                            <img style="widht:2rem;height:2rem" class="img-profile rounded-circle"
                                src="{{ asset('assets/img/undraw_profile.svg') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                <i class="fa-solid fa-house fa-sm fa-fw mr-2 text-gray-400"></i>
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
    
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
    
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </a>
                        </div>
                    </li>
                </div>
            </div>
        </nav>
    </div>
    
</div>
