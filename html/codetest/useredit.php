<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/../control/init.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
include_page_template('header');
$q=$_GET["q"];
if($q > 1) {echo "FUCK";}
?>


<?php
include_page_template('nav');
?>
<!------------------------------------------------->
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
<?PHP

$users = User::find_all();
// echo $users[];
echo "<form>";

foreach ($users as $user){
    echo "ID: " . $user->id . "<br /><input type='radio' name='id' value=" . $user->id . ">";
    echo "User: " . $user->username . '<br />';
    echo "pass: " . $user->password . '<br />';
    echo "Salt: " . $user->salt . '<br />';
    echo "Hash: " . $user->password_hash . '<br />';
    echo "password_hash: " . $user->password_hash . '<br /><br />';
    
    //    $user->update();
}
echo "<input type=button value='CLICK ME' onclick=\"showUser(this.value)\"> </form>";
?>



<br /><br />
<a href="login.php">LOGIN</a>


<div id="txtHint"><b>Person info will be listed here.</b></div>

<h4>You have been automatically logged out for development</h4>


<?php
include_page_template('footer');

if(AUTO_LOGOUT){$session->logout();}
if(isset($database)) { $database->close_connection(); }
?>


