<style>
@import url("<?=STYLE_URL?>/mermaid.min.css");    
#buttons-table{
    display: flex;
    gap: 0.5rem;
    align-items: center;
    justify-content: right;
    padding: 0.5rem;
    background: #aba;
    flex-wrap: wrap;
    border-radius: 0.25rem 0.25rem 0 0;
    a{
        width: fit-content;
        margin: 0.125rem 0;
    }
    @media(max-width: 680px){
        a, button{
            font-size: clamp(0.675rem, 1.5vw, 1rem);
        }
    }
}
#phpdata{
    padding: 1rem;
    background-color: #ccc;
    min-width: 280px;
    h3{
        margin: 0;
        padding: 0.25rem 0;
        font-size: clamp(1rem, 3vw, 1.5rem);
    }
    pre{
        white-space: pre-wrap; /* CSS3 */    
        white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
        white-space: -pre-wrap; /* Opera 4-6 */    
        white-space: -o-pre-wrap; /* Opera 7 */    
        word-wrap: break-word; /* Internet Explorer 5.5+ */
    }
    @media(max-width: 680px){
        pre{
            font-size: clamp(0.675rem, 1.5vw, 1rem);
        }
    }
}
#logtable{
    width: 100%;
    max-width: 2000px;
    margin: 0 auto;
    td{
        font-size:clamp(0.75rem, 1.75vw, 1rem);
    }
    .gridjs-th-content{
        /* font-size:clamp(0.75rem, 1.75vw, 1rem); */
        letter-spacing: 1px;
    }
    .gridjs-search-input{
        font-size:clamp(0.75rem, 1.75vw, 1rem);
    }
}
</style>