<script src="https://cdn.jsdelivr.net/npm/animejs@4.0.2/lib/anime.umd.min.js"></script>
<script src="<?=SCRIPT_URL?>/swiper-bundle.min.js"></script>
<script>
const { animate } = anime;
animate('#label',{
    duration: 1000,
    opacity: {to:1},
    filter: 'blur(0px)',
    ease: 'inSine',
    delay: 120
});
function popanime(el, pos){
    // Uses foreach to prevent all events happening at the same time, that is to maintain the whole point of using container:'body'
    el.forEach(function(el){
        animate(el,{
            opacity: {to:1},
            translateY: {to:pos},
            filter: 'blur(0px)',
            ease: 'linear',
            autoplay: anime.onScroll({
                container: 'body',
                enter: 'bottom-=0',
                leave: 'bottom-=40% top',
                sync: true,
            })
        });
    });
}
function articleAnime(){
    animate('.articleContainer',{
        opacity: {to:1},
        translateY: {to:'-2.5rem'},
        filter: 'blur(0px)',
        ease: 'inSine',
        delay: anime.stagger(160),
        autoplay: anime.onScroll({
            container: 'body',
            enter: 'bottom-=0',
            leave: 'bottom-=32% top',
            sync: true,
        })
    });
}
popanime(['#slogan', '#details'], '-2.5rem');
popanime(['#projectsList'], 0);
articleAnime();
const swiper = new Swiper('.swiper', {
    // Optional parameters
    loop: true,
    lazy: true,
    ally: {
        prevsliderMessage: '戻る'
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay:{
        delay: 5000,
        pauseOnMouseEnter: true
    },
    breakpoints:{
        200:{
          slidesPerView: 2,  
        },
        780: {
          slidesPerView: 2,
        },
        1024:{
          slidesPerView: 3,
        },
        1540:{
          slidesPerView: 4,
        },
        2048:{
          slidesPerView: 5,
        },
    },
});
</script>