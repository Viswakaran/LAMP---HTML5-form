<!DOCTYPE html>
<html>
<head>
<title>Sample Demo</title>
</head>
<style>


input[type=text], input[type=url]
{
    background-color: #eeeeee;
    border:solid 1px #BFBDBD;
    color: #000000;
    box-shadow: 2px 2px 0 #828181 inset
	 width: 100%;
    padding: 12px 20px;
    margin: 0;
	display:block;
    box-sizing: border-box;
}
input[type=submit]
{
    background-color: #1E1E1E;
    color: #ffffff;
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    text-transform:uppercase;
    box-shadow:-1px 2px #6E6B6A inset;
}

input[type=submit], input[type=text], input[type=url]
{
    border: 0;
    border-radius:5px;
    font-family: Sansation,Arial;
}
table {
  background-color: #CDCDCD;
  font-family: arial;
  margin: 10px 0pt 15px;
  font-size: 8pt;
  width: 100%;
  text-align: left;
}

table thead tr th {
  background-color: #E6EEEE;
  border: 1px solid #FFF;
  font-size: 8pt;
  padding: 10px;
}

table tbody tr td {
  background-color: #FFF;
  color: #3D3D3D;
  vertical-align: top;
  padding: 10px;
}
</style>
<body>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="degree">
 <fieldset>
  <legend>List of Degree Details:</legend>
  RecordId: <input type="text" name="recordId"><br>
  bp: <input type="text" name="bp"><br>
  dp: <input type="text" name="dp"><br>
  id: <input type="text" name="id"><br>
  letter: <input type="text" name="letter"><br>
  link: <input type="url" name="link"><br>
  mp: <input type="text" name="mp"><br>
  name: <input type="text" name="name1"><br>
  school: <input type="text" name="school"><br>
 </fieldset>
 <input type="submit">
 
</form>

<?php



if($_SERVER["REQUEST_METHOD"] == "POST") {

$recordId = $_POST['recordId'];	
$bp = $_POST['bp'];	
$dp = $_POST['dp'];	
$id = $_POST['id'];	
$letter = $_POST["letter"];
$link = $_POST['link'];	
$mp = $_POST['mp'];	
$name = $_POST['name1'];	
$school = $_POST['school'];	

$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "avkr160";
$dbname = "degreeschema";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if(! $conn ) {
die('Could not connect: ' . mysqli_error());
}

// Check connection

$sql = "INSERT INTO degree SET recordId = '$recordId', bp = '$bp', dp = '$dp', id = '$id', letter = '$letter', link = '$link', mp = '$mp', name = '$name', school = '$school'";
if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }

}
	
echo "<h2>List of Records</h2>";

$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "avkr160";
$dbname = "degreeschema";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
$sql = 'SELECT * FROM degree';
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {

echo '
<table>
  <tr>
    <th><strong>bp: </strong></th>
    <th><strong>dp: </strong></th>
	<th><strong>id: </strong></th>
    <th><strong>letter: </strong></th>
	<th><strong>link: </strong></th>
    <th><strong>mp: </strong></th>
	<th><strong>name: </strong></th>
    <th><strong>school: </strong></th>
	<th><strong>Date created: </strong></th>
  </tr>
  <tr>
    <td>',$row["bp"],'</td>
	<td>',$row["dp"],'</td>
	<td>',$row["id"],'</td>
	<td>',$row["letter"],'</td>
	<td>',$row["link"],'</td>
	<td>',$row["mp"],'</td>
	<td>',$row["name"],'</td>
	<td>',$row["school"],'</td>
	<td>',$row["date"],'</td>
    
  </tr>
  
</table>';
 //echo "<strong>bp: </strong>" . $row["bp"]. " - <strong> dp: </strong> " . $row["dp"]. " - <strong> id: </strong> " . $row["id"]. " - <strong> letter: </strong>" . $row["letter"]. " - <strong> link: </strong>" . $row["link"]. " - <strong> mp: </strong>" . $row["mp"]. " - <strong> name: </strong>" . $row["name"]. " - <strong> school: </strong>" . $row["school"].  " - <strong> Date Created: </strong>" . $row["date"]."<br>";

}
} else {
echo "0 results";
}


?>

</body>
</html>


