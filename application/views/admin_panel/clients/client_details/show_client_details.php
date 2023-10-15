<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <?php foreach ($client as $item) : ?>
            <div class="col-sm-4">
                <?php if ($item['image'] == NULL || $item['image'] == '') {
                    $image = './assets/image-profile.png';
                } else {
                    $image = './uploads/' . $item['image'];
                } ?>
                <img src="<?php echo base_url($image); ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-sm">
                <ul>
                    <li><b>Nombre completo:</b> <?php echo $item['full_name'] ?></li>
                    <li><b>Email:</b> <?php echo $item['email'] ?></li>
                    <li><b>DNI:</b> <?php echo $item['dni'] ?></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</body>

</html>