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
include_page_template('nav');
?>
<!------------------------------------------------->
        <div class="row">
          <div class="col-lg-12">
            <h1>Admin <small>Enter Your Data</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="active"></i> Dashboard</a></li>
              <li><a href="bug.php"><i class="fa fa-dashboard"></i> Bug Tracker</a></li>
              <li><a href="../users"><i class="fa fa-dashboard"></i> User Home</a></li>

            </ol>
          </div>
        </div>
<?PHP
//$record = User::find_by_id(1);
//echo $record->full_name() . '<br>';
//echo $record->email . '<br /><br />';


//$users = User::find_all();
// echo $users[];


//foreach ($users as $user){
//    echo "User: " . $user->username . '<br />';
//    echo "pass: " . $user->password . '<br />';
//    echo "Salt: " . $user->salt . '<br />';
//    echo "Hash: " . $user->password_hash . '<br />';
//    $user->password_hash = hash('sha256', $user->salt . $user->password);
//    echo "password_hash: " . $user->password_hash . '<br /><br />';
//    $user->testdata = true;
////    $user->update();
//}






$users = User::find_all();
// echo $users[];

foreach ($users as $user){
    echo "User: " . $user->username . '<br />';
    echo "pass: " . $user->password . '<br />';
    echo "Salt: " . $user->salt . '<br />';
    echo "Hash: " . $user->password_hash . '<br />';
    echo "password_hash: " . $user->password_hash . '<br /><br />';
    
    //    $user->update();
}
?>



<br /><br />
<a href="login.php">LOGIN</a>


<h4>You have been automatically logged out for development</h4>


<?php
include_page_template('footer');

if(AUTO_LOGOUT){$session->logout();}
if(isset($database)) { $database->close_connection(); }
?>


