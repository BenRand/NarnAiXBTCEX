<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/../control/init.php');
if (!$session->is_logged_in()) { redirect_to("users"); }
if ($session->is_logged_in()) { redirect_to("users"); }

include_page_template('header');
include_page_template('nav');
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

<h1>ROOT HOMEPAGE</h1>
<h2>You should not see this page</h2>

<?php
$issue = new bugtrack();

$issue->title = "first issue";
$issue->save();


//$user = User::find_by_id(5); if (isset($user->id)){$user->delete(); echo "User deleteed";}

?>


<?php
    include_page_template('footer');
?>

