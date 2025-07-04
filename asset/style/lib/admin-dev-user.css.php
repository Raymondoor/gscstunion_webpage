<style>
@import url("<?=STYLE_URL?>/imageInput.css");
@import url("<?=STYLE_URL?>/template/formlabel.css");
@import url("<?=STYLE_URL?>/mermaid.min.css");
#newuser{
    padding: 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 800px);
}
#desc{
    padding: 0 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 800px);
    font-size:clamp(0.75rem, 1.75vw, 1rem);
}
#usertable{
    width: 100%;
    max-width: 780px;
    margin: 0 auto;
    td{
        font-size:clamp(0.75rem, 1.75vw, 1rem);
    }
    .gridjs-th-content{
        /* font-size:clamp(0.75rem, 1.75vw, 1rem); */
        letter-spacing: 1px;
    }
    .gridjs-search-input{
        font-size:clamp(0.75rem, 1.75vw, 1rem);
    }
}
</style>