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
<!------------------------------------------------------------->
        <div class="row">
          <div class="col-lg-12">
            <h1>Current Market Data <small>Enter Your Data</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Visit <a class="alert-link" target="_blank" href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a> for more information.
            </div>
          </div>
        </div>
<!----------------------------------------------------------->



    <div class="row">
        <div class="col-lg-6">
            <h2>Bordered Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover tablesorter">
                    <thead>
                    <tr>
                        <th>Page <i class="fa fa-sort"></i></th>
                        <th>Visits <i class="fa fa-sort"></i></th>
                        <th>% New Visits <i class="fa fa-sort"></i></th>
                        <th>Revenue <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>/index.html</td>
                        <td>1265</td>
                        <td>32.3%</td>
                        <td>$321.33</td>
                    </tr>
                    <tr>
                        <td>/about.html</td>
                        <td>261</td>
                        <td>33.3%</td>
                        <td>$234.12</td>
                    </tr>
                    <tr>
                        <td>/sales.html</td>
                        <td>665</td>
                        <td>21.3%</td>
                        <td>$16.34</td>
                    </tr>
                    <tr>
                        <td>/blog.html</td>
                        <td>9516</td>
                        <td>89.3%</td>
                        <td>$1644.43</td>
                    </tr>
                    <tr>
                        <td>/404.html</td>
                        <td>23</td>
                        <td>34.3%</td>
                        <td>$23.52</td>
                    </tr>
                    <tr>
                        <td>/services.html</td>
                        <td>421</td>
                        <td>60.3%</td>
                        <td>$724.32</td>
                    </tr>
                    <tr>
                        <td>/blog/post.html</td>
                        <td>1233</td>
                        <td>93.2%</td>
                        <td>$126.34</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <h2>Bordered with Striped Rows</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                    <tr>
                        <th>Page <i class="fa fa-sort"></i></th>
                        <th>Visits <i class="fa fa-sort"></i></th>
                        <th>% New Visits <i class="fa fa-sort"></i></th>
                        <th>Revenue <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>/index.html</td>
                        <td>1265</td>
                        <td>32.3%</td>
                        <td>$321.33</td>
                    </tr>
                    <tr>
                        <td>/about.html</td>
                        <td>261</td>
                        <td>33.3%</td>
                        <td>$234.12</td>
                    </tr>
                    <tr>
                        <td>/sales.html</td>
                        <td>665</td>
                        <td>21.3%</td>
                        <td>$16.34</td>
                    </tr>
                    <tr>
                        <td>/blog.html</td>
                        <td>9516</td>
                        <td>89.3%</td>
                        <td>$1644.43</td>
                    </tr>
                    <tr>
                        <td>/404.html</td>
                        <td>23</td>
                        <td>34.3%</td>
                        <td>$23.52</td>
                    </tr>
                    <tr>
                        <td>/services.html</td>
                        <td>421</td>
                        <td>60.3%</td>
                        <td>$724.32</td>
                    </tr>
                    <tr>
                        <td>/blog/post.html</td>
                        <td>1233</td>
                        <td>93.2%</td>
                        <td>$126.34</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-6">
            <h2>Basic Table</h2>
            <div class="table-responsive">
                <table class="table table-hover tablesorter">
                    <thead>
                    <tr>
                        <th>Page <i class="fa fa-sort"></i></th>
                        <th>Visits <i class="fa fa-sort"></i></th>
                        <th>% New Visits <i class="fa fa-sort"></i></th>
                        <th>Revenue <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>/index.html</td>
                        <td>1265</td>
                        <td>32.3%</td>
                        <td>$321.33</td>
                    </tr>
                    <tr>
                        <td>/about.html</td>
                        <td>261</td>
                        <td>33.3%</td>
                        <td>$234.12</td>
                    </tr>
                    <tr>
                        <td>/sales.html</td>
                        <td>665</td>
                        <td>21.3%</td>
                        <td>$16.34</td>
                    </tr>
                    <tr>
                        <td>/blog.html</td>
                        <td>9516</td>
                        <td>89.3%</td>
                        <td>$1644.43</td>
                    </tr>
                    <tr>
                        <td>/404.html</td>
                        <td>23</td>
                        <td>34.3%</td>
                        <td>$23.52</td>
                    </tr>
                    <tr>
                        <td>/services.html</td>
                        <td>421</td>
                        <td>60.3%</td>
                        <td>$724.32</td>
                    </tr>
                    <tr>
                        <td>/blog/post.html</td>
                        <td>1233</td>
                        <td>93.2%</td>
                        <td>$126.34</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <h2>Striped Rows</h2>
            <div class="table-responsive">
                <table class="table table-hover table-striped tablesorter">
                    <thead>
                    <tr>
                        <th>Page <i class="fa fa-sort"></i></th>
                        <th>Visits <i class="fa fa-sort"></i></th>
                        <th>% New Visits <i class="fa fa-sort"></i></th>
                        <th>Revenue <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>/index.html</td>
                        <td>1265</td>
                        <td>32.3%</td>
                        <td>$321.33</td>
                    </tr>
                    <tr>
                        <td>/about.html</td>
                        <td>261</td>
                        <td>33.3%</td>
                        <td>$234.12</td>
                    </tr>
                    <tr>
                        <td>/sales.html</td>
                        <td>665</td>
                        <td>21.3%</td>
                        <td>$16.34</td>
                    </tr>
                    <tr>
                        <td>/blog.html</td>
                        <td>9516</td>
                        <td>89.3%</td>
                        <td>$1644.43</td>
                    </tr>
                    <tr>
                        <td>/404.html</td>
                        <td>23</td>
                        <td>34.3%</td>
                        <td>$23.52</td>
                    </tr>
                    <tr>
                        <td>/services.html</td>
                        <td>421</td>
                        <td>60.3%</td>
                        <td>$724.32</td>
                    </tr>
                    <tr>
                        <td>/blog/post.html</td>
                        <td>1233</td>
                        <td>93.2%</td>
                        <td>$126.34</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-6">
            <h2>Contextual Classes</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                    <tr>
                        <th>Page <i class="fa fa-sort"></i></th>
                        <th>Visits <i class="fa fa-sort"></i></th>
                        <th>% New Visits <i class="fa fa-sort"></i></th>
                        <th>Revenue <i class="fa fa-sort"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="active">
                        <td>/index.html</td>
                        <td>1265</td>
                        <td>32.3%</td>
                        <td>$321.33</td>
                    </tr>
                    <tr class="success">
                        <td>/about.html</td>
                        <td>261</td>
                        <td>33.3%</td>
                        <td>$234.12</td>
                    </tr>
                    <tr class="warning">
                        <td>/sales.html</td>
                        <td>665</td>
                        <td>21.3%</td>
                        <td>$16.34</td>
                    </tr>
                    <tr class="danger">
                        <td>/blog.html</td>
                        <td>9516</td>
                        <td>89.3%</td>
                        <td>$1644.43</td>
                    </tr>
                    <tr>
                        <td>/404.html</td>
                        <td>23</td>
                        <td>34.3%</td>
                        <td>$23.52</td>
                    </tr>
                    <tr>
                        <td>/services.html</td>
                        <td>421</td>
                        <td>60.3%</td>
                        <td>$724.32</td>
                    </tr>
                    <tr>
                        <td>/blog/post.html</td>
                        <td>1233</td>
                        <td>93.2%</td>
                        <td>$126.34</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <h2>Bootstrap Docs</h2>
            <p>For complete documentation, please visit <a target="_blank" href="http://getbootstrap.com/css/#tables">Bootstrap's Tables Documentation</a>.</p>
        </div>
    </div><!-- /.row -->








<!----------------------------------------------------------->
<?php
include_page_template('footer');

if(AUTO_LOGOUT){$session->logout(); echo "<h4>You have been automatically logged out for development</h4>";}
if(isset($database)) { $database->close_connection(); }
?>