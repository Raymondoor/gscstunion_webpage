<style>
@import url(<?=STYLE_URL?>/quill.snow.css);
#quillWrapper{
    .ql-toolbar{
        border-radius: 0.25rem 0.25rem 0 0;
        min-height: 3.5rem;
        align-content: center;
        position: sticky;
        top: 0;
        z-index: 1;
        background-color: var(--BackTone);
    }
    @media(max-width: 680px){
        .ql-toolbar{
            top: 4rem;
        }
    }
    #editor{
        min-height: 20rem;
        border-radius: 0 0 0.25rem 0.25rem;
        margin-bottom: 1rem;
        img{
            max-width: 32.5%;
            max-height: 15rem;
            margin: 0.25rem 0.125rem;
        }
        p, h2, h3{
            margin: 0.25rem 0;
        }
    }
    #categoryOption{
        padding: 0.25rem;
    }
}
</style>