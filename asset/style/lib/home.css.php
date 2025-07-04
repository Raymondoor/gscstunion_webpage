<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap');
@import url('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
main{
    .subHeading{
        text-align: center;
    }
    @media(min-width: 680px){
        #label{
            width: 100%;
            height: calc(100dvh - 2rem);
            justify-items: center;
            align-content: center;
            background-image: url("<?=IMAGE_URL?>/brand/home-header0.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            opacity: 0.05;
            filter: blur(2px);
            h1{
                color: var(--MainColour);
                text-align: center;
                text-shadow: 2px 2px 3px rgba(45, 45, 45, 0.5);
                font-size: clamp(2.5rem, 7vw, 5rem);
                display: none;
            }
        }
        #description{
            display: flex;
            position: relative;
            justify-content: space-evenly;
            align-items: center;
            padding: 5rem 0;
            background-image: url("<?=IMAGE_URL?>/main/aboutus.JPG");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            h2{
                margin: 0;
                font-size: clamp(1.5rem, 4.5vw, 3.75rem);
                font-family: "Zen Min", serif;
                cursor: default;
                color: var(--MainColour);
                letter-spacing: 1px;
                text-shadow: 2px 2px 2.5px hsla(0, 0%, 20%, 0.5);
                white-space: nowrap;
                opacity: 0.05;
                translate: 0 2.5rem;
                filter: blur(2px);
            }
            #details{
                width: 40%;
                font-size: clamp(0.875rem, 1.5vw, 1.25rem);
                cursor: default;
                letter-spacing: 0.2rem;
                line-height: 1.5;
                text-shadow: 2px 2px 2px hsla(0, 0%, 70%, 0.8);
                opacity: 0.05;
                translate: 0 2.5rem;
                filter: blur(1px);
            }
            #detailsNav{
                position: absolute;
                bottom: 0;
                right: 0;
                width: fit-content;
                margin: 0;
                font-size: clamp(0.75rem, 1.25vw, 1rem);
                text-shadow: 2px 2px 2px hsla(0, 0%, 70%, 0.8);
                transition: all 240ms;
                a{
                    display: block;
                    width: fit-content;
                    padding: 0.25rem;
                    color: var(--MainColour);
                    margin: 0.5rem;
                }
            }
            #detailsNav:hover{
                text-shadow: 3px 3px 2px hsla(0, 0%, 70%, 0.8);
            }
        }
        #latestArticles{
            background-color: var(--MainColour);
            h2{
                margin: 0;
                color: #fff;
                padding: 0.75rem 0;
            }
            .explore{
                padding: 0.5rem 0;
                margin: 0;
                a{
                    color: #fff;
                }
            }
        }
        #articlesList{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
            .articleContainer{
                min-height: 20rem;
                max-height: 25rem;
                translate: 0 2.5rem;
                opacity: 0.05;
                position: relative;
                overflow: hidden;
                .thumb{
                    width: 100%;
                    height: 100%;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    z-index: -1;
                }
                .artDate{
                    position: absolute;
                    top: 0;
                    margin: 0;
                    padding: 0.25rem;
                    color: #fff;
                    font-size: clamp(0.875rem, 1.75vw, 1.05rem);
                }
                .card{
                    position: absolute;
                    bottom: 0;
                    min-height: 50%;
                    padding: 0 0.25rem;
                    width: calc(100% - 0.5rem);
                    transform: translateY(114px);
                    transition: all 180ms;
                    .artProject{
                        margin: 0.5rem;
                        color: #fff;
                        height: 1.5rem;
                        font-size: clamp(0.875rem, 1.75vw, 1.05rem);
                    }
                    .artTitle{
                        margin: 0.5rem;
                        font-size: clamp(1.125rem, 2vw, 1.25rem);
                        height: 5rem;
                        align-content: center;
                        .artTitleLink{
                            color: #fff;
                        }
                    }
                    .artMain{
                        height: 70px;
                        margin: 0.5rem;
                        color: #fff;
                        font-size: clamp(0.9375rem, 1.75vw, 1.025rem);
                        align-content: center;
                    }
                    .detailsLabel{
                        height: 2rem;
                        font-size: clamp(0.875rem, 1.75vw, 1rem);
                        margin: 0 auto;
                        width: fit-content;
                        text-align: center;
                        position: relative;
                        color: #fff;
                        .detailsLabelLink{
                            color: #fff;
                        }
                    }
                    .detailsLabel::after{
                        content: "→";
                        opacity: 0;
                        position: absolute;
                        right: 0;
                        top: 50%;
                        transform: translate(1.25rem, -85%);
                        transition: all 0.3s;
                    }
                    .detailsLabel:hover::after{
                        transform: translate(1.5rem, -85%);
                        opacity: 1;
                    }
                }
            }
            .articleContainer:hover{
                .card{
                    transform: translateY(0);
                }
            }
        }
        #projectsList{
            opacity: 0.05;
            filter: blur(2px);
            .swiper{
                width: 100%;
                height: 24rem;
                .swiper-slide{
                    width: 100%;
                }
                .swiper-button-prev{
                    transform: translateX(2rem);
                }
                .swiper-button-next{
                    transform: translateX(-2rem);
                }
                .swiper-button-prev::after, .swiper-button-next::after{
                    color:var(--OrgColour);
                    font-size: clamp(1.75rem, 6vw, 2.25rem);
                    background-color:rgba(236, 236, 236, 0.65);
                    padding: 1rem 1.5rem;
                    margin: 1rem;
                    border-radius: 10rem;
                    transition: all 120ms;
                    font-weight: bold;
                }
                .swiper-button-prev:hover::after, .swiper-button-next:hover::after{
                    background-color:rgba(54, 54, 54, 0.47);
                }
            }
            .pjContainer{
                filter: contrast(105%);
                font-family: var(--KakuFont);
                position: relative;
                .thumbBg{
                    display: block;
                    width: 12rem;
                    height: 12rem;
                    margin: auto;
                    margin-top: 4rem;
                    background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat;
                    border-radius: 6rem;
                    border: 2px solid #fff;
                    transition: all 240ms;
                }
                .thumbBg:hover{
                    scale: 1.1;
                    border-radius: 1rem;
                }
                h3{
                    position: fixed;
                    color: #fff;
                    width: 100%;
                    text-align: center;
                    margin: 0;
                    top: 75%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    -webkit-transform: translate(-50%, -50%);
                    -ms-transform: translate(-50%, -50%);
                    font-size: clamp(1rem, 2.5vw, 1.5rem);
                    text-shadow: 2px 2px 1px rgba(45, 45, 45, 0.9);
                    transition: all 240ms;
                }
                .detailA{
                    color: #fff;
                    display: inline-block;
                    width: fit-content;
                    position: fixed;
                    bottom: clamp(0.5rem, 2vw, 2rem);;
                    right: clamp(0.5rem, 2vw, 2rem);;
                    padding: 0 1rem;
                    background-color:rgba(0, 0, 0, 0.2);
                    border-radius: 2rem;
                    transition: all 240ms;
                    .detailP{
                        width: fit-content;
                        font-size: clamp(0.75rem, 1.5vw, 1rem);
                        text-shadow: 2px 2px 1px rgba(45, 45, 45, 0.9);
                        transition: all 240ms;
                    }
                }
                .detailA:hover{
                    background-color:rgba(65, 65, 65, 0.2);
                    .detailP{
                        text-shadow: 3px 3px 1px rgba(45, 45, 45, 0.9);
                    }
                }
            }
        }
    }
    @media(max-width: 680px){
        #label{
            width: 100%;
            height: calc(100vw * 0.666);
            justify-items: center;
            align-content: center;
            background-image: url("<?=IMAGE_URL?>/brand/home-header0.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            opacity: 0.05;
            filter: blur(2px);
            h1{
                color: var(--MainColour);
                text-align: center;
                text-shadow: 2px 2px 3px rgba(45, 45, 45, 0.5);
                font-size: clamp(2rem, 7.5vw, 5rem);
                display: none;
            }
        }
        #description{
            display: block;
            position: relative;
            justify-content: space-evenly;
            align-items: center;
            padding: 4rem 0;
            background-image: url("<?=IMAGE_URL?>/main/aboutus.JPG");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            h2{
                margin: 0 auto;
                font-size: clamp(2.5rem, 8vw, 3.75rem);
                font-family: "Zen Min", serif;
                cursor: default;
                color: var(--MainColour);
                width: fit-content;
                padding-bottom: 3rem;
                text-shadow: 2px 2px 2.5px hsla(0, 0%, 20%, 0.5);
                white-space: nowrap;
                opacity: 0.05;
                translate: 0 2.5rem;
                filter: blur(1px);
            }
            #details{
                margin: 0 auto;
                width: clamp(260px, 75%, 500px);
                font-size: clamp(0.75rem, 1.5vw, 1rem);
                cursor: default;
                text-align: justify;
                letter-spacing: 0.2rem;
                line-height: 1.5;
                text-shadow: 2px 2px 2px hsla(0, 0%, 70%, 0.8);
                opacity: 0.05;
                translate: 0 2.5rem;
                filter: blur(1px);
            }
            #detailsNav{
                position: absolute;
                bottom: 0;
                right: 0;
                width: fit-content;
                margin: 0;
                font-size: clamp(0.75rem, 1.25vw, 1rem);
                text-shadow: 2px 2px 2px hsla(0, 0%, 70%, 0.8);
                transition: all 240ms;
                a{
                    display: block;
                    width: fit-content;
                    padding: 0.25rem;
                    color: var(--MainColour);
                    margin: 0.5rem;
                }
            }
            #detailsNav:hover{
                text-shadow: 3px 3px 2px hsla(0, 0%, 70%, 0.8);
            }
        }
        #latestArticles{
            background-color: var(--MainColour);
            h2{
                margin: 0;
                color: #fff;
                padding: 0.75rem 0;
            }
            .explore{
                margin: 0;
                padding: 0.5rem 0;
                a{
                    color: #fff;
                }
            }
        }
        #articlesList{
            display: grid;
            grid-template-columns: repeat(2, minmax(5rem, 1fr));
            .articleContainer{
                min-height: 18rem;
                translate: 0 2.5rem;
                opacity: 0.05;
                position: relative;
                overflow: hidden;
                .thumb{
                    width: 100%;
                    height: 100%;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    z-index: -1;
                }
                .artDate{
                    position: absolute;
                    top: 0;
                    margin: 0;
                    padding: 0.25rem;
                    color: #fff;
                    font-size: 0.875rem;
                    height: 1rem;
                }
                .card{
                    position: absolute;
                    bottom: 0;
                    min-height: 20%;
                    padding: 0 0.25rem;
                    transform: translateY(28px);
                    transition: all 180ms;
                    .artProject{
                        margin: 0.5rem;
                        color: #fff;
                        font-size: 0.875rem;
                        height: 1rem;
                    }
                    .artTitle{
                        margin: 0.5rem;
                        font-size: clamp(1.125rem, 2vw, 1.25rem);
                        height: 4.5rem;
                        align-content: center;
                        .artTitleLink{
                            color: #fff;
                        }
                    }
                    .artMain{
                        display: none;
                    }
                    .detailsLabel{
                        font-size: 0.875rem;
                        margin: 0 auto;
                        height: 1.5rem;
                        width: fit-content;
                        text-align: center;
                        position: relative;
                        color: #fff;
                        .detailsLabelLink{
                            color: #fff;
                        }
                    }
                    .detailsLabel::after{
                        content: "→";
                        opacity: 1;
                        position: absolute;
                        right: 0;
                        top: 50%;
                        transform: translate(1.25rem, -75%);
                        transition: all 0.3s;
                    }
                }
            }
            .articleContainer:hover{
                .card{
                    transform: translateY(0);
                }
            }
        }
        #projectsList{
            opacity: 0.05;
            filter: blur(2px);
            .swiper{
                width: 100%;
                height: 20rem;
                .swiper-slide{
                    width: 100%;
                }
                .swiper-button-prev{
                    transform: translateX(1rem);
                }
                .swiper-button-next{
                    transform: translateX(-1rem);
                }
                .swiper-button-prev::after, .swiper-button-next::after{
                    color:var(--OrgColour);
                    font-size: 1rem;
                    background-color:rgba(236, 236, 236, 0.65);
                    padding: 0.875rem 1.125rem;
                    margin: 0.75rem;
                    border-radius: 10rem;
                    transition: all 120ms;
                    font-weight: bold;
                }
                .swiper-button-prev:hover::after, .swiper-button-next:hover::after{
                    background-color:rgba(54, 54, 54, 0.47);
                }
            }
            .pjContainer{
                filter: contrast(105%);
                font-family: var(--KakuFont);
                position: relative;
                .thumbBg{
                    display: block;
                    width: 10rem;
                    height: 10rem;
                    margin: auto;
                    margin-top: 3.5rem;
                    background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat;
                    border-radius: 6rem;
                    border: 2px solid #fff;
                    transition: all 240ms;
                }
                .thumbBg:hover{
                    scale: 1.05;
                    border-radius: 1rem;
                }
                h3{
                    position: fixed;
                    color: #fff;
                    width: 100%;
                    text-align: center;
                    margin: 0;
                    top: 80%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    -webkit-transform: translate(-50%, -50%);
                    -ms-transform: translate(-50%, -50%);
                    font-size: clamp(1rem, 2.5vw, 1.5rem);
                    text-shadow: 2px 2px 1px rgba(45, 45, 45, 0.9);
                    transition: all 240ms;
                }
                .detailA{
                    color: #fff;
                    display: inline-block;
                    width: fit-content;
                    position: fixed;
                    bottom: clamp(0.5rem, 2vw, 2rem);;
                    right: clamp(0.5rem, 2vw, 2rem);;
                    padding: 0 1rem;
                    background-color:rgba(0, 0, 0, 0.2);
                    border-radius: 2rem;
                    transition: all 240ms;
                    .detailP{
                        width: fit-content;
                        font-size: clamp(0.75rem, 1.5vw, 1rem);
                        text-shadow: 2px 2px 1px rgba(45, 45, 45, 0.9);
                        transition: all 240ms;
                    }
                }
                .detailA:hover{
                    background-color:rgba(65, 65, 65, 0.2);
                    .detailP{
                        text-shadow: 3px 3px 1px rgba(45, 45, 45, 0.9);
                    }
                }
            }
        }
    }
}
</style>