<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/../control/init.php');
if ($session->is_logged_in()) { redirect_to("index.php"); }

if (isset($_POST['submit'])){     // form submitted
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // check database to see if user exists
    $found_user = User::authenticate($username, $password);


    if ($found_user){
      $session->login($found_user);
      redirect_to("index.php");
    } else {
      //username password combo not found
      $message = "username/password combination incorrect";
    }

} else { // for not subbitedd
    $username = "";
    $password = "";

}
include_page_template('header');
include_page_template('nav');
?>
<!------------------------------------------------------------->
        <div class="row">
          <div class="col-lg-12">
            <h1>Login <small>Enter Your Data</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Visit <a class="alert-link" target="_blank" href="register.php">our registration page</a> for more information.
            </div>
          </div>
        </div>
<!------------------------------------------------------------->
    <?php echo output_message($message); ?>
    <div class="form-group">

    <form action="login.php" method="post">
      <table>
        <tr>
          <td><label>Username:</label></td>
          <td>
            <input class="form-control" type="text" placeholder="<?php if(htmlentities($username)) {echo htmlentities($username);} else { echo "you@email.com"; } ?>" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
          </td>
        </tr>
        <tr>
          <td><label>Password:</label></td>
          <td>
            <input class="form-control" type="password" placeholder="<?php if(htmlentities($password)) {echo htmlentities($password);} else { echo "password"; } ?>" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input class="form-control" type="submit" placeholder="submit" name="submit" value="Login" />
          </td>
        </tr>
      </table>
    </form>

    </div>
<!------------------------------------------------------------->
<?php
include_page_template('footer');

if(AUTO_LOGOUT){$session->logout(); echo "<h4>You have been automatically logged out for development</h4>";}
if(isset($database)) { $database->close_connection(); }
?>
