<script src="https://cdn.jsdelivr.net/npm/animejs@4.0.2/lib/anime.umd.min.js"></script>
<script>
const { animate } = anime;
animate('.post',{
    'scale': 10,
    delay: anime.stagger(90),
    ease: 'inOutBack',
    duration: 480,
    frameRate: 120,
});
</script>