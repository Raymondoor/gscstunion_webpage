function checkFileSize(input) {
  const maxSize = 819200; // 2MB in bytes
  if (input.files[0] && input.files[0].size > maxSize) {
    alert("ファイルサイズが大きすぎます！");
    input.value = ""; // Clear the input
  }
}
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
window.checkFileSize = checkFileSize;