<style>
@import url("<?=STYLE_URL?>/imageInput.css");
@import url("<?=STYLE_URL?>/template/formlabel.css");
#editpro{
    padding: 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 1000px);
    hr{
        margin: 1rem 0;
    }
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
</style>