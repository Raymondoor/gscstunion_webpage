document.getElementById('thumb').addEventListener('change', (e) =>{
    const file = e.target.files[0];
    if(!file){
        document.getElementById('preview').src = "";
        return;
    }
    const reader = new FileReader();
    reader.onload = (e) =>{
      document.getElementById('preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
});