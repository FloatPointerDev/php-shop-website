<div class="product-row-desktop">
    <img src="images/<?php echo $filename; ?>" alt="<?php echo $productName; ?>">

    <div class="product-info">
        <h2 class="product_name"><?php echo $productName; ?></h2>

        <p class="stock">Stock: <?php echo $stock; ?></p>

        <p class="price">Price: <?php echo $price; ?></p>

        <button onclick="GoToPurchase(<?php echo $productId; ?>);">Purchase</button>
    </div>
</div>