<script src="<?=SCRIPT_URL?>/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper('.subSwiper',{
    loop: true,
    slidesPerView: 2,
    breakpoints: {
        350: {
            slidesPerView:3
        },
        680: {
            slidesPerView: 2,
        },
        750: {
            slidesPerView: 3,
        },
        1000: {
            slidesPerView: 4,
        },
        1800: {
            slidesPerView: 5
        }
    },
    watchSlidesProgress: true,
});
const swiper2 = new Swiper('.mainSwiper', {
    // Optional parameters
    loop: true,
    lazy: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: swiper,
    },
    autoplay: {
        delay: 3200,
        disableOnInteraction: true,
        pauseOnMouseEnter: true
      },
});
</script>