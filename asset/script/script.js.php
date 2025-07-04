<script>
function expandHeader(){
    let nav = document.getElementById('navHeader');
    if(nav.style.display === 'block'){
        requestAnimationFrame(() =>{
            nav.style.opacity = '0';
        });
        nav.style.display = 'none';
    }else{
        nav.style.display = 'block';
        requestAnimationFrame(() =>{
            nav.style.opacity = '1';
            nav.style.zIndex = '2';
        });
    }
}
window.onload = function() {
    document.body.classList.remove('loading');
    document.body.classList.add('loaded');
};

</script>