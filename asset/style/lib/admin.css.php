<style>
#message{
    padding: 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 1000px);
    p{
        font-size: clamp(0.75rem, 1.5vw, 1rem);
    }
}
#usefullinks{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
    .ulink{
        background-color:rgb(48, 77, 59);
    }
    a{
        display: block;
        font-size:clamp(0.875rem, 1.75vw, 1rem);
        color: #fff;
        text-decoration: none;
        padding: 1rem;
        text-align: center;
    }
    .ulink:hover{
        background-color:rgb(34, 58, 43);
        font-weight: bold;
    }
}
</style>