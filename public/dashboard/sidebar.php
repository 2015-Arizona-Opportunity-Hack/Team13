<!-- Sidebar Menu -->
<ul class="sidebar-menu" id="events">
    <script id="eventtemplate" type="x-tmpl-mustache">
      <li class="header">EVENTS</li>
      <li class="active"><a href="index.php"><i class="fa fa-link"></i> <span>Add Events</span></a></li>

      {{ #events }}
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>{{name}}</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="event.php?id={{id}}">Information</a></li>
          <li><a href="items.php?id={{id}}">Items</a></li>
        </ul>
      </li>
      {{ /events }}
    </script>

  
</ul><!-- /.sidebar-menu -->