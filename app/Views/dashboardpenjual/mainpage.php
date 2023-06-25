<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        .recommendation {
            margin-top: 70px; /* Tinggi untuk menyertakan navbar yang tetap terlihat */
        }

        .recommendation .product-container {
            display: flex;
            justify-content: space-between;
            max-width: 900px;
            margin: 0 auto;
        }

        .recommendation .product-container .product-card {
            flex: 0 0 18%;
            max-width: 18%;
            padding: 10px;
        }

        .recommendation .product-container .product-card img {
            width: 100%;
            height: auto;
        }

        #carouselExampleControls .carousel-inner img {
            height: calc(100vh - 200px); /* Tinggi banner carousel */
            object-fit: cover;
            padding-top: 20px;
            margin: auto;
        }
        
    </style>
</head>
<body>
    <form class="form-container" action="/dashboardpenjual" method="POST">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <div class="showcase-left">
                    <div class="carousel-item active" data-bs-interval="50000">
                        <img src="<?= base_url('assets/images/banner1.jpg') ?>" class="d-block w-100" alt="Banner 1">
                    </div>
                    <div class="carousel-item" data-bs-interval="50000">
                    <img src="<?= base_url('assets/images/banner2.jpg') ?>" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item" data-bs-interval="50000">
                    <img src="<?= base_url('assets/images/banner3.jpg') ?>" class="d-block w-100" alt="Banner 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="recommendation">
        <h2>Kumpulan Sayuran Dan Buah</h2>
            <div class="product-container">
                <div class="product-card">
                    <img src="<?= base_url('assets/images/product1.jpg') ?>" alt="Product 1">
                    <p>Sayur Sawi</p>
                </div>
                <div class="product-card">
                    <img src="<?= base_url('assets/images/product2.jpg') ?>" alt="Product 2">
                </div>
                <div class="product-card">
                    <img src="<?= base_url('assets/images/product3.jpg') ?>" alt="Product 3">
                </div>
                <div class="product-card">
                    <img src="<?= base_url('assets/images/product4.jpg') ?>" alt="Product 4">
                </div>
                <div class="product-card">
                    <img src="<?= base_url('assets/images/product5.jpg') ?>" alt="Product 5">
                </div>
                </div>
            </div>
        </div>
        <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="contact-left">
                        <h2>Hubungi Kami</h2>
                        <p>Whatsapp +62812721918</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="contact-right">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    
    </form>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan yang terakhir Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="https://kit.fontawesome.com/53b3156941.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Menginisialisasi carousel
            $("#carouselExampleControls").carousel();

            // Mengaktifkan fungsionalitas slide pada carousel
            $("#carouselExampleControls").on("slide.bs.carousel", function(e) {
                var active = $(e.target).find(".carousel-inner > .carousel-item.active");
                var from = active.index();
                var next = $(e.relatedTarget);
                var to = next.index();

                $(".carousel-indicators li").removeClass("active");
                $(".carousel-indicators li[data-slide-to='" + to + "']").addClass("active");
            });
        });
    </script>
    <script>
        window.sr = ScrollReveal();
        sr.reveal('.navbar',{
            duration:3000,
            origin:'bottom',
            distance:'30px'
        })
        sr.reveal('.carousel-inner',{
            duration:5000,
            delay:100,
            origin:'top',
            distance:'300px'
        })
        sr.reveal('.product-container',{
            duration:5000,
            delay:100,
            origin:'top',
            distance:'300px'
        })
        sr.reveal('.recommendation',{
            duration:5000,
            origin:'top'
        })
        sr.reveal('.sidebar',{
            duration:3000,
            origin:'right',
            distance:'30px'
        })
        sr.reveal('#contact',{
            duration:3000,
            origin:'left',
            distance:'30px'
        })
    </script>
</body>
</html>
