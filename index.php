<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$cat_id = 2;

// Get the products
$product = get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';

// Delete the product and display an appropriate messge
$deleted_product_id = get_product_by_name($product_name)[0][0];

if ($deleted_product_id == NULL || $deleted_product_id == FALSE) {
    $delete_message = "No rows were deleted.";
} else {
    delete_product($deleted_product_id);
    $delete_message = "Fender Telecaster product was deleted successfully. Deleted product ID: ";
}

/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'tele';
$name = 'Fender Telecaster';
$description = 'NA';
$price = '949.99';

// Insert the data
$discount_percent = 42.00;
$inserted_product_id = add_product($category_id, $code, $name, $description, $price, $discount_percent);

// Display an appropriate message

if ($inserted_product_id == NULL || $inserted_product_id == FALSE) {
    $insert_message = "No rows were inserted. The code you used might already be taken. Check Database Error message for more information.";
} else {
    $insert_message = "Fender Telecaster product was inserted successfully. Inserted product ID: ";
}

include 'home.php';
?>