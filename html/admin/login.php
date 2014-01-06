<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/../includes/init.php');

require_once('../../includes/header.php');
require_once('../../includes/nav.php');

?>

    <?php //echo output_message($message); ?>

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


    <form action="login.php" method="post">
      <table>
        <tr>
          <td>Username:</td>
          <td>
            <input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
          </td>
        </tr>
        <tr>
          <td>Password:</td>
          <td>
            <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Login" />
          </td>
        </tr>
      </table>
    </form>



<?php 
  include_page_template('footer');

  if(isset($database)) { $database->close_connection(); }
?>

