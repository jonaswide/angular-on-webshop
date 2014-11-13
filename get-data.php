<?php 
/////////////////////////////////////////////////////////////////
// get-data.php bruger SQL til at connecte til vores database, //
// og hiver dataen ud derfra og omformaterer det til JSON,     //
// som vi så kan bruge i Angular                               //
/////////////////////////////////////////////////////////////////

//localhost
//$con = mysqli_connect("localhost","root","","stickers");

//cpanel
$con = mysqli_connect("db23.meebox.net","jonaswid","SWATfire43!","jonaswid_passion");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($con, 'utf8');


	$result = mysqli_query($con, "SELECT * FROM products
		INNER JOIN category ON products.category_id = category.category_id
		/* her sorterer vi arrayet efter vores ID, så vi senere kan prioritere i rækkefølgen */
		ORDER BY product_id ASC");


$products = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

	$products[] = $row;


}
mysqli_close($con);

header ("content-type:text/plain");
echo json_encode($products, JSON_NUMERIC_CHECK);

?>
