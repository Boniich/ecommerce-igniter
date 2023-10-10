<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <?php foreach ($products as $product) : ?>
        <div class="col mb-5">
            <div class="card" style="width: 18rem;">
                <?php if ($product['image'] == NULL || $product['image'] == '') {
                    $image = './assets/not-image.png';
                } else {
                    $image = './uploads/' . $product['image'];
                } ?>
                <img src="<?php echo base_url($image); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p class="card-text">$ <?php echo $product['price']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
</body>

</html>