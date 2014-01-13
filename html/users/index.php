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

$coinbase = new Coinbase('9cf839fa926890230865b54bfe787f57cfdb49b6c3ad45eca775037ff7a5c206');
?>

<!------------------------------------------------------------->
        <div class="row">
          <div class="col-lg-12">
            <h1>Welcome to Your Trading Platform <small>Have fun, poke around a bit :)</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <a class="alert-link"></a> BTC Account: <?php echo $coinbase->getReceiveAddress(); ?>
            </div>
          </div>
        </div>
<!------------------------------------------------------------->
<?PHP

?>

<br /><br />
<a href="login.php">LOGIN</a>

<?php
include_page_template('footer');

if(AUTO_LOGOUT){$session->logout(); echo "<h4>You have been automatically logged out for development</h4>";}
if(isset($database)) { $database->close_connection(); }
?>


