<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          {{-- <a href="#" class="nav-link">
            <div class>
              <img class>
              <div class="dot-indicator bg-success"></div>
            </div>
            <div class="text-wrapper">
              <p class="profile-name">Allen Moreno</p>
              <p class="designation">Premium user</p>
            </div>
          </a> --}}
          
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('product')}}">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Add New Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('showproduct')}}">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Show All Products</span>
          </a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('showorder')}}">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Orders</span>
          </a>
        </li>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/samples/login.html"> Login </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/samples/register.html"> Register </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>