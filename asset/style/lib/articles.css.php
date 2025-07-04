<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
#latest{
    display: grid;
    background-color: var(--MainColour);
<?php for($i = 1; $i<=6; $i++){
    echo '.grid'.$i.'{grid-area:grid'.$i.';}'."\n";
}?>
}
.lart{
    opacity: 0;
    filter: blur(2px);
}
#searchlink{
    padding: 0.5rem;
    background-color: var(--MainColour);
    a{
        display: block;
        margin: 0 auto;
        padding: 0.125rem;
        font-size: clamp(0.875rem, 1.5vw, 1.25rem);
        width: fit-content;
        color: #fff;
    }
}
@media(min-width:1200px){
    #latest{
        min-height: fit-content;
        height: calc(100svh - 2rem - 1.5rem - 2px);
        width: calc(100% - 1.5rem);
        gap: 0.75rem;
        padding: 0.75rem;
        grid-template-columns: 36% 1fr 34%;
        grid-template-rows: 2rem repeat(4, minmax(5rem, 1fr));
        grid-template-areas: 
            'title title title'
            'grid1 grid2 grid2'
            'grid1 grid3 grid3'
            'grid4 grid4 grid6'
            'grid5 grid5 grid6';
        #scroll{
            position: absolute;
            bottom: 3rem;
            z-index: 2;
            color: #fff;
            text-shadow: 2px 2px 0 #333;
            margin: 0;
            padding: 0.75rem;
            border-radius: 5rem;
            background-color: #55555555;
            text-align: center;
        }
        #ltitle{
            grid-area: title;
            text-align: center;
            align-content: center;
            font-size: clamp(1.25rem, 3vw, 1.5rem);
            margin: 0;
            color: white;
            background-image: url("<?=IMAGE_URL?>/main/campuspaint.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 0.5rem;
        }
        .lart{
            position: relative;
            border-radius: 1rem;
            transition: all 120ms;
            box-shadow: 1px 1px 0 #444;
            .lnew{
                position: absolute;
                z-index: 4;
                color: #FFF;
                width: 0px;
                margin: 0;
                height: 0px;
                border-style: solid;
                border-width: 100px 100px 0 0;
                border-color:rgba(255, 70, 50, 0.68) transparent transparent transparent;
                border-radius: 1rem 0 0 0;
                transform: rotate(0deg);
            }
            .lnewtxt{
                rotate: -45deg;
                color: #fff;
                position: absolute;
                z-index: 5;
                left: 0.5rem;
            }
            .lbgimg{
                border-radius: 1rem;
                position: absolute;
                background-position: center;
                background-size: cover;
                width: 100%;
                height: 100%;
                z-index: 0;
            }
            .lcolor{
                border-radius: 1rem;
                position: absolute;
                width: 100%;
                height: 100%;
            }
            .ltext{
                position: absolute;
                z-index: 1;
                color: #fff;
                border-radius: 1rem;
                width: 100%;
                overflow: hidden;
                p, h2, h4{
                    margin: 0.5rem;
                }
                p{
                    font-size: clamp(0.875rem, 1.5vw, 1.05rem);
                }
                h2{
                    font-size: clamp(1.25rem, 2vw, 1.75rem);
                }
                h4{
                    font-size: clamp(0.875rem, 1.5vw, 1.05rem);
                }
            }
        }
        .lart:hover{
            filter: saturate(120%);
            scale: 1.01;
            box-shadow: 4px 4px 0 #444;
        }
        .grid1, .grid6{
            .ltext{
                bottom: 0;
                border-radius: 0 0 1rem 1rem;
            }
        }
        .grid2, .grid5{
            .lbgimg{
                width: 20%;
                height: 84%;
                left: 1rem;
                top: calc(8%);
            }
            .ltext{
                left: calc(20% + 1.5rem);
                width: calc(100% - 20% - 1.5rem);
                height: 100%;
            }
        }
        .grid3, .grid4{
            .lbgimg{
                width: 75%;
                right: 0;
            }
            .ltext{
                width: 50%;
                height: 100%;
                border-radius: 1rem 0 0 1rem;
            }
        }
    }
}
@media(max-width:1200px) and (min-width:680px){
    #latest{
        min-height: fit-content;
        height: calc(100svh - 2rem - 1.5rem - 2px);
        width: calc(100% - 1.5rem);
        gap: 0.75rem;
        padding: 0.75rem;
        grid-template-columns: 50% 16% 1fr;
        grid-template-rows: 2rem repeat(4, minmax(5rem, 1fr));
        grid-template-areas: 
            'title title title'
            'grid1 grid1 grid2'
            'grid1 grid1 grid3'
            'grid4 grid5 grid5'
            'grid4 grid5 grid5';
        #scroll{
            position: absolute;
            bottom: 3rem;
            z-index: 2;
            color: #fff;
            text-shadow: 2px 2px 0 #333;
            margin: 0;
            padding: 0.75rem;
            border-radius: 5rem;
            background-color: #55555555;
            text-align: center;
        }
        #ltitle{
            grid-area: title;
            text-align: center;
            align-content: center;
            font-size: clamp(1.25rem, 3vw, 1.5rem);
            margin: 0;
            color: white;
            background-image: url("<?=IMAGE_URL?>/main/campuspaint.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 0.5rem;
        }
        .lart{
            position: relative;
            border-radius: 1rem;
            transition: all 120ms;
            box-shadow: 1px 1px 0 #444;
            .lnew{
                position: absolute;
                z-index: 4;
                color: #FFF;
                width: 0px;
                margin: 0;
                height: 0px;
                border-style: solid;
                border-width: 100px 100px 0 0;
                border-color:rgba(255, 70, 50, 0.68) transparent transparent transparent;
                border-radius: 1rem 0 0 0;
                transform: rotate(0deg);
            }
            .lnewtxt{
                rotate: -45deg;
                color: #fff;
                position: absolute;
                z-index: 5;
                left: 0.5rem;
            }
            .lbgimg{
                border-radius: 1rem;
                position: absolute;
                background-position: center;
                background-size: cover;
                width: 100%;
                height: 100%;
                z-index: 0;
            }
            .lcolor{
                border-radius: 1rem;
                position: absolute;
                width: 100%;
                height: 100%;
            }
            .ltext{
                position: absolute;
                z-index: 1;
                color: #fff;
                border-radius: 1rem;
                width: 100%;
                overflow: hidden;
                p, h2, h4{
                    margin: 0.5rem;
                }
                p{
                    font-size: clamp(0.875rem, 1.5vw, 1.05rem);
                }
                h2{
                    font-size: clamp(1.25rem, 2vw, 1.75rem);
                }
                h4{
                    font-size: clamp(0.875rem, 1.5vw, 1.05rem);
                }
            }
        }
        .lart:hover{
            filter: saturate(120%);
            scale: 1.01;
            box-shadow: 4px 4px 0 #444;
        }
        .grid1, .grid5{
            .ltext{
                bottom: 0;
                border-radius: 0 0 1rem 1rem;
            }
        }
        .grid2, .grid3{
            .lbgimg{
                display: none;
            }
        }
        .grid4{
            .lbgimg{
                width: 75%;
                right: 0;
            }
            .ltext{
                width: 50%;
                height: 100%;
                border-radius: 1rem 0 0 1rem;
            }
        }
        .grid6{
            display: none;
        }
    }
}
@media(max-width:680px){
    #latest{
        min-height: fit-content;
        height: calc(100svh - 1rem - 4rem - 2px);
        width: calc(100% - 1rem);
        gap: 0.5rem;
        padding: 0.5rem;
        grid-template-columns: 17% 1fr 17% 17% 1fr 17%;
        grid-template-rows: 2rem 40% 1fr 1fr;
        grid-template-areas: 
            'title title title title title title'
            'grid1 grid1 grid1 grid1 grid1 grid1'
            'grid2 grid2 grid3 grid3 grid4 grid4'
            'grid5 grid5 grid5 grid6 grid6 grid6';
        #scroll{
            display: none;
        }
        #ltitle{
            grid-area: title;
            text-align: center;
            align-content: center;
            font-size: clamp(1.5rem, 3.5vw, 1.75rem);
            margin: 0;
            color: white;
            background-image: url("<?=IMAGE_URL?>/main/campuspaint.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 0.5rem;
        }
        .lart{
            position: relative;
            border-radius: 0.5rem;
            transition: all 120ms;
            box-shadow: 1px 1px 0 #444;
            .lnew{
                position: absolute;
                z-index: 4;
                color: #FFF;
                width: 0px;
                margin: 0;
                height: 0px;
                border-style: solid;
                border-width: 66px 66px 0 0;
                border-color:rgba(255, 70, 50, 0.68) transparent transparent transparent;
                border-radius: 0.5rem 0 0 0;
                transform: rotate(0deg);
            }
            .lnewtxt{
                rotate: -45deg;
                color: #fff;
                position: absolute;
                z-index: 5;
                left: 0.25rem;
                font-size: 0.875rem;
            }
            .lbgimg{
                border-radius: 0.5rem;
                position: absolute;
                background-position: center;
                background-size: cover;
                width: 100%;
                height: 100%;
                z-index: 0;
            }
            .lcolor{
                border-radius: 0.5rem;
                position: absolute;
                width: 100%;
                height: 100%;
            }
            .ltext{
                position: absolute;
                z-index: 1;
                color: #fff;
                border-radius: 0.5rem;
                width: 100%;
                overflow: hidden;
                p, h2, h4{
                    margin: 0.5rem;
                }
                p{
                    font-size: clamp(0.75rem, 1vw, 1rem);
                }
                h2{
                    font-size: clamp(1.125rem, 1.25vw, 1.5rem);
                }
                h4{
                    font-size: clamp(0.875rem, 1vw, 1rem);
                }
            }
        }
        .lart:hover{
            filter: saturate(120%);
            scale: 1.01;
            box-shadow: 4px 4px 0 #444;
        }
        .grid1{
            .ltext{
                bottom: 0;
                border-radius: 0 0 0.5rem 0.5rem;
            }
        }
        .grid2, .grid3, .grid4, .grid5, .grid6{
            .lbgimg{
                display: none;
            }
            .ltext{
                height: 100%;
                h2{
                    font-size: clamp(1rem, 1.5vw, 1.5rem);
                }
            }
        }
    }
}
.swiper{
    width: 100%;
    aspect-ratio: 6 / 2;
    font-family: var(--KakuFont);
    .swiper-slide{
        width: 100%;
    }
    .swiper-button-prev::after, .swiper-button-next::after{
        color:var(--OrgColour);
        font-size: clamp(1.75rem, 6vw, 2.25rem);
    }
}
.artContainer{
    /* box-shadow: 0 0 2.5rem 2px rgba(34, 34, 34, 0.25); */
    .thumbBg{
        position: relative;
        width: 100%;
        height: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .overview{
        --padd: clamp(1rem, 2vw, 2rem);
        padding: var(--padd);
        display: block;
        position: absolute;
        bottom: 0;
        width: calc(100% - var(--padd) * 2);
        min-height: calc(30% - var(--padd) * 2);
        color: #fff;
        text-decoration: none;
        h2{
            margin: 0;
            font-size: clamp(1.5rem, 5vw, 2rem);
            transition: all 240ms;
        }
        h4{
            margin-top: clamp(0.5rem, 1.5vw, 0.75rem);
            margin-bottom: 0;
            font-size: clamp(1rem, 4vw, 1.5rem);
            letter-spacing: 0.125rem;
            transition: all 240ms;
        }
        p{
            color: #fff;
            margin: clamp(0.875rem, 1.5vw, 1.25rem) 0;
            font-size:clamp(0.75rem,2vw,1rem);
            transition: all 240ms;
            border-radius: 0.25rem;
            letter-spacing: 1px;
            transition: all 240ms;
        }
    }
    .overview:hover{
        h2{
            text-shadow: 1px 1px 0 rgba(45, 45, 45, 0.9);
        }
        h4{
            text-shadow: 1px 1px 0 rgba(45, 45, 45, 0.9);
        }
        p{
            text-shadow: 1px 1px 0 rgba(45, 45, 45, 0.9);
        }
    }
    .detailA{
        color: #fff;
        display: inline-block;
        width: fit-content;
        position: fixed;
        bottom: 1rem;
        right: 1rem;
        padding: 0 1rem;
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
        background-color:rgba(39, 39, 39, 0.25);
        .detailP{
            text-shadow: 3px 3px 1px rgba(45, 45, 45, 0.9);
        }
    }
}
@media(max-width:680px){
    .swiper{
        width: 100%;
        aspect-ratio: 5 / 4;
        max-height: calc(100vw - 3rem);
        .swiper-slide{
            width: 100%;
        }
    }
    .artContainer{
        .overview{
            --padd: clamp(1rem, 2vw, 2rem);
            min-height: calc(55% - var(--padd) * 2);
        }
}
}
</style>