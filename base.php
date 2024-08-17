<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JD Builders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/about.css" rel="stylesheet">
    <link href="css/services.css" rel="stylesheet">
    <link href="css/plans.css" rel="stylesheet">
    <link href="css/contact.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <?php include 'components/header.php'; ?>
    <?php include $page; ?>
    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 200,
            delay: 0,
            duration: 1000,
        });

        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('scroll', function() {
                var header = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        });

        // Function to animate the counting
        function animateCount(element, start, end, duration) {
            let startTime = null;

            function animation(currentTime) {
                if (startTime === null) startTime = currentTime;
                const progress = currentTime - startTime;
                const rate = Math.min(progress / duration, 1);
                const currentNumber = Math.floor(rate * (end - start) + start);
                element.textContent = currentNumber;
                if (progress < duration) {
                    requestAnimationFrame(animation);
                }
            }

            requestAnimationFrame(animation);
        }

        // Execute the animation when the document is fully loaded
        document.addEventListener('DOMContentLoaded', () => {
            const projectsCount = document.getElementById('projects-count');
            const employeesCount = document.getElementById('employees-count');
            const successCount = document.getElementById('success-percentage');

            animateCount(projectsCount, 0, 4, 3000); // 0 to 4 in 0.3 seconds
            animateCount(employeesCount, 0, 21, 3000); // 0 to 21 in 0.3 seconds
            animateCount(successCount, 0, 99, 3000); // 0 to 450 in 0.3 seconds
        });

        // var testimonialCarousel = document.getElementById('testimonialCarousel');
        //     var carousel = new bootstrap.Carousel(testimonialCarousel, {
        //         interval: 5000, // Slide every 5 seconds
        //         wrap: true
        //     });

        // Function to select the page nav link
        document.addEventListener('DOMContentLoaded', function() {
            var currentUrl = window.location.pathname;
            var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            var currentPage = currentUrl.slice(currentUrl.lastIndexOf("/") + 1)
            navLinks.forEach(function(link) {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper initialization -->
    <script>
        function initializeSwiper() {
            return new Swiper('.testimony-swiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 3, // 3 slides on desktop
                    },
                    0: {
                        slidesPerView: 1, // 1 slide on mobile
                    }
                }
            });
        }

        function initializeGallarySwiper() {
            return new Swiper('.gallery-swiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 6, // 3 slides on desktop
                    },
                    0: {
                        slidesPerView: 3, // 1 slide on mobile
                    }
                }
            });
        }

        // Initialize Swipers for different sections
        initializeGallarySwiper(); // For the gallery swiper
        initializeSwiper(); // For another section swiper
    </script>




</body>

</html>