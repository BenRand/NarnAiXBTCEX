<?php
require_once('../control/init.php');
echo "hello";
$users = User::find_all();
// echo $users[];


foreach ($users as $user){
    echo "User: " . $user->username . '<br />';
    echo "pass: " . $user->password . '<br />';
    echo "Name: " . $user->full_name() . '<br />';
    echo "Hash: " . $user->password_hash . '<br />';
    echo "Salt: " . $user->salt . '<br />';
    echo "password_hash: "  . sha1($salt.$user->password) . '<br /><br />';
}


?>


<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','peter','abc123','my_db');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE id = '".$q."'";

$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Hometown'] . "</td>";
    echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>