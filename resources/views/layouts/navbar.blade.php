<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">PT. Techno Multi Utama</a>
  </div>
  <!-- /.navbar-header -->
  <ul class="nav navbar-top-links navbar-right">
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i> {{ Auth::guard('karyawan')->user()->nama }} <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
              <li>
                  <a href="#"><i class="fa fa-user fa-fw"></i> {{ Auth::guard('karyawan')->user()->nama }}</a>
              </li>
              <li>
                  <a href="{{ route('karyawan.karyawan.pengaturan') }}"><i class="fa fa-gear fa-fw"></i> Pengaturan</a>
              </li>
              <li class="divider"></li>
              <li>
                  <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                  <form id="logout-form" action="{{ route('karyawan.login.logout')}}" method="post" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
          </ul>
          <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->
