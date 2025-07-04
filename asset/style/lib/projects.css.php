<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
.subHeading{
    font-size: clamp(1.25rem, 4.5vw, 1.75rem);
    width: fit-content;
    margin: 0 auto;
    padding: clamp(0.75rem, 1vw, 0.875rem) 0;
    text-align: center;
    background: linear-gradient(0.25turn, #fa0a0a, #f06705, #fabd05, #c8ce07, #05d6c4);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
#projects{
    display: flex;
}
.mainSwiper{
    width: 66%;
    aspect-ratio: 5 / 3;
    max-height: 50svh;
    min-height: 15rem;
    .swiper-slide{
        position: relative;
        color: #fff;
        .mainThumb{
            position: absolute;
            background-size: cover;
            background-position: center;
            right: 0;
            bottom: 0;
            width: 75%;
            height:100%;
        }
        .mainThumbColor{
            position: absolute;
            background-size: cover;
            background-position: center;
            right: 0;
            width: calc(75% + 0.5rem + 0.5rem);
            height: 100%;
        }
        .mainText{
            position: absolute;
            z-index: 2;
            h2{
                margin: 1rem;
                font-size: clamp(2rem, 4.75vw, 4rem);
                text-shadow: 3px 3px 1px rgba(45, 45, 45, 0.9);
                transition: all 240ms;
            }
            h3{
                margin: 1rem;
                font-size: clamp(1rem, 2.75vw, 1.5rem);
                text-shadow: 2.5px 2.5px 1px rgba(45, 45, 45, 0.9);
                letter-spacing: 0.25rem;
                transition: all 240ms;
            }
            p{
                margin: 1rem;
                width: 90%;
                font-size: clamp(0.875rem, 2vw, 1.125rem);
                text-shadow: 2px 2px 1px rgba(45, 45, 45, 0.9);
                letter-spacing: 0.125rem;
                transition: all 240ms;
            }
        }
        .detailsLink{
            display: block;
            width: fit-content;
            padding: 1rem;
            font-size: clamp(0.87rem, 1.5vw, 1.125rem);
            color: #fff;
            text-shadow: 2px 2px 1px rgba(45, 45, 45, 0.9);
            background-color:rgba(0, 0, 0, 0.5);
            border-radius: 2rem;
            transition: all 240ms;
            position: absolute;
            z-index: 3;
            margin: 2rem;
            bottom: 0;
            right: 0;
        }
        .detailsLink:hover{
            background-color:rgb(65, 65, 65);
        }
    }
}
#explanation{
    width: calc(100% - 66%);
    background-position: center;
    background-size: cover;
    background-image: url("<?=IMAGE_URL?>/main/our_room.JPG");
    align-content: center;
    p, a{
        margin: 1rem clamp(2rem, 10%, 20rem);
        font-size: clamp(0.87rem, 1.5vw, 1.125rem);
        letter-spacing: 0.125rem;
        line-height: 1.125;
        color: #fff;
        text-shadow: 1px 1px 1px rgba(45, 45, 45, 0.5);
    }
    a{
        display: block;
        width: fit-content;
        margin: 1rem auto;
    }
}
@media(max-width:1000px){
    #projects{
        display: block;
    }
    .mainSwiper{
        width: 100%;
        .swiper-slide{
            .mainText{
                position: absolute;
                z-index: 2;
                h2{
                    margin: 0.75rem;
                    width: 75%;
                }
                h3{
                    margin: 0.75rem;
                }
                p{
                    margin: 0.75rem;
                }
            }
            .detailsLink{
                height: fit-content;
                padding: 0.75rem;
                margin: 0.75rem;
                top: 0;
            }
            .detailsLink:hover{
                background-color:rgb(65, 65, 65);
            }
        }
    }
    #explanation{
        width: 100%;
        p, a{
            margin: 1rem clamp(2rem, 15%, 20rem);
        }
        a{
            margin: 1rem auto;
        }
    }
}
.subSwiper{
    height: 10rem;
    .swiper-slide{
        min-width: 20%;
        display: flex;
        justify-content: center;
        align-items: center;
        filter: brightness(80%);
        .subThumb{
            background-position: center;
            background-size: cover;
            --size: 8rem;
            width: var(--size);
            height: var(--size);
            border: 2px solid #fff;
            border-radius: calc(var(--size) / 2);
            filter: blur(2px);
            transition: all 120ms;
        }
    }
    .swiper-slide-thumb-active{
        filter: brightness(100%);
        .subThumb{
            filter: blur(0);
            border-radius: calc(var(--size) / 2 - 2rem);
            scale: 1.05;
        }
    }
}
@media(max-width: 680px){
    .subSwiper{
        height: 8rem;
        .swiper-slide{
            .subThumb{
                --size: 6rem;
            }
        }
    }
}
</style>