<aside id="sidebar-left" class="sidebar-left">
				
  <div class="sidebar-header">
    <div class="sidebar-title">
      Navigation
    </div>
    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <div class="nano">
    <div class="nano-content">
      <nav id="menu" class="nav-main" role="navigation">
        <ul class="nav nav-main">
          <li class="{{ Request::is('dashboard') ? 'nav-active' : '' }}">
            <a href="index.html">
              <i class="fa fa-home" aria-hidden="true"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="mailbox-folder.html">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>Mailbox</span>
            </a>
          </li>
          <li class="nav-parent {{-- nav-expanded nav-active --}}">
            <a>
              <i class="fa fa-copy" aria-hidden="true"></i>
              <span>Pages</span>
            </a>
            <ul class="nav nav-children">
              <li>
                <a href="pages-signup.html">
                   Sign Up
                </a>
              </li>
              <li>
                <a href="pages-signin.html">
                   Sign In
                </a>
              </li>
              <li class="{{-- nav-active --}}">
                <a href="pages-blank.html">
                   Blank Page
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>

      <hr class="separator" />

      <div class="sidebar-widget widget-tasks">
        <div class="widget-header">
          <h6>Projects</h6>
          <div class="widget-toggle">+</div>
        </div>
        <div class="widget-content">
          <ul class="list-unstyled m-none">
            <li><a href="#">Porto HTML5 Template</a></li>
            <li><a href="#">Tucson Template</a></li>
            <li><a href="#">Porto Admin</a></li>
          </ul>
        </div>
      </div>

      <hr class="separator" />

    </div>

  </div>

</aside>