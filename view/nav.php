<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */
/**
 * Navigation system
 *
 * This is a description
 */
global $session;
global $user;

$coinbase = new Coinbase('9cf839fa926890230865b54bfe787f57cfdb49b6c3ad45eca775037ff7a5c206');
echo $balance = $coinbase->getBalance();

?>
<div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">

            <?php
            if ($session->is_logged_in()) {
                echo "Buy: $" . $coinbase->getBuyPrice('1') . " USD -- ";
                echo "Balance: " . $balance . " BTC";
            }else {
                echo "NarnAiX Home";
            }
            ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class='active'><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="trade.php"><i class="fa fa-bar-chart-o"></i> Trade</a></li>
                <li><a href="chart.php"><i class="fa fa-table"></i> Charts</a></li>
                <li><a href="data.php"><i class="fa fa-table"></i> Market Data</a></li>
                <li><a href="security.php"><i class="fa fa-edit"></i> Security</a></li>
                <li><a href="news.php"><i class="fa fa-font"></i> News Feed</a></li>
                <li><a href="settings.php"><i class="fa fa-wrench"></i> Settings</a></li>
                <li><a href="learn.php"><i class="fa fa-file"></i> Learn</a></li>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-user">
<?php
    if ($session->is_logged_in()){
        echo "
                <li class=\"dropdown messages-dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-envelope\"></i> Messages <span class=\"badge\">7</span> <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li class=\"dropdown-header\">7 New Messages</li>
                        <li class=\"message-preview\">
                            <a href=\"#\">
                                <span class=\"avatar\"><img src=\"http://placehold.it/50x50\"></span>
                                <span class=\"name\">John Smith:</span>
                                <span class=\"message\">Hey there, I wanted to ask you something...</span>
                                <span class=\"time\"><i class=\"fa fa-clock-o\"></i> 4:34 PM</span>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li class=\"message-preview\">
                            <a href=\"#\">
                                <span class=\"avatar\"><img src=\"http://placehold.it/50x50\"></span>
                                <span class=\"name\">John Smith:</span>
                                <span class=\"message\">Hey there, I wanted to ask you something...</span>
                                <span class=\"time\"><i class=\"fa fa-clock-o\"></i> 4:34 PM</span>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li class=\"message-preview\">
                            <a href=\"#\">
                                <span class=\"avatar\"><img src=\"http://placehold.it/50x50\"></span>
                                <span class=\"name\">John Smith:</span>
                                <span class=\"message\">Hey there, I wanted to ask you something...</span>
                                <span class=\"time\"><i class=\"fa fa-clock-o\"></i> 4:34 PM</span>
                            </a>
                        </li>
                        <li class=\"divider\"></li>
                        <li><a href=\"#\">View Inbox <span class=\"badge\">7</span></a></li>
                    </ul>
                </li>


                <li class=\"dropdown alerts-dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-bell\"></i> Alerts <span class=\"badge\">3</span> <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"#\">Default <span class=\"label label-default\">Default</span></a></li>
                        <li><a href=\"#\">Primary <span class=\"label label-primary\">Primary</span></a></li>
                        <li><a href=\"#\">Success <span class=\"label label-success\">Success</span></a></li>
                        <li><a href=\"#\">Info <span class=\"label label-info\">Info</span></a></li>
                        <li><a href=\"#\">Warning <span class=\"label label-warning\">Warning</span></a></li>
                        <li><a href=\"#\">Danger <span class=\"label label-danger\">Danger</span></a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"#\">View All</a></li>
                    </ul>
                </li>


                <li class=\"dropdown user-dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> John Smith <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"#\"><i class=\"fa fa-user\"></i> Profile</a></li>
                        <li><a href=\"#\"><i class=\"fa fa-envelope\"></i> Inbox <span class=\"badge\">7</span></a></li>
                        <li><a href=\"#\"><i class=\"fa fa-gear\"></i> Settings</a></li>
                        <li class=\"divider\"></li>
                        <li><a href=\"#\"><i class=\"fa fa-power-off\"></i> Log Out</a></li>
                    </ul>
                </li>";










    } else {
        echo "
          <li class=\"dropdown user-dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> LOGIN NOW <b class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li>
                        
                        
                            <div class=\"form-group\">

        <form action=\"login.php\" method=\"post\">
            <table>
                <tr>
                    <td><label>Username:</label></td>
                    <td>
                        <input class=\"form-control\" type=\"text\" placeholder=\"";
         if(htmlentities($username)) {echo htmlentities($username);} else { echo "you@email.com"; } ?>" name="username" maxlength="30" value="<?php echo htmlentities($username); 

        echo "\" />
                    </td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td>
                        <input class=\"form-control\" type=\"password\" placeholder=\"";
        if(htmlentities($password)) {echo htmlentities($password);} else { echo "password"; } ?>" name="password" maxlength="30" value="<?php echo htmlentities($password);
        

        
        echo " </td>
                </tr>
                <tr>
                    <td colspan=\"2\">

                    </td>
                </tr>
            </table>


    </div>";




        echo "                </li>
                        <li class=\"divider\"></li>
                        <li>
                           <input class=\"form-control\" type=\"submit\" placeholder=\"submit\" name=\"submit\" value=\"Login\" />
                             </form>
                        </li>

                    </ul>
                </li>
        ";



    }
?>




                
                
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>




