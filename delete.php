<!DOCTYPE html>
<html>
<head>
<title>Sample Demo</title>
</head>
<style>


input[type=text]
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

input[type=submit], input[type=text]
{
    border: 0;
    border-radius:5px;
    font-family: Sansation,Arial;
}

</style>
<body>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="degree">

 
 <input name="id" type="text" id="id"/>
<input name="Submit" type="submit" value="Delete" id="delete"/>
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "avkr160";
$dbname = "degreeschema";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$record = $_POST['id'];
$query = "DELETE FROM degree WHERE id = '".$record."'";
if(mysqli_query($conn, $query)){
echo "deleted";}
else{
echo "Error deleting record: " . mysqli_error($conn);}
}
?>

</body>
</html>


