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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-+2GSJru4U1o/Gs+HDENiYs3b9PDv7ciCS9Vqh88+QhMAsCMNenq2BQAZ0Mv4KR1N0gH5ENpTE8f1ydQpAq5KyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>E-Calendar Rosana Travel</title>

</head>

<body style="background-color: #1A374D;">



    <?php
    if (isset($_view) && $_view)
        $this->load->view($_view);
    ?>


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
        })
    </script>

    <script src="<?php echo base_url('assets/') ?>js/custom.js"></script>

</body>

</html>