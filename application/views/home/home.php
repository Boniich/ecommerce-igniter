<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<body>
    <div class="container">
        <div class="text-center my-5">
            <h1>Bienvenido a Ecommerce Igniter 🔥</h1>
        </div>

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/image-profile.png" class="d-block w-100" height="300" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/image-profile.png" class="d-block w-100" height="300" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/image-profile.png" class="d-block w-100" height="300" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- end of slide -->
        <div class="text-center my-5">
            <h2>Algunos de nuestros productos</h2>
        </div>
        <div class="d-flex gap-5">
            <?php foreach ($products as $product) : ?>
                <div class="card" style="width: 18rem;">
                    <?php if ($product['image'] == NULL || $product['image'] == '') {
                        $image = './assets/not-image.png';
                    } else {
                        $image = './uploads/' . $product['image'];
                    } ?>
                    <img src="<?php echo base_url($image); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                        <p>$<?php echo $product['price'] ?></p>
                        <a href="<?php echo base_url("product/{$product['id']}"); ?>" class="btn btn-primary">Ver producto</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- end of products -->
        <div class="text-center my-5">
            <h3>Las mejores marcas para vos</h3>
        </div>

        <div class="d-flex gap-5">
            <div class="card border-info mb-3" style="max-width: 18rem;">
                <div class="">
                    <img src="./assets/intel-2.jpg" class="card-img-top" height="150" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Intel</h5>
                </div>
            </div>

            <div class="card border-info mb-3" style="max-width: 18rem;">
                <div class="">
                    <img src="./assets/intel-2.jpg" class="card-img-top" height="150" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">AMD</h5>
                </div>
            </div>
        </div>

</body>

</html>