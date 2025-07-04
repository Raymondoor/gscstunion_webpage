<script src="https://cdn.jsdelivr.net/npm/animejs@4.0.2/lib/anime.umd.min.js"></script>
<script>
const { animate } = anime;
animate(['#pjname','#pjeng', '#pjdesc'],{
    translateX: { to: '1rem' },
    opacity: {to:1},
    filter: 'blur(0px)',
    delay: anime.stagger(72),
    ease: 'inSine',
    duration: 240
});
animate('#thumb',{
    opacity: {to:1},
    delay: 120,
    'background-position': '50% 36%'
});
</script>