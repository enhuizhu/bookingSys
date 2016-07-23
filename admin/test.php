<!doctype html>
<html>
<head>
   <meta charset="utf-8"/>
   <title>test</title>
</head>
<body>
<?php

$con = mysqli_connect("localhost","hjteng5_ginsen","ginsen2013","hjteng5_ginsen");
// Check connection
if (mysqli_connect_errno($con))
  {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
  }

$sql="select * from cms_turboshop_product";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
 //print_r($row);
}
//die();

include 'simplexlsx.class.php';

$xlsx = new SimpleXLSX('test.xlsx');
echo '<h1>$xlsx->rows()</h1>';
echo '<pre>';
print_r( $xlsx->rows() );
echo '</pre>';

/*echo '<h1>$xlsx->rowsEx()</h1>';
echo '<pre>';
print_r( $xlsx->rowsEx() );
echo '</pre>';
*/
?>
</body>
</html>