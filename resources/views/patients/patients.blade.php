<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
    <form action="/patient" method="POST">
        @csrf
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="surname" placeholder="surname">
        <input type="number" name="taj" placeholder="TAJ">
        <input type="date" name="birthdate" placeholder="birthdate">
        <button type="submit">Submit</button>
    </form>

    <form type="get" action="{{url('/patient/search') }}">
        <input name="query" type="search" placeholder="Search Patient by ID">
    </form>
    <br>
<table>
<tr>
<th>Id</th>
<th>firstname</th>
<th>surname</th>
<th>taj</th>
<th>birthdate</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "password", "fogaszat");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, firstname, surname, taj, birthdate  FROM patient";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"] . "</td><td>". $row["surname"]. "</td><td>". $row["taj"]. "</td><td>". $row["birthdate"]. "<td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>

