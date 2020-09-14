<script>
    $(function(){
        getData();
        initControl();
    });

    function initControl(){
        $('#formStudentImage').submit(function(e){
            e.preventDefault();
            var data = new FormData(this);
            if(!$('#previewImage').hasClass('hide')){
                updateStudentImage( data );
            }else{
                saveStudentImage( data );
            }
            
        });

        $(document).on('click', '.undo', function(){
            var rotate = $('[name="ImageRotate"]').val();
            var newRotate = rotate - 90;
            $('[name="ImageRotate"]').val(newRotate);
            $('#previewImage img').css('transform', 'rotate(' + newRotate + 'deg)');
        });

        $(document).on('click', '.redo', function(){
            var rotate = parseInt($('[name="ImageRotate"]').val());
            var newRotate = rotate + 90;
            $('[name="ImageRotate"]').val(newRotate);
            $('#previewImage img').css('transform', 'rotate(' + newRotate + 'deg)');
        });
    }

    function getData(){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('Home') ?>",
            data: {
                'isTeacher': '<?php echo @$isTeacher; ?>',
                'StudentCode': '<?php echo @$StudentCode; ?>',
                'UserType': '<?php echo @$UserType; ?>'
            },
			success: function(res){
                $('#StudentName').html(res.data['PRENAME'] +' '+ res.data['NAME'] +' '+ res.data['SURNAME']);
                $('#StudentCode').html(res.data['ID']);
                $('#PersonalID').html(res.data['CARDID']);
                $('#BirthDate').html(res.data['BIRDAY']);
                $('#Age').html(res.data['Age']);
                $('#Address').html(res.data['StudentAddress']);
                $('#OldSchool').html(res.data['S_SCHOOL']);
                $('#Province').html(res.data['Province']);
                $('#PhoneNumber').html(res.data['CURPHONE']);

                if(res.data['StudentImage'] != ''){
                    $('#hasImage img').attr('src', '<?php echo ASSETS_IMG; ?>/StudentImage/' + res.data['StudentImage']);
                    $('#uploadImageModal .modal-title').html('แก้ไขรูปภาพนักศึกษา');
                    $('#StudentImageName').html(res.data['StudentImage']);
                    $('#notHasImage').addClass('hide');
                    $('#hasImage, #previewImage, .rotate-image').removeClass('hide');
                    $('[name="oldImage"]').val(res.data['StudentImage']);
                    $('#previewImage img').attr('src', '<?php echo ASSETS_IMG; ?>/StudentImage/' + res.data['StudentImage']);
                    $('#StudentImage').removeAttr('required');
                    $('#hasImage img').css('transform', 'rotate(' + res.data['StudentImageRotate'] + 'deg)');
                }else{
                    $('#notHasImage').removeClass('hide');
                    $('#hasImage').addClass('hide');
                    $('#uploadImageModal .modal-title').html('เพิ่มรูปภาพนักศึกษา');
                }
            }
        });
    }

    function saveStudentImage(data){
        $.ajax({
			method: "POST",
			url: "<?php echo api_url('Student/saveStudentImage') ?>",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: data,
			success: function(res){
                Swal.fire({
                    icon: 'success',
                    title: 'ข้อความจากระบบ',
                    text: 'เพิ่มไฟล์รูปสำเร็จสำเร็จ',
                }).then((result) => {
                    $('#uploadImageModal').modal('hide');
                    window.location.reload();
                });
            },
            error: function(res){
                Swal.fire({
                    icon: 'error',
                    title: 'ข้อความจากระบบ',
                    text: res.responseJSON.message,
                })
            }
        });
    }

    function updateStudentImage(data){
        $.ajax({
			method: "POST",
			url: "<?php echo api_url('Student/updateStudentImage') ?>",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: data,
			success: function(res){
                Swal.fire({
                    icon: 'success',
                    title: 'ข้อความจากระบบ',
                    text: 'แก้ไขไฟล์รูปสำเร็จสำเร็จ',
                }).then((result) => {
                    $('#uploadImageModal').modal('hide');
                    window.location.reload();
                });
            },
            error: function(res){
                Swal.fire({
                    icon: 'error',
                    title: 'ข้อความจากระบบ',
                    text: res.responseJSON.message,
                })
            }
        });
    }
    
</script>