<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Calendar Flip</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f3f3f3;
            /* perspective: 1000px; */
            /* Tetap gunakan perspektif */
            overflow: hidden;
            /* Mencegah meluap */
        }

        .month {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-origin: top center;
            /* Tetap konsisten dengan animasi rotasi */
            backface-visibility: hidden;
            transition: transform 0.8s ease-in-out;
        }

        .month img {
            width: 100%;
            height: 100%;
            object-fit: fill;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .month.hidden {
            transform: rotateX(-90deg);
            /* Tetap sesuai arah animasi */
        }

        .month.previous {
            transform: rotateX(90deg);
        }

        .month.next {
            transform: rotateX(0deg);
        }

        /* Media query untuk layar kecil */
        @media (max-width: 600px) {
            .calendar {
                width: 95%;
                /* Lebar lebih besar */
            }
        }

        /* Media query untuk layar sangat kecil */
        @media (max-width: 360px) {
            .calendar {
                width: 100%;
                /* Ambil seluruh lebar layar */
                max-height: 80vh;
                /* Pastikan kalender tidak melampaui tinggi layar */
            }
        }

        .calendar-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            perspective: 1000px;
            /* Pastikan perspektif ada di container ini */
        }

        .calendar {
            position: relative;
            width: 100%;
            max-width: 450px;
            aspect-ratio: 2 / 3;
            min-width: 390px;
            min-height: 450px;
            transform-style: preserve-3d;
            transition: transform 0.8s ease-in-out;
        }

        .month {
            transition: transform 0.8s ease-in-out;
            backface-visibility: hidden;
        }

        .controls {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 10px;
        }

        .controls button {
            flex: 1;
            max-width: 120px;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .controls button:hover {
            background-color: #0056b3;
        }

        .social-media {
            margin-top: 20px;
            text-align: center;
        }

        .social-media a {
            margin: 0 10px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .social-media a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="calendar-container">
        <div class="calendar" id="calendar">
            <div class="month" data-month="january-february">
                <img src="<?php echo base_url() ?>/assets/images/ecalendar/2025/1.jpg" alt="january-february">
            </div>
            <div class="month hidden" data-month="march-april">
                <img src="<?php echo base_url() ?>/assets/images/ecalendar/2025/2.jpg" alt="march-april">
            </div>
            <div class="month hidden" data-month="may-june">
                <img src="<?php echo base_url() ?>/assets/images/ecalendar/2025/3.jpg" alt="may-june">
            </div>
            <div class="month hidden" data-month="july-august">
                <img src="<?php echo base_url() ?>/assets/images/ecalendar/2025/4.jpg" alt="july-august">
            </div>
            <div class="month hidden" data-month="september-october">
                <img src="<?php echo base_url() ?>/assets/images/ecalendar/2025/5.jpg" alt="september-october">
            </div>
            <div class="month hidden" data-month="november-december">
                <img src="<?php echo base_url() ?>/assets/images/ecalendar/2025/6.jpg" alt="June">
            </div>
            <!-- Tambahkan bulan lainnya hingga Desember -->
        </div>
        <div class="site-footer" style="background-color: #f3f3f3; ">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="custom-block">
                            <ul class="list-unstyled social-icons dark">
                                <!-- Tombol Kiri untuk halaman sebelumnya -->
                                <li><a href="javascript:void(0)" id="prevBtn"><span class="icon-backward"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col text-center">
                        <a href="<?php echo base_url('') ?>" class="logo m-0">
                            <img style="height: 2.8rem;" src="<?php echo base_url('assets/images/logo/logoros.png') ?>" alt="">
                        </a>
                    </div>
                    <div class="col text-center">
                        <div class="custom-block">
                            <ul class="list-unstyled social-icons dark">
                                <!-- Tombol Kanan untuk halaman berikutnya -->
                                <li><a href="javascript:void(0)" id="nextBtn"><span class="icon-forward"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row wrapper-social">
                    <div class="col flex flex-row items-center justify-center cursor-pointer w-text-long text-center">
                        <a href="https://www.instagram.com/rosanatourtravel/">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#303030" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                            </svg>
                        </a>
                    </div>
                    <div class="col flex flex-row items-center justify-center cursor-pointer w-text-long text-center">
                        <a href="https://www.youtube.com/channel/UCmSxQUoXeZ3QV-VsiHUWtVA/videos">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#303030" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                            </svg>
                        </a>
                    </div>
                    <div class="col flex flex-row items-center justify-center cursor-pointer w-text-long text-center">
                        <a href="https://www.facebook.com/rosanatourtravel/">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#303030" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
                            </svg>
                        </a>
                    </div>
                    <div class="col flex flex-row items-center justify-center cursor-pointer w-text-long text-center">
                        <a href="https://www.facebook.com/rosanatourtravel/">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#303030" d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="row wrapper-social">
                    <div class="col flex flex-row items-center justify-center cursor-pointer w-text-long text-center">
                        <a href="<?php echo base_url() ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#303030" d="M51.7 295.1l31.7 6.3c7.9 1.6 16-.9 21.7-6.6l15.4-15.4c11.6-11.6 31.1-8.4 38.4 6.2l9.3 18.5c4.8 9.6 14.6 15.7 25.4 15.7c15.2 0 26.1-14.6 21.7-29.2l-6-19.9c-4.6-15.4 6.9-30.9 23-30.9h2.3c13.4 0 25.9-6.7 33.3-17.8l10.7-16.1c5.6-8.5 5.3-19.6-.8-27.7l-16.1-21.5c-10.3-13.7-3.3-33.5 13.4-37.7l17-4.3c7.5-1.9 13.6-7.2 16.5-14.4l16.4-40.9C303.4 52.1 280.2 48 256 48C141.1 48 48 141.1 48 256c0 13.4 1.3 26.5 3.7 39.1zm407.7 4.6c-3-.3-6-.1-9 .8l-15.8 4.4c-6.7 1.9-13.8-.9-17.5-6.7l-2-3.1c-6-9.4-16.4-15.1-27.6-15.1s-21.6 5.7-27.6 15.1l-6.1 9.5c-1.4 2.2-3.4 4.1-5.7 5.3L312 330.1c-18.1 10.1-25.5 32.4-17 51.3l5.5 12.4c8.6 19.2 30.7 28.5 50.5 21.1l2.6-1c10-3.7 21.3-2.2 29.9 4.1l1.5 1.1c37.2-29.5 64.1-71.4 74.4-119.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm144.5 92.1c-2.1 8.6 3.1 17.3 11.6 19.4l32 8c8.6 2.1 17.3-3.1 19.4-11.6s-3.1-17.3-11.6-19.4l-32-8c-8.6-2.1-17.3 3.1-19.4 11.6zm92-20c-2.1 8.6 3.1 17.3 11.6 19.4s17.3-3.1 19.4-11.6l8-32c2.1-8.6-3.1-17.3-11.6-19.4s-17.3 3.1-19.4 11.6l-8 32zM343.2 113.7c-7.9-4-17.5-.7-21.5 7.2l-16 32c-4 7.9-.7 17.5 7.2 21.5s17.5 .7 21.5-7.2l16-32c4-7.9 .7-17.5-7.2-21.5z" />
                            </svg>
                            <p class="text-dark" style="font-size: small;">www.rosanatravel.com</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const calendar = document.getElementById('calendar');
        const months = document.querySelectorAll('.month');
        let currentIndex = 0;

        let startY = 0;
        let endY = 0;

        function updateVisibility() {
            months.forEach((month, index) => {
                if (index === currentIndex) {
                    month.classList.remove('hidden', 'previous');
                    month.classList.add('next');
                } else if (index < currentIndex) {
                    month.classList.remove('hidden', 'next');
                    month.classList.add('previous');
                } else {
                    month.classList.remove('next', 'previous');
                    month.classList.add('hidden');
                }
            });
        }

        calendar.addEventListener('touchstart', (event) => {
            startY = event.touches[0].clientY;
        });

        calendar.addEventListener('touchend', (event) => {
            endY = event.changedTouches[0].clientY;
            const isNext = startY > endY; // Geser ke atas untuk halaman berikutnya, ke bawah untuk sebelumnya

            if (isNext && currentIndex < months.length - 1) {
                currentIndex++;
            } else if (!isNext && currentIndex > 0) {
                currentIndex--;
            }
            updateVisibility();
        });

        // Event listener untuk tombol kiri (Prev)
        document.getElementById('prevBtn').addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--; // Pindah ke halaman sebelumnya
                updateVisibility();
            }
        });

        // Event listener untuk tombol kanan (Next)
        document.getElementById('nextBtn').addEventListener('click', function() {
            if (currentIndex < months.length - 1) {
                currentIndex++; // Pindah ke halaman berikutnya
                updateVisibility();
            }
        });

        // Inisialisasi tampilan awal
        updateVisibility();
    </script>
</body>

</html>