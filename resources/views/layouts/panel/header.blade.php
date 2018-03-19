<style type="text/css">
@media (max-width: 767px){
  .skin-blue .main-header .navbar .dropdown-menu li a {
    color: #777 !important;
  }
}
</style>

<header class="main-header">
  <a href="{{ route('panelIndex') }}" class="logo">
    Admin<b>LTE</b>
    <!-- <span class="logo-mini"><b>SA</b>DA</span> -->
    <!-- <span class="logo-lg"><b>SADA</b> <small style="font-size: 6pt">Creative</small></span> -->
  </a>

  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">0</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 0 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                  <!-- <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li> -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <!-- <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">{{ @Auth::user()->name }}</span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li role="separator" class="divider"></li>
              <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-key"></i> Log Out </a></li>
            </ul>
          </li>
          <li>&nbsp;</li>
        </ul>

      </div>
    </nav>
  </header>
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>