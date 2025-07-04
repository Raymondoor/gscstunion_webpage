<script>
// else
document.getElementById("new-base-form").addEventListener("keypress", function(event){
    if(event.key === "Enter"){
        event.preventDefault(); // Stops the form from submitting
    }
});
function formreset(){
    console.log('reset');
    location.reload();
}
</script>