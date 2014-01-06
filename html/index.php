<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once($_SERVER["DOCUMENT_ROOT"] . '/../includes/init.php');

include_page_template('header');
include_page_template('nav');

log_action('Page Load', __FILE__);

?>




        <div class="row">
          <div class="col-lg-12">
            <h1>Trading Home <small>Welcome to your bitcoin trading platform</small></h1>
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




<?php
if (isset($database)){echo "true";} else { echo "false";}
echo "<br />";

// $record = User::find_by_id(1);
// echo $record->full_name() . '<br>';
// echo $record->email . '<br /><br />';


// $users = User::find_all();
// // echo $users[];

// foreach ($users as $user){
//   echo "User: " . $user->username . '<br />';
//   echo "pass: " . $user->password . '<br />';
//   echo "Name: " . $user->full_name() . '<br /> <br />';
// }
?>






<?php
  include_page_template('footer');
?>

