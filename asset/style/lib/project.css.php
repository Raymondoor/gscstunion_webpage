<style>
#overview{
    #thumb{
        background-size: cover;
        background-position: 50% 30%;
        width: 100%;
        height: clamp(8rem, 22vw, 15rem);
        opacity: 0.5;
    }
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
    #pjname, #pjeng, #pjdesc{
        translate: -1rem;
        opacity: 0.75;
        filter: blur(0.5px);
    }
}
@media(min-width: 680px){
    #articles{
        h2{
            text-align: center;
            font-size:clamp(1.25rem,3vw,1.5rem);
        }
        max-width: 1000px;
        margin: 0 auto;
        .artContainer{
            --size: 10rem;
            display: block;
            height: var(--size);
            position: relative;
            overflow: hidden;
            transition: all 120ms;
            .artThumb{
                position: absolute;
                z-index: 0;
                background-position: center;
                background-size: cover;
                height: var(--size);
                width: var(--size);
                top: 0;
            }
            .text{
                position: absolute;
                left: var(--size);
                h3{
                    padding: 0.5rem 1rem;
                    margin: 0;
                    z-index: 2;
                    color: #fff;
                    font-size:clamp(0.875rem,2.25vw,1.25rem);
                }
                p{
                    padding: 0.25rem 1rem;
                    margin: 0;
                    z-index: 2;
                    color: #fff;
                    font-size:clamp(0.75rem,2vw,1rem);
                }
            }
        }
        .artContainer:hover{
            filter: contrast(120%);
        }
        #pagenav{
            width: fit-content;
            display: block;
            margin: 0 auto;
            a{
                display: inline-block;
                padding: 0.5rem 0.75rem;
                border-radius: 0.25rem;
                margin: 0.25rem;
                color: #fff;
                background-color: var(--MainColour);
                text-decoration: none;
            }
            .isPage{
                font-weight:bold;
                text-decoration: underline;
            }
        }
    }
}
@media(max-width: 680px){
    #articles{
        h2{
            text-align: center;
            font-size:clamp(1.25rem,3vw,1.5rem);
        }
        max-width: 1000px;
        margin: 0 auto;
        .artContainer{
            --size: 8rem;
            display: block;
            height: var(--size);
            overflow: hidden;
            position: relative;
            .artThumb{
                position: absolute;
                z-index: 0;
                background-position: center;
                background-size: cover;
                height: var(--size);
                width: var(--size);
                top: 0;
            }
            .text{
                position: absolute;
                left: var(--size);
                h3{
                    padding: 0.375rem 0.5rem;
                    margin: 0;
                    z-index: 2;
                    color: #fff;
                    font-size:clamp(0.875rem,2.25vw,1.25rem);
                }
                p{
                    padding: 0.25rem 0.5rem;
                    margin: 0;
                    z-index: 2;
                    color: #fff;
                    font-size:clamp(0.75rem,2vw,1rem);
                }
            }
        }
        .artContainer:hover{
            filter: contrast(120%);
        }
        #pagenav{
            width: fit-content;
            display: block;
            margin: 0 auto;
            a{
                display: inline-block;
                padding: 0.5rem 0.75rem;
                margin: 0.25rem;
                border-radius: 0.25rem;
                color: #fff;
                background-color: var(--MainColour);
                text-decoration: none;
            }
            .isPage{
                font-weight:bold;
                text-decoration: underline;
            }
        }
    }
}
</style>