class inputImageRender{
    constructor(){
        this.init();
    }
    init(){
        const input = document.getElementById('imageInputTr');
        input.addEventListener('change', (e) =>{
            const target = document.getElementById('imageInput');
            if(input.files.length === 0){
                // Reset to original style
                target.style.backgroundSize = '45%';
                target.style.backgroundImage = `url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KDTwhLS0gVXBsb2FkZWQgdG86IFNWRyBSZXBvLCB3d3cuc3ZncmVwby5jb20sIEdlbmVyYXRvcjogU1ZHIFJlcG8gTWl4ZXIgVG9vbHMgLS0+Cjxzdmcgd2lkdGg9IjgwMHB4IiBoZWlnaHQ9IjgwMHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgICA8Zz4KICAgICAgICA8cGF0aCBmaWxsPSJub25lIiBkPSJNMCAwaDI0djI0SDB6Ii8+CiAgICAgICAgPHBhdGggZD0iTTIxIDE1djNoM3YyaC0zdjNoLTJ2LTNoLTN2LTJoM3YtM2gyem0uMDA4LTEyYy41NDggMCAuOTkyLjQ0NS45OTIuOTkzdjkuMzQ5QTUuOTkgNS45OSAwIDAgMCAyMCAxM1Y1SDRsLjAwMSAxNCA5LjI5Mi05LjI5M2EuOTk5Ljk5OSAwIDAgMSAxLjMyLS4wODRsLjA5My4wODUgMy41NDYgMy41NWE2LjAwMyA2LjAwMyAwIDAgMC0zLjkxIDcuNzQzTDIuOTkyIDIxQS45OTMuOTkzIDAgMCAxIDIgMjAuMDA3VjMuOTkzQTEgMSAwIDAgMSAyLjk5MiAzaDE4LjAxNnpNOCA3YTIgMiAwIDEgMSAwIDQgMiAyIDAgMCAxIDAtNHoiLz4KICAgIDwvZz4KPC9zdmc+)`;
                return;
            }
            if(!this.checkFileSize(input)){
                return;
            }
            const file = input.files[0];
            if(!file){
                return;
            }
            const reader = new FileReader();
            reader.onload = (e) =>{
                target.style.backgroundSize = 'cover';
                target.style.backgroundImage = `url(${e.target.result})`;
            };
            reader.readAsDataURL(file);
        });
    }
    checkFileSize(input){
        const maxSize = 819200;
        if(input.files[0] && input.files[0].size > maxSize){
            alert("ファイルサイズが大きすぎます！（800kb以下）");
            input.value = ""; // Clear the input
            return false;
        }
        return true;
    }
}
