<script src="<?=SCRIPT_URL?>/jscolor.min.js"></script>
<script src="<?=SCRIPT_URL?>/imageInput.js"></script>
<script>
$(document).ready(function(){
    new inputImageRender;
});
document.getElementById("new-project-form").addEventListener("keypress", function(event){
    if(event.key === "Enter"){
        event.preventDefault(); // Stops the form from submitting
    }
    function isValidDirectoryName(name){
        return /^[a-zA-Z0-9_.-]+$/.test(name);
    }
    function checkExist(id, column, value){
        if(!value){
            $(id).css('background-color', '#fff');
            return;
        }
        $.post("<?=POST_URL?>ajax-row-exist",{
            'table': 'projects',
            'column': column,
            'value': value
        }, function(result){
            console.log('value: ');
            console.log(result);
            if(result == 0){
                $(id).css('background-color', '#dfd');
            }else if(result == 1){
                $(id).css('background-color', '#fdd');
            }else if(result == -1){
                $(id).css('background-color', '#ddd')
            }
        });
    }
    $('#name').on('input', function(){
        checkExist(this, 'name', $(this).val());
    });
    $('#directory').on('input', function(){
        const $input = $(this);
        const value = $input.val();
        if (!value) {
            $input.css('background-color', '#fff');
            return;
        }
        if(!isValidDirectoryName(value)){
            $input.css('background-color', '#fdd'); // invalid format
            return;
        }
        checkExist(this, 'directory', value); // only run if valid format
    });
});
</script>