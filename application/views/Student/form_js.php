<script>
    var id = $('#ProductTagID').val();

    $(function(){
        initControl();
        if(id != ''){
            bindData(id);
        }
    });

    function initControl(){
        $('#formAddProductTag').submit(function(e){
            e.preventDefault();
            if(bkValidForm('#formAddProductTag')){
                var data = $(this).serialize();
                if(id != ''){
                    updateData(data);
                }else{
                    saveData(data);
                }
            }
        });

        $('.btn-cancel').click(function(){
            window.location.href = '<?php echo SITE; ?>ProductTag';
        });
    }

    function saveData(data){
        $.ajax({
            method: "POST",
            url: "<?php echo api_url('ProductTag') ?>",
            data: data,
            success: function(response){
                window.location.href = '<?php echo SITE; ?>ProductTag';
            }
        });
    }

    function updateData(data){
        $.ajax({
            method: "PUT",
            url: "<?php echo api_url('ProductTag') ?>",
            data: data,
            success: function(response){
                window.location.href = '<?php echo SITE; ?>ProductTag';
            }
        });
    }

    function bindData(id){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('ProductTag') ?>",
			data: {
                'TagID': id
            },
			success: function(response){
                $('#ProductTagName').val(response.data.TagName);
			}
		});
    }
    
</script>