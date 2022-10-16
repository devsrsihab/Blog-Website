      
      <!-- Sidebar -->
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
              <!-- Sidebar - Brand -->
              <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                  <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-brands fa-wordpress"></i></div>
                  <div  class="sidebar-brand-text mx-3">RS Admin <sup>2</sup></div>
              </a>
  
              <!-- Divider -->
              <hr class="sidebar-divider my-0">
              @if (Auth::check() && Auth::user()->role_as == '1')
                              <!-- Nav Item - Dashboard -->
              <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }} ">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

              @endif


              <!-- Divider -->
              {{-- <hr class="sidebar-divider"> --}}
  
              <!-- Heading -->
              {{-- <div class="sidebar-heading">
                  Interface
              </div>
   --}}
              <!-- Nav Item - Pages Categoires -->
              <li class="nav-item {{ Request::is('admin/categorie') || Request::is('admin/addCategorie') ? 'active':'' }}">
                  <a class="nav-link {{ Request::is('admin/categorie') || Request::is('admin/addCategorie') ? 'collapse':'collapsed' }}" href="#" data-toggle="collapse" data-target="#categorie"
                      aria-expanded="true" aria-controls="categorie">
                      <i class="fa-solid fa-table-cells"></i>
                      <span>Categories</span>
                  </a>
                  <div id="categorie" class="collapse  {{ Request::is('admin/categorie') || Request::is('admin/addCategorie') ? 'show':'' }}" aria-labelledby="categorie" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                          <a class="collapse-item {{ Request::is('admin/categorie') ? 'active':'' }}" href="{{ url('admin/categorie') }}">View Categories</a>
                          <a class="collapse-item {{ Request::is('admin/addCategorie') ? 'active':'' }}" href="{{ url('admin/addCategorie') }}">Add Categories</a>
                      </div>
                  </div>
              </li>
  
              <!-- Nav Item - Pages Posts -->
              <li class="nav-item {{ Request::is('admin/posts') || Request::is('admin/addPost') ? 'active':'' }}">
                  <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/addPost') ? 'collapse':'collapsed' }}" href="#" data-toggle="collapse" data-target="#posts"
                      aria-expanded="true" aria-controls="posts">
                      <i class="fa-regular fa-paste"></i>
                      <span>Posts</span>
                  </a>
                  <div id="posts" class="collapse {{ Request::is('admin/posts') || Request::is('admin/addPost') ? 'show':'' }}" aria-labelledby="posts" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                          <a class="collapse-item {{ Request::is('admin/posts')  ? 'show':'' }}" href="{{ url('admin/posts') }}">View Categories</a>
                          <a class="collapse-item {{ Request::is('admin/addPost')  ? 'show':'' }}" href="{{ url('admin/addPost') }}">Add Categories</a>
                      </div>
                  </div>
              </li>

              @if (Auth::check() && Auth::user()->role_as == '1')
              <!-- Nav Item - Pages Users -->
              <li class="nav-item {{ Request::is('admin/users') ? 'active':'' }}">
                <a class="nav-link " href="{{ url('admin/users') }}">
                  <i class="fa fa-user-circle"></i>
                  <span>Users</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
                <a class="nav-link collapsed" href="{{ url('admin/settings') }}" >
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Settings</span>
                </a>

            </li> 
              @endif

  
              {{-- <!-- Divider -->
              <hr class="sidebar-divider">
  
              <!-- Heading -->
              <div class="sidebar-heading">
                  Addons
              </div>
  
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                      aria-expanded="true" aria-controls="collapsePages">
                      <i class="fas fa-fw fa-folder"></i>
                      <span>Pages</span>
                  </a>
                  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                          <h6 class="collapse-header">Login Screens:</h6>
                          <a class="collapse-item" href="login.html">Login</a>
                          <a class="collapse-item" href="register.html">Register</a>
                          <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                          <div class="collapse-divider"></div>
                          <h6 class="collapse-header">Other Pages:</h6>
                          <a class="collapse-item" href="404.html">404 Page</a>
                          <a class="collapse-item" href="blank.html">Blank Page</a>
                      </div>
                  </div>
              </li>
   --}}

              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">
  
              <!-- Sidebar Toggler (Sidebar) -->
              <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>
  

          </ul>          
        <!-- End of Sidebar -->
