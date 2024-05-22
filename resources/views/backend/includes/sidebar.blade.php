      
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> 
                <!-- <img alt="image" src="assets/img/logo.png" class="header-logo" /> -->
                <span
                class="logo-name">E-commerce</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown active">
              <a href="{{route('dashboard')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Brands</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('brand.create')}}">Add New Brand</a></li>
                <li><a class="nav-link" href="{{route('brand.manage')}}">Manage All Brands</a></li>
              </ul>
            </li>

            </li>
          </ul>
        </aside>
      </div>