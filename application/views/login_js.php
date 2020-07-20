<script>
    $(function() {
        setCommon();
        initControl();
    });

    function setCommon(){
        if($('body').hasClass('layout-top-nav')){
            $('body').removeClass('layout-top-nav');
            $('body').addClass('login-page');
        }else{
            $('body').addClass('layout-top-nav');
            $('body').removeClass('login-page');
        }
    }

    function initControl(){
        $('#form_login').submit(function(e){
            var input = {};
            $($('#form_login').serializeArray()).each(function() {
                input[(this.name)] = this.value;
            });
            // console.log(input);
            $.ajax({
                url: "<?php echo api_url('Auth/login') ?>",
                type: 'POST',
                data: input,
                success: function(response) {
                    location.reload();
                }
            });
            e.preventDefault();
        });
    }
</script>