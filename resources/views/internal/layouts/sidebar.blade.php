    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="{{ route('upload') }}"><i class="fa fa-upload fa-fw"></i> Upload</a>
                </li>
                <li>
                    <a href="{{ route('slipgaji') }}"><i class="fa fa-print fa-fw"></i> Slip Gaji</a>
                </li>
                <li>
                    <a href="{{ route('karyawan') }}"><i class="fa fa-users fa-fw"></i> Karyawan</a>
                </li>
                <li>
                    <a href="{{ route('pengguna') }}"><i class="fa fa-user-plus fa-fw"></i> Pengguna</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
