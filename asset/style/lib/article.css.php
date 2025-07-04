<style>
@import url("<?=STYLE_URL?>/template/ql-render.css");
#mainBg{
    width: 100%;
    min-height: 100%;
    background-size: cover;
    background-position: center;
}
#articleContainer{
    width: clamp(10rem, 100%, 1200px);
    margin: 0 auto;
    height: 100%;
    background-color: #fafafa;
    #overview{
        #thumb{
            background-size: cover;
            background-position: center;
            width: 100%;
            height: clamp(8rem, 24vw, 18rem);
            position: relative;
            #refer{
                position: absolute;
                color: #fff;
                font-size: clamp(0.75rem, 2vw, 1rem);
                text-shadow: 2px 2px 2px hsla(0, 0%, 70%, 0.8);
                top: 0.5rem;
                left: 1rem;
            }
            #view{
                height: 1rem;
                position: absolute;
                right: 0.5rem;
                bottom: -1.5rem;
                margin: 0;
                align-items: center;
                display: flex;
                color: #888;
                p{
                    margin: 0;
                    font-weight: bold;
                }
                #viewImg{
                    color: #fff;
                    background-image: url("<?=IMAGE_URL?>/share/view.svg");
                    width: 1rem;
                    height: 1rem;
                    margin-left:0.25rem;
                    background-position: center;
                    background-size: cover;
                }
            }
        }
        #title, #date, #category, #project{
            color: #000;
            margin: 0 clamp(0.75rem, 2vw, 1.5rem);
            transition: all 240ms;
        }
        #project{
            font-size: clamp(0.75rem, 2.75vw, 1.25rem);
            margin-top: clamp(0.5rem, 1.5vw, 0.875rem);
        }
        #title{
            font-size: clamp(1.25rem, 4.5vw, 2.25rem);
            margin-bottom: clamp(0.75rem, 2vw, 1rem);
            margin-top: clamp(0.5rem, 1.5vw, 0.875rem);
        }
        #xtraInfo{
            display: flex;
            justify-content: space-between;
            align-items: center;
            #date{
                font-size: clamp(0.75rem, 2vw, 1rem);
                margin-bottom: clamp(0.25rem, 1vw, 0.5rem);
            }
            #category{
                margin-bottom: clamp(0.75rem, 2vw, 1.5rem);
                font-size: clamp(0.75rem, 2vw, 1rem);
                transition: all 240ms;
                a{
                    color: #000;
                }
            }
            #clipboardButton{
                font-size: clamp(0.75rem, 2vw, 1rem);
                display: inline-block;
                border: 0;
                cursor: pointer;
                will-change: box-shadow,transform;
                margin: 0 clamp(0.75rem, 2vw, 1.5rem);
                padding: 0.25rem 0.5rem;
                border-radius: 0.25rem;
                color: #fff;
                text-shadow: 0 1px 0 rgb(0 0 0 / 40%);
                transition: box-shadow 0.15s ease, transform 0.15s ease;
            }
            #clipboardButton:active{
                box-shadow: inset 0px 0.1em 0.6em rgba(0, 0, 0, 0.5);
                transform: translateY(0.125rem);
            }
        }
        hr{
            margin: 0;
        }
    }
    #main{
        margin: 0 clamp(0.75rem, 2vw, 1.5rem);
        min-height: 10rem;
        padding-bottom: 1rem;
    }
}
</style>