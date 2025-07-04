<style>
    @keyframes wiggle {
        0%{transform:rotate(0deg);}
        20%{transform:rotate(8deg);scale:1.025;}
        50%{transform:rotate(-6deg);}
        75%{transform:rotate(4deg);}
        100%{transform:rotate(0deg);}
    }
    header{
        background-color:var(--SubColour2);
        position: relative;
        padding: 0.5rem;
        .icon{
            --size: 3rem;
            display: inline-block;
            width: var(--size);
            min-width: var(--size);
            height: var(--size);
            min-height: var(--size);
            transition: all 240ms;
            align-content: center;
            justify-items: center;
        }
        .icon:hover{
            animation: wiggle 360ms;
        }
        #image{
            width: 100%;
            height: 100%;
            background-image: url("<?=IMAGE_URL?>/brand/logo2.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 1rem;
        }
        #snsImage{
            width: 50%;
            height: 50%;
            background-image: url("<?=IMAGE_URL?>/share/IG.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            filter: invert(180);
            /* border-radius: 1rem; */
        }
        #hamburger{
            display: none;
        }
        ul{
            margin: 0;
            padding: 0;
            li{
                list-style: none;
                margin: 0;
            }
            a{
                display: inline-block;
                text-decoration: none;
                font-weight: bold;
                color: #ccc;
                transition: all 240ms;
                padding: 0.25rem;
            }
            a:hover{
                background-color: #8cc;
                background: linear-gradient(#88cccc00, #88aaaa88);
                color: #fff;
            }
            .isActive{
                box-shadow: 0 1px 0 var(--SubColour);
                color: #fff;
            }
        }
    }
    @media(min-width: 680px){
        header{
            ul{
                a{
                    margin: 0.5rem;
                    margin-left: 0;
                }
            }
            #current{
                display: block;
                position: absolute;
                bottom: 2rem;
                width: calc(100% - 1rem);
                h1{
                    margin: 0.75rem 0;
                    text-align: center;
                    color: #fff;
                    padding: 0;
                    font-size: 1rem;
                }
            }
        }
    }
    @media(max-width: 680px){
        header{
            padding-right: 1rem;
            box-shadow: 0 0.25rem 0.5rem rgba(48, 77, 77, 0.75);
            #bar{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .icon{
                width: 3rem;
                height: 3rem;
            }
            .snsImageLink{
                display: none;
            }
            #hamburger{
                --size: 2rem;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                min-width: var(--size);
                width: fit-content;
                min-height: var(--size);
                height: var(--size);
                align-content: center;
                cursor: pointer;
                hr{
                    margin: 0;
                    background-color: var(--SubColour);
                    border: none;
                    height: 0.125rem;
                    border-radius: 1px;
                    flex-wrap: wrap;
                }p{
                    font-size: 0.625rem;
                    text-align: center;
                    font-weight: 900;
                    color: var(--SubColour);
                    margin: 0;
                }
            }
            nav{
                display: none;
                position: absolute;
                width: 100%;
                background-color:var(--SubColour2);
                left: 0;
                padding: 0.25rem 0;
                box-shadow: 0 0.25rem 0.25rem rgba(48, 77, 77, 0.5);
                opacity: 0;
                transition: all 240ms;
            }
            ul{
                a{
                    margin: 0.25rem 1rem;
                }
            }
            #current{
                display: block;
                h1{
                    margin: 0;
                    color: #fff;
                    padding: 0;
                    font-size: 1.25rem;
                }
            }
        }
    }
</style>