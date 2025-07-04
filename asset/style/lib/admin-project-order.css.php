<style>
@import url("<?=STYLE_URL?>/imageInput.css");
@import url("<?=STYLE_URL?>/template/formlabel.css");
#orderform{
    padding: 0 0.5rem;
    padding-bottom: 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 1000px);
}
#sorter{
    border: 2px solid #888;
    margin-bottom: 1rem;
}
.pjContainer{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 1rem;
    .pName{
        color: #fff;
        margin: 0.5rem 0;
    }
    .handler{
        width: 1.5rem;
        height: 1.5rem;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        cursor: pointer;
    }
    .other{
        display: flex;
        align-items: center;
        .orderdisp{
            padding: 0 1rem;
            color: #fff;
        }
    }
}
#message{
    padding: 0 1rem;
    margin: 0 auto;
    width: clamp(240px, 90%, 1000px);
    p{
        font-size: clamp(0.75rem, 1.5vw, 1rem);
    }
}
</style>