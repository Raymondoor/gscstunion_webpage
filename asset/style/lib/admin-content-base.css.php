<style>
@import url("<?=STYLE_URL?>/template/formlabel.css");
#desc{
    padding: 0 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 800px);
    font-size:clamp(0.75rem, 1.75vw, 1rem);
}
@media(min-width: 900px){
    #newartwrap{
        display: grid;
        grid-template-columns: repeat(2, minmax(300px, 1fr));
    }
}
#prvdiv{
    width: clamp(280px, 90%, 900px);
    margin: 0 auto;
    min-height: 5rem;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
    overflow-wrap: break-word;
}
#newart{
    padding: 0.5rem 1rem;
    margin: 0 auto;
    width: clamp(280px, 90%, 900px);
    position: relative;
    .comboForm{
        display: flex;
        justify-content: space-between;
        align-items: end;
        .comboFormEl{
            width: 48%;
        }
    }
    @media only screen and (max-width:480px){
        .comboForm{
            display: block;
            .comboFormEl{
                width: 66%;
            }
        }
    }
}
</style>