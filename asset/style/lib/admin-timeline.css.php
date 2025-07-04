<style>
@import url("<?=STYLE_URL?>/imageInput.css");
@import url("<?=STYLE_URL?>/template/formlabel.css");
#new, #delete{
    padding: 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 1000px);
}
.post{
    display: flex;
    padding: 0.5rem 1rem;
    align-items: center;
    justify-content: space-between;
    p{
        font-size:clamp(0.75rem,1.5vw,1rem);
        margin-bottom: 0;
    }
    h4{
        font-size:clamp(0.75rem,1.5vw,1rem);
        margin: 0;
    }
}
.button-error{
    height: fit-content;
    font-size:clamp(0.75rem,1.5vw,1rem);
}
.odd{
    background-color: #1c6450;
    color: #fff;
}
.even{
    background-color: #a2eaa9;
    color: #25715c;
}
</style>