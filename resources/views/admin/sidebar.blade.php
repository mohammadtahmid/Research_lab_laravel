      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a href="{{ url('admin/dashboard') }}"> <i class="icon-home"></i>Home </a></li>

                <li class="{{ Request::is('view_logo') ? 'active' : '' }}">
                    <a href="{{ url('view_logo') }}"> <i class="icon-grid"></i>Logo </a>
                </li>

                <li class="{{ Request::is('view_slide') ? 'active' : '' }}">
                    <a href="{{ url('view_slide') }}"> <i class="fa fa-chevron-right"></i>Slider </a>
                </li>

                <li >
                    <a class="{{ Request::is('student_list') ? 'active' : '' }}" href="#peopleDropdown" aria-expanded="false" data-toggle="collapse">
                        <i class="fa fa-id-card"></i> People
                    </a>
                    <ul id="peopleDropdown" class="collapse list-unstyled">
                        <li><a href="{{ url('student_list') }}"><i class="fa fa-users"></i> Student List</a></li>
                        <li><a href="{{ url('teacher_info') }}"><i class="fa fa-user-plus"></i> Teacher Info</a></li>
                        <li><a href="{{ url('student_report') }}"><i class="fa fa-file-text"></i> Student Report</a></li>
                    </ul>
                </li>

                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>

        </ul>
      </nav>
