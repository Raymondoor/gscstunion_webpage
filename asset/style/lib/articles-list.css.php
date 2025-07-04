<style>
@media(min-width: 680px){
    #maincontainer{
        h2{
            text-align: center;
            font-size:clamp(1.25rem,3vw,1.5rem);
        }
        margin: 0 auto;
        #artlists{
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(520px, 1fr));
            gap: 0.125rem;
            background-color: var(--MainColour);
        }
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
                    span{
                        padding-left: 1rem;
                    }
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
    #maincontainer{
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