$(function(){
    $('.dropdown-nonclick .dropdown-link').click(function(){
        $('.dropdown-nonclick .dropdown-menu').toggleClass('show');
    });

    // $('.switch-product').bootstrapToggle();

    bsCustomFileInput.init();

    // function bkValidForm(section){
    //     alert(1);
    //     var isCheck = true;
    //     $('span.invalid').remove();
    //     $(section + ' [required]').each(function(){
    //         if($(this).attr('type') === 'radio' || $(this).attr('type') === 'checkbox'){
                
    //             if($(this).attr('type') === 'radio'){
    //                 if($('input[name="' + $(this).attr('name') + '"]:checked').length === 0){
    //                     $('#' + $(this).attr('name').split('[')[1].split(']')[0] + ' label').last().after('<span class="invalid">กรุณาเลือก</span>');
    //                     isCheck = false;
    //                 }
    //             }
    //             if($(this).attr('type') === 'checkbox'){
    //                 if($('input[name="' + $(this).attr('name') + '"]:checked').length === 0){
    //                     $('#' + $(this).attr('name').split('[')[1].split(']')[0] + ' label').last().after('<span class="invalid">กรุณาเลือกอย่างน้อย 1 อย่าง</span>');
    //                     isCheck = false;
    //                 }
    //             }
    //         }else{

    //             if($(this).val() == ''){
    //                 if($(this).prop("tagName") == 'SELECT'){
    //                     $(this).last().after('<span class="invalid">กรุณาเลือก</span>');
    //                 }else{
    //                     $(this).last().after('<span class="invalid">กรุณากรอกข้อมูล</span>');
    //                 }
    //                 isCheck = false;
    //             }else{
    //                 if($(this).attr('maxlength') != undefined){
    //                     if($(this).val().length > $(this).attr('maxlength')){
    //                         $(this).last().after('<span class="invalid">กรุณากรอกข้อมูลไม่เกิน ' + $(this).attr('maxlength') + ' ตัวอักษร</span>');
    //                         isCheck = false;
    //                     }
    //                 }
    //             }

    //         }
    //     });
        
    //     return isCheck;
    // }

    // $.validator.setDefaults({
    //     submitHandler: function () {
    //         alert( "Form successful submitted!" );
    //     }
    // });

    // $('#quickForm').validate({
    //     rules: {
    //         email: {
    //             required: true,
    //             email: true,
    //         },
    //         password: {
    //             required: true,
    //             minlength: 5
    //         },
    //         terms: {
    //             required: true
    //         },
    //     },
    //     messages: {
    //         email: {
    //             required: "Please enter a email address",
    //             email: "Please enter a vaild email address"
    //         },
    //         password: {
    //             required: "Please provide a password",
    //             minlength: "Your password must be at least 5 characters long"
    //         },
    //         terms: "Please accept our terms"
    //     },
    //     errorElement: 'span',
    //     errorPlacement: function (error, element) {
    //         error.addClass('invalid-feedback');
    //         element.closest('.form-group').append(error);
    //     },
    //     highlight: function (element, errorClass, validClass) {
    //         $(element).addClass('is-invalid');
    //     },
    //     unhighlight: function (element, errorClass, validClass) {
    //         $(element).removeClass('is-invalid');
    //     }
    // });
});

function bkValidForm(section){
    var isCheck = true;
    $('span.invalid').remove();
    $(section + ' [required]').each(function(){
        $(this).removeClass('is-invalid');
        if($(this).attr('type') === 'radio' || $(this).attr('type') === 'checkbox'){
            
            if($(this).attr('type') === 'radio'){
                if($('input[name="' + $(this).attr('name') + '"]:checked').length === 0){
                    $('#' + $(this).attr('name').split('[')[1].split(']')[0] + ' label').last().after('<span class="invalid text-danger">กรุณาเลือก</span>');
                    isCheck = false;
                }
            }
            if($(this).attr('type') === 'checkbox'){
                if($('input[name="' + $(this).attr('name') + '"]:checked').length === 0){
                    $('#' + $(this).attr('name').split('[')[1].split(']')[0] + ' label').last().after('<span class="invalid text-danger">กรุณาเลือกอย่างน้อย 1 อย่าง</span>');
                    isCheck = false;
                }
            }
        }else{

            if($(this).val() == ''){
                if($(this).prop("tagName") == 'SELECT'){
                    $(this).last().after('<span class="invalid text-danger">กรุณาเลือก</span>');
                }else{
                    $(this).last().after('<span class="invalid text-danger">กรุณากรอกข้อมูล</span>');
                }
                $(this).addClass('is-invalid');
                isCheck = false;
            }else{
                if($(this).attr('maxlength') != undefined){
                    if($(this).val().length > $(this).attr('maxlength')){
                        $(this).last().after('<span class="invalid text-danger">กรุณากรอกข้อมูลไม่เกิน ' + $(this).attr('maxlength') + ' ตัวอักษร</span>');
                        isCheck = false;
                    }
                }
            }

        }
    });
    
    return isCheck;
}

function number_format(nStr){
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '.00';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function number(str){
    var x = str.split(',');
    var e = x[1] != undefined ? x[1] : '';
    return parseFloat(x[0] + e);
}
