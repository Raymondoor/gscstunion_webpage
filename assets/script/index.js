function dispNav(){
    let disp = window.innerWidth <= 680 ? 'block' : 'flex';
    const menuButton = document.getElementById('hb-menu');
    const nav = document.getElementById('hb-nav');
    nav.style.display = 'none';
    menuButton.addEventListener('click', function(e){
        nav.style.display = nav.style.display === disp ? 'none' : disp;
        e.stopPropagation();
    });
    document.addEventListener('click', function(e) {
        if (!menuButton.contains(e.target) && !nav.contains(e.target)){
            nav.style.display = 'none';
        }
    });
    window.addEventListener('resize', function(){
        if(nav.style.display !== 'none'){
            disp = window.innerWidth <= 680 ? 'block' : 'flex';
            nav.style.display = disp;
        }else{
            disp = window.innerWidth <= 680 ? 'block' : 'flex';
        }
    })
};
document.addEventListener('DOMContentLoaded', function(){
    dispNav();
});