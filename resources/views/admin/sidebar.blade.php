   <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <div class="logo-header" data-background-color="dark">
        <a href="/admin" onclick="loadHomePage(); return false;" class="logo" style="color:white">
          <img style="margin-left:-20px"  width=200 height=80
            src="{{asset('jerry.png')}}"
            alt="navbar brand"
            class="navbar-brand"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
            <a
              data-bs-toggle="collapse"
              href="/admin" onclick="loadHomePage(); return false;"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="dashbo">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin" onclick="loadHomePage(); return false;">
                    <span class="sub-item">Home</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a href="/admin/users" onclick="loadUsersPage(); return false;">
              <i class="icon-user"></i>
              <p>Users</p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/admin/section_1" onclick="loadsection1Page(); return false;">
              <i class="icon-list"></i>
              <p>Section 1</p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/admin/section_2" onclick="loadsection2Page(); return false;">
              <i class="icon-plus"></i>
              <p>Section 2</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/section_3" onclick="loadsection3Page(); return false;">
              <i class="icon-diamond"></i>
              <p>Section 3</p>
            </a>
          </li>

           <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Section 4</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="/admin/section_4" onclick="loadsection4Page(); return false;">
                        <span class="sub-item">Add List</span>
                      </a>
                    </li>
                   
                  </ul>
                </div>
              </li>


            <li class="nav-item">
            <a href="/admin/section_5" onclick="loadsection5Page(); return false;">
              <i class="icon-note"></i>
              <p>Section 5</p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/admin/section_6" onclick="loadsection6Page(); return false;">
              <i class="icon-flag"></i>
              <p>Section 6</p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/admin/section_7" onclick="loadsection7Page(); return false;">
              <i class="icon-cloud-upload"></i>
              <p>Section 7</p>
            </a>
          </li>

            <li class="nav-item">
            <a href="/admin/section_8" onclick="loadsection8Page(); return false;">
              <i class="icon-loop"></i>
              <p>Section 8</p>
            </a>
          </li>
                
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->