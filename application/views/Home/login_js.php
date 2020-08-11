<script>
    $(function() {
        setCommon();
        initControl();
    });

    function setCommon(){
        $('body').removeClass('login-page');
        // if($('body').hasClass('layout-top-nav')){
        //     $('body').removeClass('layout-top-nav');
        //     $('body').addClass('login-page');
        // }else{
        //     $('body').addClass('layout-top-nav');
        //     $('body').removeClass('login-page');
        // }
    }

    function initControl(){
        $('#form_login').submit(function(e){
            e.preventDefault();
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
                    switch (response) {
                        case 'logined_pass':
                            location.href = '<?php echo SITE; ?>home';
                            break;
                        case 'not_found_username':
                            Swal.fire({
                                icon: 'error',
                                title: 'เข้าสู่ระบบไม่สำเร็จ',
                                text: 'ไม่พบ Username นี้ในระบบ',
                            });
                            break;
                        case 'wrong_password':
                            Swal.fire({
                                icon: 'error',
                                title: 'เข้าสู่ระบบไม่สำเร็จ',
                                text: 'Password ไม่ถูกต้อง',
                            });
                            break;
                        default:
                            Swal.fire({
                                icon: 'error',
                                title: 'เข้าสู่ระบบไม่สำเร็จ',
                                text: 'มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง',
                            });
                            break;
                    }
                    
                }
            });
            
        });
    }
</script>