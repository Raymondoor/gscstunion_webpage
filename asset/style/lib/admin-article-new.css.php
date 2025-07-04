<style>
@import url(<?=STYLE_URL?>/quill.snow.css);
@import url("<?=STYLE_URL?>/imageInput.css");
@import url("<?=STYLE_URL?>/template/formlabel.css");
@import url("<?=STYLE_URL?>/template/ql-render.css");
#imageInput{
    --height: clamp(6rem, 18vw, 10rem);
    width: calc(var(--height) * 1.5);
    height: var(--height);
}
#newart{
    position: relative;
}
#prvdiv{
    display: none;
    width: 99%;
    margin: 0 auto;
    font-family: var(--MaruFont);
}
#new-article-form{
    padding: 0.5rem 1rem;
    margin: 0 auto;
    width: clamp(280px, 90%, 900px);
    position: relative;
    .newTitle{
        font-size: clamp(1.25rem, 2.25vw, 1.5rem);
        font-weight: bold;
    }
    #multi-state{
        padding: 0.25rem 0.5rem;
    }
    #projectOption{
        padding: 0.25rem;
    }
    #categoryOption{
        padding: 0.25rem;
    }
    .comboForm{
        display: flex;
        justify-content: space-between;
        align-items: end;
        .comboFormEl{
            width: 48%;
        }
    }
    #newcat{
        position: relative;
    }
    #newcatresult{
        display: none;
        position: absolute;
        width: fit-content;
    }
    .optionField{
        cursor: pointer;
        background-color: #fefefe;
        margin: 0;
        z-index: 1;
        padding: 0.25rem;
        border-bottom: 1px solid #ccc;
    }
    .optionField:hover{
        background-color: #ddd;
    }
    @media only screen and (max-width:480px){
        .comboForm{
            display: block;
            .comboFormEl{
                width: 66%;
            }
        }
    }
    #quillWrapper{
        .ql-toolbar{
            border-radius: 0.25rem 0.25rem 0 0;
            min-height: 3.5rem;
            align-content: center;
            position: sticky;
            top: 0;
            z-index: 2;
            background-color: var(--BackTone);
        }
        @media(max-width: 680px){
            .ql-toolbar{
                top: 4rem;
            }
        }
        #editor{
            min-height: 12rem;
            border-radius: 0 0 0.25rem 0.25rem;
            margin-bottom: 1rem;
            background-color: #fff;
            img{
                max-width: 32.5%;
                max-height: 15rem;
                margin: 0.25rem 0.125rem;
            }
            p, h2, h3{
                margin: 0.25rem 0;
            }
        }
    }
}
</style>