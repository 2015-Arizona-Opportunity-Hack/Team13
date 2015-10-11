<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Go Raffle Me - Event info</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>GRM</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>GoRaffle</b>ME</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="img/ticket.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span id="fullname" class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="img/ticket.jpg" class="img-circle" alt="User Image">
                    <p>
                      <span id="fullname">Alexander Pierce</span>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div>
                      <center><a href="#" class="btn btn-default btn-flat">Sign out</a></center>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="img/ticket.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><span id="fullname">Alexander Pierce</span></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <?php include('sidebar.php'); ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Event Info
          </h1>
        </section>

        <section class="content">
          <div class="row">
            
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">The form below contains the event info</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" novalidate>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" data-validation="required length" data-validation-length="max100">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="addr1" class="col-sm-2 control-label">Address 1</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="addr1" data-validation="required length" data-validation-length="max100">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="addr2" class="col-sm-2 control-label">Address 2</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="addr2" data-validation="length" data-validation-length="max100">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="city" class="col-sm-2 control-label">City</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="city" data-validation="required length" data-validation-length="max100">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="state" class="col-sm-2 control-label">State</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="state" data-validation="required federatestate">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zip" class="col-sm-2 control-label">Zip</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="zip" data-validation="required number">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="ticketprice" class="col-sm-2 control-label">Ticket Price</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="ticketprice" data-validation="required number" data-validation-allowing="float">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-8">
                        <textarea type="text" class="form-control" name="description" data-validation="required length" data-validation-length="max300"></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                    <!--<button type="submit" class="btn btn-info pull-right">Add Event</button>-->
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div class="modal fade" id="success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Success</h4>
            </div>
            <div class="modal-body">
              <p>Event added successfully</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->


      <div class="modal fade" id="fail">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
              <p>Event failed to add</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Go Raffle Me</a>.</strong> All rights reserved.
      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- JS Cookie -->
    <script src="js/jquery.cookie.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <script src="js/mustache.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.1/jquery.form-validator.min.js"></script>
    <script src="js/event.js"></script>

  </body>
</html>
