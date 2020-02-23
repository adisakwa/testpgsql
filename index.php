<?php
$dsn = "pgsql:"
    . "host=ec2-52-200-119-0.compute-1.amazonaws.com;"
    . "dbname=d5tcp5utb7os37;"
    . "user=rxacpwhxykxmti;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=e95786afc8c5344a92d4de562e05d28c40dcc9af7080f08b70bd9422236d49a6";

$db = new PDO($dsn);
?>
<html>
 <head>
  <title>Employees</title>
 </head>
 <body>
  <table>
   <thead>
    <tr>
     <th>Employee ID</th>
     <th>Last Name</th>
     <th>First Name</th>
     <th>Title</th>
    </tr>
   </thead>
   <tbody>
<?php
$query = "SELECT employee_id, last_name, first_name, title "
    . "FROM employees ORDER BY last_name ASC, first_name ASC";
$result = $db->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row["employee_id"] . "</td>";
    echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
    echo "</tr>";
}
$result->closeCursor();
?>
   </tbody>
  </table>
 </body>
</html>
