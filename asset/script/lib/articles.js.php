<script src="<?=SCRIPT_URL?>/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/animejs@4.0.2/lib/anime.umd.min.js"></script>
<script>
const swiper = new Swiper('.swiper', {
    // Optional parameters
    loop: true,
    lazy: true,
    ally: {
        prevsliderMessage: '戻る'
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    autoplay:{
        delay: 8000
    },
    effect: "fade",
    slidesPerView: "auto",
    centeredSlides: true,
});
const { animate } = anime;
animate('.lart',{
    'opacity': 1,
    filter: 'blur(0px)',
    delay: anime.stagger(120),
    ease: 'inOutBack',
    duration: 480,
    frameRate: 120,
});
animate('#scroll',{
    y:'-1rem'
});
</script>