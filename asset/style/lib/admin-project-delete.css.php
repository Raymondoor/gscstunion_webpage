<style>
@import url("<?=STYLE_URL?>/imageInput.css");
@import url("<?=STYLE_URL?>/template/formlabel.css");
#newpro{
    padding: 0 1rem;
    padding-bottom: 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 1000px);
}
#desc{
    padding: 0 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 800px);
    font-size:clamp(0.75rem, 1.75vw, 1rem);
}
#projectsList{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
    .pjContainer{
        padding: 1rem;
        a{
            display: inline-block;
            height: 100%;
            width: 100%;
            text-decoration: none;
            color: #fff;
            border-radius: 1rem;
            align-content: center;
            h3{
                margin: 0;
                padding: 1rem;
                text-align: center;
                text-shadow: 2px 2px 1px rgba(45, 45, 45, 0.9);
            }
        }
        a:hover{
            background-color:rgba(65, 65, 65, 0.2);
        }
    }
}
#overview{
    border: 2px solid #888;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    h2, h4{
        color: #fff;
        margin: clamp(0.75rem, 2vw, 1.5rem);
        text-shadow: 2px 2px 1px rgba(45, 45, 45, 0.9);
        transition: all 240ms;
    }
    h2{
        font-size: clamp(1.25rem, 7vw, 2.5rem);
        margin-bottom: clamp(0.5rem, 1.5vw, 0.875rem);
    }
    h4{
        font-size: clamp(1rem, 5vw, 1.5rem);
        margin-top: clamp(0.5rem, 1.5vw, 0.875rem);
    }
    hr{
        margin: 0 clamp(0.75rem, 2vw, 1.5rem);
        border-radius: 1rem;
    }
    p{
        color: #fff;
        margin: clamp(0.75rem, 2vw, 1.5rem);
        margin-bottom: 0;
        padding-bottom: clamp(0.75rem, 2vw, 1.5rem);
        font-size: clamp(0.75rem, 1.5vw, 1rem);
        text-shadow: 1px 1px 1px rgba(45, 45, 45, 0.9);
        transition: all 240ms;
    }
}
</style>