<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group" id="tableList_filter">
          <input type="search" class="form-control" placeholder="Search..." aria-controls="tableList">
          <span class="input-group-btn">
                <button type="button" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>

        <li class="{{ Request::is('admin') ? 'active open' : '' }}">
          <a href="{{ route('panelIndex') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li class="{{ Request::is('panel/city/*') ? 'active open' : '' }}">
          <a href="{{ route('panelCityList') }}">
            <i class="fa fa-map"></i> <span>City</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li class="{{ Request::is('panel/discovery/*') ? 'active open' : '' }}">
          <a href="{{ route('panelDiscoveryList') }}">
            <i class="fa fa-map"></i> <span>Discovery</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li class="{{ Request::is('panel/service/*') ? 'active open' : '' }}">
          <a href="{{ route('panelServiceList') }}">
            <i class="fa fa-cogs"></i> <span>Service</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li class="{{ Request::is('panel/traveler/*') ? 'active open' : '' }}">
          <a href="{{ route('panelTravelerList') }}">
            <i class="fa fa-user"></i> <span>Traveler</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li class="{{ Request::is('panel/trip/*') ? 'active open' : '' }}">
          <a href="{{ route('panelTripList') }}">
            <i class="fa fa-user"></i> <span>Trip</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>