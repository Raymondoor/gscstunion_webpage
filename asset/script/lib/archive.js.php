<script src="<?=SCRIPT_URL?>/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper('.mainSwiper', {
    // Optional parameters
    loop: true,
    lazy: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 3200,
        disableOnInteraction: true,
        pauseOnMouseEnter: true
      },
});
</script>