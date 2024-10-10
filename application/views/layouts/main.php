<!-- /*
* Template Name: Tour
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo/rose.png') ?>">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bd-wizard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Rosana Tour And Travel - Umroh - Haji - Tour</title>
    <style>
        body.detail-artikel .site-navigation {
            background-color: #6998AB;
            /* Atur warna latar belakang header sesuai dengan kebutuhan Anda */
            color: #fff;
            padding-top: 1%;
            padding-bottom: 1%;
            padding-right: 5%;
            padding-left: 5%;
            margin-bottom: 200px;
            border-radius: 10px;
            /* Atur warna teks header agar terlihat di atas latar belakang header */
        }
    </style>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="masukCenter" tabindex="-1" role="dialog" aria-labelledby="masukCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mx-2 my-2">
                    <h5 class="modal-title" id="masukLongTitle">Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form>
                                    <div class="form-group">
                                        <label for="masuk">Nomor HP / NIK</label>
                                        <input type="text" class="form-control" id="masuk" placeholder="">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <a href="<?php echo base_url('') ?>" class="logo m-0"><img style="height: 3.8rem;" src="<?php echo base_url('assets/images/logo/logoros.png') ?>" alt=""></a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                    <li class="active"><a href="<?php echo base_url('') ?>">Berandaadw</a></li>
                    <li class="has-children">
                        <a href="<?php echo base_url('paket/umroh/'); ?>">Umroh</a>
                        <ul class="dropdown">
                            <li><a href="<?php echo base_url('paket/umroh/'); ?>">Umroh Reguler</a></li>
                            <li><a href="elements.html">Tabungan Umroh</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('paket/haji/'); ?>">Haji</a></li>
                    <!-- <li class="has-children">
                        <a href="#">Haji</a>
                        <ul class="dropdown">
                            <li><a href="<?php echo base_url('paket/haji/'); ?>">Haji Eksklusif</a></li>
                        </ul>
                    </li> -->
                    <li><a href="<?php echo base_url('paket/wisatahalal/'); ?>">Wisata Halal</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#tentang-kami">Tentang Kami</a></li>
                    <li><a href="<?php echo base_url('kontak/'); ?>">Lokasi</a></li>
                    <!-- <li><a href="services.html">Services</a></li>
                    <li><a href="about.html">About</a></li>-->
                    <li><a data-toggle="modal" data-target="#masukCenter" class="btn btn-sm btn-outline-white text-white btn-md font-weight-bold mr-1" href="<?php echo base_url('masuk/'); ?>">Masuk</a></li>
                    <li><a class="btn btn-sm btn-light text-dark btn-md font-weight-bold" href="<?php echo base_url('daftar/'); ?>">Daftar</a></li>
                </ul>

                <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </nav>
    <?php
    if (isset($_view) && $_view)
        $this->load->view($_view);
    ?>

    <div class="site-footer">
        <div class="inner first">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="widget">
                            <h3 class="heading">Rosana Tour and Travel</h3>
                            <p>PT. Rosana Biro Perjalanan Wisata terus berinovasi dan berpacu meningkatkan pelayanan yang profesional dan kekeluargaan untuk dapat secara maksimal melayani dari hati.</p>
                        </div>
                        <div class="widget">
                            <ul class="list-unstyled social">
                                <!-- <li><a href="#"><span class="icon-twitter"></span></a></li> -->
                                <li><a href="https://www.instagram.com/rosanatourtravel/"><span class="icon-instagram"></span></a></li>
                                <li><a href="https://www.facebook.com/rosanatourtravel/"><span class="icon-facebook"></span></a></li>
                                <!-- <li><a href="#"><span class="icon-linkedin"></span></a></li> -->
                                <!-- <li><a href="#"><span class="icon-dribbble"></span></a></li>
                                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                                <li><a href="#"><span class="icon-apple"></span></a></li> -->
                                <li><a href="https://www.youtube.com/channel/UCmSxQUoXeZ3QV-VsiHUWtVA/videos"><span class="icon-youtube"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 pl-lg-5">
                        <div class="widget">
                            <h3 class="heading">Link Cepat</h3>
                            <ul class="links list-unstyled">
                                <li><a href="#">Umroh</a></li>
                                <li><a href="#">Haji</a></li>
                                <li><a href="#">Wisata Halal</a></li>
                                <li><a href="#">Galeri</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget">
                            <h3 class="heading">Kontak Kami</h3>
                            <ul class="list-unstyled quick-info links">
                                <li class="email"><a href="#">info@rosanatravel.com</a></li>
                                <li class="phone"><a href="#">+62 811 333 60600</a></li>
                                <li class="address"><a href="#">Jl. Dr. Setia Budi No. 20,
                                        Jalan Lingkar Selatan Kota Pasuruan,
                                        Jawa Timur, Indonesia</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="widget">
                            <h3 class="heading">Kebijakan Ketentuan</h3>
                            <ul class="links list-unstyled">
                                <li><a href="#">Syarat dan Ketentuan</a></li>
                                <li><a href="#">Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="inner dark">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-8 mb-3 mb-md-0 mx-auto">
                        <!-- <p>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash;
                            Designed with love by <a href="https://untree.co" class="link-highlight">Untree.co</a> 
                            License information: https://untree.co/license/ Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>-->
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="<?php echo base_url('assets/') ?>js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.animateNumber.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.fancybox.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/aos.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/moment.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/daterangepicker.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/typed.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.steps.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/bd-wizard.js"></script>
    <script>
        $(function() {
            var slides = $('.slides'),
                images = slides.find('img');

            images.each(function(i) {
                $(this).attr('data-id', i + 1);
            })

            var typed = new Typed('.typed-words', {
                strings: [" Haji.", " Umroh.", " Wisata."],
                typeSpeed: 80,
                backSpeed: 80,
                backDelay: 4000,
                startDelay: 1000,
                loop: true,
                showCursor: true,
                preStringTyped: (arrayPos, self) => {
                    arrayPos++;
                    console.log(arrayPos);
                    $('.slides img').removeClass('active');
                    $('.slides img[data-id="' + arrayPos + '"]').addClass('active');
                }

            });
        });

        // Ambil elemen radio kantor, radio marketing, dropdown form, dan elemen iframe
        var kantorRadio = document.getElementById("kantor");
        var dropdownForm = document.getElementById("branchDropdown");
        var branchSelect = document.getElementById("branchSelect");
        var maps = document.querySelectorAll(".map-iframe");

        // Tambahkan event listener untuk perubahan radio button kantor
        kantorRadio.addEventListener("change", function() {
            // Tampilkan dropdown form jika radio kantor dipilih, sembunyikan jika tidak
            dropdownForm.style.display = kantorRadio.checked ? "block" : "none";
            // Sembunyikan semua peta
            maps.forEach(function(map) {
                map.style.display = "none";
            });
        });

        // Tambahkan event listener untuk perubahan pilihan dropdown
        branchSelect.addEventListener("change", function() {
            // Tampilkan peta yang sesuai dengan pilihan dropdown
            maps.forEach(function(map) {
                map.style.display = (map.id === branchSelect.value + "Map") ? "block" : "none";
            });
        });

        function savetosession() {
            // Assuming jQuery is available
            $.ajax({
                url: "<?php echo site_url('Pemesanan/savetosession'); ?>",
                type: "POST",
                data: $('#registration-form').serialize(),
                success: function(response) {
                    // Handle the response from the controller
                    console.log(response);
                    // You can perform additional actions based on the response
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        }

        function add_pemesan() {
            // Assuming jQuery is available
            $.ajax({
                url: "<?php echo site_url('Pemesanan/add_pemesan'); ?>",
                type: "POST",
                data: $('#registration-form').serialize(),
                success: function(response) {
                    // Handle the response from the controller
                    console.log(response);
                    // You can perform additional actions based on the response
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        }

        function confirmation() {
            // Assuming jQuery is available
            $.ajax({
                url: "<?php echo site_url('Pemesanan/confirmation'); ?>",
                type: "POST",
                data: $('#registration-form').serialize(),
                success: function(response) {
                    // Handle the response from the controller
                    console.log(response);
                    // You can perform additional actions based on the response
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        }
    </script>

    <script src="<?php echo base_url('assets/') ?>js/custom.js"></script>
    <!-- Start of Qontak Webchat Script -->
    <script>
        const qchatInit = document.createElement('script');
        qchatInit.src = "https://webchat.qontak.com/qchatInitialize.js";
        const qchatWidget = document.createElement('script');
        qchatWidget.src = "https://webchat.qontak.com/js/app.js";
        document.head.prepend(qchatInit);
        document.head.prepend(qchatWidget);
        qchatInit.onload = function() {
            qchatInitialize({
                id: "0c5c6d3e-e8a6-4c58-be69-6f2d50535570",
                code: "kM3aTWbEZvOoVbcE0ucE4g"
            })
        };
        $('#masuk').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>
    <!-- End of Qontak Webchat Script -->
</body>

</html>