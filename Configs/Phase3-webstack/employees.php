<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost" ;
$db   = "companydb" ;
$user = "webuser" ;
$pass = "Tamuna1234.!" ;

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
   die("connection failed: " . $conn->connect_error . "\n");
}

$sql = "SELECT id, name, department FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
     <title>Employees - HQ Corporation</title>
</head>
<body>
     <h1>Employees</h1>
     <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
            </tr>
            <?php
            if ($result->num_row > 0) {
               while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td" . htmlspecialchars($raw["id"]) . "</td>";
                    echo "<td" . htmlspecialchars($raw["name"]) . "</td>";
                    echo "<td" . htmlspecialchars($raw["department"]) . "</td>";
	            echo "</tr>";
  	       }
           } else {
               echo "<tr><td colspan='3'>No employees found </td></tr>";
           }
           $conn->close();
           ?>
        </table>
</body>
</html>
