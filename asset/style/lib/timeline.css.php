<style>
.subHeading{
    font-size: clamp(1.25rem, 4.5vw, 1.75rem);
    width: fit-content;
    margin: 0 auto;
    padding: clamp(0.75rem, 1vw, 0.875rem) 0;
    text-align: center;
    color: #000;
}
#timeline{
    background: #e7ffc734;
    background: linear-gradient(135deg,rgba(252, 255, 220, 0.3) 0%, rgba(224, 236, 255, 0.3) 100%);
    width: clamp(280px, 80%, 800px);
    margin: 0 auto;
    padding: 0.5rem 0;
    border-radius: 2rem;
    .post{
        scale: 0.1;
        position: relative;
        border-radius: 2rem;
        padding: 0.5rem 5rem;
        z-index: 1;
        width: fit-content;
        max-width: 60%;
        p{
            min-height:1rem;
            letter-spacing:1px;
            font-size:clamp(0.75rem,1.5vw,1rem);
            font-weight: bold;
            margin: 0.375rem 0;
        }
        .author{
            font-size:clamp(0.875rem,2.25vw,1rem);
        }
        .date{
            font-size:clamp(0.5rem,1.5vw,0.75rem);
        }
        .message{
            width: 100%;
        }
    }
}
@media(max-width: 680px){
    #timeline{
        .post{
            padding: 0.5rem 2rem;
            border-radius: 2rem;
            width: fit-content;
            max-width: 90%;
            .message{
                width: 100%;
            }
        }
    }
}
.odd{
    margin: 1rem;
    margin-right: auto;
    background-color: #1c6450;
    color: #ffffff;
    z-index: 0;
    box-shadow: 3px 3px 0 #47c451;
}
.odd::after{
    content: "";
    border: 15px solid transparent;
    border-top-color: #1c6450;
    position: absolute;
    top: 14px;
    left: -14px;
}
.even{
    margin: 1rem;
    margin-left: auto;
    background-color: #a2eaa9;
    color: #25715c;
    box-shadow: 3px 3px 0 #1c6b24;
}
.even::after{
    content: "";
    border: 15px solid transparent;
    border-top-color: #a2eaa9;
    position: absolute;
    top: 14px;
    right: -14px;
}
</style>