<?php include 'view/header.php'; ?>
<main>
    <h1>Selected Product List</h1>
    <ul>
    <?php foreach ($products as $product) : ?>
        <li> <?php echo $product['productName']; ?></li>
    <?php endforeach; ?>
    </ul>

    <h1>Delete Message</h1>
    <p> <?php echo $delete_message,$deleted_product_id; ?></p>

    <h1>Insert Message</h1>
    <p> <?php echo $insert_message,$inserted_product_id; ?></p>
</main><!-- end content -->
<?php include 'view/footer.php'; ?>