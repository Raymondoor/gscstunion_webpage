<style>
#foot-nav{
    padding-bottom: 1rem;
    min-height: 5rem;
    background-image: url("<?=IMAGE_URL?>/main/chapel-mono.JPG");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    font-family: var(--BaseFont);
    color: white;
    display: flex;
    flex-wrap: wrap;
    ul{
        padding: 1rem 0.5rem;
        margin: 0 1rem;
        min-width: 8rem;
        width: calc(48% - 3rem);
		line-height: 1.375;
        li{
            list-style: inside;
            a{
                color: #fff;
                text-decoration: underline;
                font-size: clamp(0.75rem, 2vw, 1rem);
                transition: all 120ms;
            }
            a:hover{
                color: var(--SubColour);
            }
        }
    }
}
#varaety{
    --size: 240px;
    width: var(--size);
    height: calc(var(--size) * 0.8);
    bottom: 0;
    background-image: url("<?=IMAGE_URL?>/main/varaety.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
</style>