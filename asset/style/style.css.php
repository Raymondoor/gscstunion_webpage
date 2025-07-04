<style>
    @import url('<?=STYLE_URL?>/font/font.css');
    @property --MainColour{
        syntax: "<color>";
        inherits: false;
        initial-value: #479e88;
    }
    @property --SubColour{
        syntax: "<color>";
        inherits: false;
        initial-value: #65ddbf;
    }
    @property --SubColour2{
        syntax: "<color>";
        inherits: false;
        initial-value: #306b5c;
    }
    @property --OrgColour{
        syntax: "<color>";
        inherits: false;
        initial-value: #01a402;
    }
    @property --BackTone{
        syntax: "<color>";
        inherits: false;
        initial-value: hsl(0, 0%, 95%);
    }
    :root{
        --MaruFont: "Zen Maru", sans-serif;
        --KakuFont: "Zen Kaku", sans-serif;
    }
    html{
        background-color: var(--BackTone);
        font-family: var(--MaruFont);
    }
    body.loading main, body.loading, body.loading nav, body.loading footer{
        opacity: 0;
        pointer-events: none;
        user-select: none;
        transition: opacity 0.3s ease;
    }
    body.loaded main, body.loaded, body.loaded nav, body.loaded footer{
        opacity: 1;
        pointer-events: auto;
        user-select: auto;
        transition: opacity 0.3s ease;
    }
    body{
        font-family: var(--MaruFont);
        main{
            background-color:var(--BackTone);
            hr{
                margin: 0;
                height: 2.5px;
                background: linear-gradient(to right, var(--MainColour), var(--SubColour), var(--MainColour));
                background-color: #599;
                border: none;
            }
        }
    }
    @media(min-width: 680px){
        body{
            width: 100%;
            height: 100dvh;
            display: block;
            position: relative;
            header{
                position: fixed;
                top: 0;
                left: 0;
                width: calc(150px - 1rem);
                height: calc(100% - 1rem);
                z-index: 99;
            }
            main{
                /* overflow: visible; */
                min-height: calc(100dvh - 2rem);
                width: calc(100% - 150px);
                margin-left: 150px;
                padding-bottom: 2rem;
            }
            footer{
                position: fixed;
                bottom: 0;
                left: 0;
                width: calc(100% - 2rem);
                min-height: 2rem;
                z-index: 100;
            }
        }
    }
    @media(max-width: 680px){
        body{
            display: block;
            width: 100%;
            header{
                position: sticky;
                top: 0;
                left: 0;
                z-index: 100;
                height: calc(4rem - 16px);
            }
            main{
                overflow: visible;
                min-height: calc(100dvh - 4rem - 2rem);
            }
            footer{
                min-height: 2rem;
            }
        }
    }
</style>
<?php
include_once(__DIR__.'/template/header.css.php');
include_once(__DIR__.'/template/footer.css.php');