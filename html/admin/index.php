<?php

require_once(dirname(__FILE__) . '/../../includes/functions.php');
require_once(dirname(__FILE__) . '/../../includes/session.php');

if (!$session->is_logged_in()) { redirect_to("login.php"); }

?>

<?php
require_once('../../includes/header.php');
require_once('../../includes/nav.php');
?>

        <div class="row">
          <div class="col-lg-12">
            <h1>Admin <small>Enter Your Data</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Visit <a class="alert-link" target="_blank" href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a> for more information.
            </div>
          </div>
        </div>

<h1> WELCOME TO ADMIN PANEL </h1>














<?php 
if(isset($database)) { $database->close_connection(); }

require_once('../../includes/footer.php');




// Dump x
ob_start();
var_dump(debug_backtrace());
$contents = ob_get_contents();
ob_end_clean();
log_action($contents);
// error_log($contents);

?>


