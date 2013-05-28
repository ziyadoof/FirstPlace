<?php
require('/model/mysql_connect.php');
// require('/model/category.php');
// require('/model/category_db.php');
// require('/model/product.php');
// require('/model/product_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

if ($action == 'add_product') {
    $firstname = $_POST['firstName_new'];
    $lastname = $_POST['lastName_new'];
    $phonenumber = $_POST['phoneNumber_new'];
    $address = $_POST['address_new'];
	$email_address = $_POST['email_new'];
    $classroom = $_POST['classRoom_new'];
    $username = $_POST['username_new'];
	$password = $_POST['password_new'];
    $roleID = $_POST['roleID_new'];

	echo $firstname;
    echo $lastname;
    echo $phonenumber;
    echo $address;
	echo $email_address;
    echo $classroom;
    echo $username;
	echo $password;
    echo $roleID;
	

    // Validate the inputs
    //if (empty($code) || empty($name) || empty($price)) {
    //    $error = "Invalid product data. Check all fields and try again.";
    //    include('../errors/error.php');
    //} else {
    //    $current_category = CategoryDB::getCategory($category_id);
    //    $product = new Product($current_category, $code, $name, $price);
    //    ProductDB::addProduct($product);

        // Display the Product List page for the current category
    //    header("Location: .?category_id=$category_id");
    //}
}
?>