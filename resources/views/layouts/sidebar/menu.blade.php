<!-- Sidebar Menu -->
<ul class="sidebar-menu">
  <li class="header">Main Navigation</li>
  <!-- Optionally, you can add icons to the links -->
  <li {{ \Request::segment(1) == 'home' ? 'class=active' : '' }}><a href="{{ url('/home') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
  <li class="treeview {{ in_array(\Request::segment(1), ['example']) ? 'active' : '' }}">
      <a href="#"><i class="fa fa-table"></i> <span>Component</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li {{ \Request::segment(1) == 'example' ? 'class=active' : '' }}><a href="{{ url('/example') }}">Example</a></li>
    </ul>
  </li>
</ul>
<!-- /.sidebar-menu -->