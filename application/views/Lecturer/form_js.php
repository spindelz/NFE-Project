<script>
    $(function() {
        initControl();
        bindBirthProvince();
        bindProvince();
        bindAmphur();
        bindTambon();
        bindWorkProvince();
        bindWorkAmphur();
        bindWorkTambon();
        bindCourceProvince();
        bindCourceAmphur();
        bindPrefix();
        bindLecturerType();
        bindDegree();

        bindData();
    });

    function initControl() {
        $('#formSaveData').submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            saveData(data);
        });

        $(document).on('change', '#CurrentProvinceID', function(){
            bindAmphur($(this).val());
        });

        $(document).on('change', '#CurrentAmphurID', function(){
            bindTambon($(this).val());
        });

        $(document).on('change', '#CurrentTambonID', function(){
            $('#CurrentPostCode').val($('#CurrentTambonID option[value="' + $(this).val() + '"]').data('postcode'));
        });

        $(document).on('change', '#WorkProvinceID', function(){
            bindWorkAmphur($(this).val());
        });

        $(document).on('change', '#WorkAmphurID', function(){
            bindWorkTambon($(this).val());
        });
        
        $(document).on('change', '#WorkTambonID', function(){
            $('#WorkPostCode').val($('#WorkTambonID option[value="' + $(this).val() + '"]').data('postcode'));
        });

        $(document).on('change', '#CourceProvinceID', function(){
            bindCourceAmphur($(this).val());
        });

        $(document).on('change', '[name="isExperience"]', function(){
            if ($(this).val() == 1) {
                $('.experience').collapse('show');
                $('.experience input').attr('required', 'required');
                $('.experience select').attr('required', 'required');
            } else {
                $('.experience').collapse('hide');
                $('.experience input').removeAttr('required');
                $('.experience select').removeAttr('required');
            }
        });

        $(document).on('change', '[name="LecturerTypeID"]', function(){
            if($(this).val() == 4){
                $('.lecturer-type-other').remove();
                $(this).closest('.form-group').after($('<div class="form-group lecturer-type-other">').html('<label class="font-weight-bold" for="LecturerTypeOther">ประเภทวิทยากรอื่นๆ <span class="text-danger">*</span></label><input type="text" class="form-control" id="LecturerTypeOther" name="LecturerTypeOther" maxlength="50" required>'));
            }else{
                $('.lecturer-type-other').remove();
            }
        });

        $(document).on('focus', 'input[type="text"]', function(){
            var maxlength = $(this).attr('maxlength');
            if(maxlength != undefined){
                $(this).after('<small class="text-mute">จำนวนตัวอักษรสูงสุด: ' + maxlength + ' ตัว</small>');
            }
        });

        $(document).on('focusout', 'input', function(){
            $('input + .text-mute').remove();
        });

        $(document).on('focus', 'textarea', function(){
            var maxlength = $(this).attr('maxlength');
            $(this).after('<small class="text-mute">กำหนดตัวอักษร: ' + maxlength + ' ตัว</small>');
        });

        $(document).on('focusout', 'textarea', function(){
            $('textarea + .text-mute').remove();
        });
        
    }

    function saveData(data) {
        $.ajax({
            method: "POST",
            url: "<?php echo api_url('Lecturer/save') ?>",
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            dataType:"json",
            success: function(res) {
                Swal.fire({
                    icon: 'success',
                    title: 'ข้อความจากระบบ',
                    text: 'บันทึกข้อมูลสำเร็จ',
                }).then((result) => {
                    window.location.href = '<?php echo SITE; ?>/Lecturer';
                });
            }
        });
    }

    function bindData() {
        $.ajax({
            method: "POST",
            url: "<?php echo api_url('OpenClass/getDetailOpenClass') ?>",
            data: { 'LecturerID': $('[name="LecturerID"]').val() },
            success: function(res) {

            }
        });
    }

    function bindPrefix() {
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/prefix') ?>",
            success: function(res) {

                var prov = $('#PrefixID');
                prov.empty();
                prov.html($('<option>').val('').html('เลือกคำนำหน้าชื่อ'));
                if (res.length > 0) {
                    for (i in res.data) {
                        prov.append($('<option>').val(res.data[i].PrefixID).html(res.data[i].PrefixName));
                    }
                }
            }
        });
    }

    function bindBirthProvince() {
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/province') ?>",
            success: function(res) {

                var prov = $('#BirthProvinceID');
                prov.empty();
                prov.html($('<option>').val('').html('เลือกจังหวัด'));
                if (res.length > 0) {
                    for (i in res.province) {
                        prov.append($('<option>').val(res.province[i].ID).html('จังหวัด ' + res.province[i].NAME));
                    }
                }
            }
        });
    }

    function bindProvince() {
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/province') ?>",
            success: function(res) {

                var prov = $('#CurrentProvinceID');
                prov.empty();
                prov.html($('<option>').val('').html('เลือกจังหวัด'));
                if (res.length > 0) {
                    for (i in res.province) {
                        prov.append($('<option>').val(res.province[i].ID).html('จังหวัด ' + res.province[i].NAME));
                    }
                }
            }
        });
    }

    function bindAmphur(provinceID = ''){
        var amphur = $('#CurrentAmphurID');
        amphur.empty();
        amphur.html($('<option>').val('').html('เลือกอำเภอ'));
        if(provinceID != ''){
            $.ajax({
                method: "GET",
                url: "<?php echo api_url('Common/amphur') ?>",
                data: {'ProvinceID': provinceID},
                success: function(res) {
                    if (res.length > 0) {
                        for (i in res.amphur) {
                            amphur.append($('<option>').val(res.amphur[i].ID).html('อำเภอ ' + res.amphur[i].NAME));
                        }
                    }
                }
            });
        }
    }

    function bindTambon(amphurID = ''){
        var tambon = $('#CurrentTambonID');
        tambon.empty();
        tambon.html($('<option>').val('').html('เลือกตำบล'));
        if(amphurID != ''){
            $.ajax({
                method: "GET",
                url: "<?php echo api_url('Common/tambon') ?>",
                data: {'AmphurID': amphurID},
                success: function(res) {
                    if (res.length > 0) {
                        for (i in res.tambon) {
                            tambon.append($('<option data-postcode="' + res.tambon[i].POSTCODE + '">').val(res.tambon[i].ID).html('ตำบล ' + res.tambon[i].NAME));
                        }
                    }
                }
            });
        }
    }

    function bindWorkProvince() {
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/province') ?>",
            success: function(res) {

                var prov = $('#WorkProvinceID');
                prov.empty();
                prov.html($('<option>').val('').html('เลือกจังหวัด'));
                if (res.length > 0) {
                    for (i in res.province) {
                        prov.append($('<option>').val(res.province[i].ID).html('จังหวัด ' + res.province[i].NAME));
                    }
                }
            }
        });
    }

    function bindWorkAmphur(provinceID = ''){
        var amphur = $('#WorkAmphurID');
        amphur.empty();
        amphur.html($('<option>').val('').html('เลือกอำเภอ'));
        if(provinceID != ''){
            $.ajax({
                method: "GET",
                url: "<?php echo api_url('Common/amphur') ?>",
                data: {'ProvinceID': provinceID},
                success: function(res) {
                    if (res.length > 0) {
                        for (i in res.amphur) {
                            amphur.append($('<option>').val(res.amphur[i].ID).html('อำเภอ ' + res.amphur[i].NAME));
                        }
                    }
                }
            });
        }
    }

    function bindWorkTambon(amphurID = ''){
        var tambon = $('#WorkTambonID');
        tambon.empty();
        tambon.html($('<option>').val('').html('เลือกตำบล'));
        if(amphurID != ''){
            $.ajax({
                method: "GET",
                url: "<?php echo api_url('Common/tambon') ?>",
                data: {'AmphurID': amphurID},
                success: function(res) {
                    if (res.length > 0) {
                        for (i in res.tambon) {
                            tambon.append($('<option data-postcode="' + res.tambon[i].POSTCODE + '">').val(res.tambon[i].ID).html('ตำบล ' + res.tambon[i].NAME));
                        }
                    }
                }
            });
        }
    }

    function bindCourceProvince() {
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/province') ?>",
            success: function(res) {

                var prov = $('#CourceProvinceID');
                prov.empty();
                prov.html($('<option>').val('').html('เลือกจังหวัด'));
                if (res.length > 0) {
                    for (i in res.province) {
                        prov.append($('<option>').val(res.province[i].ID).html('จังหวัด ' + res.province[i].NAME));
                    }
                }
            }
        });
    }

    function bindCourceAmphur(provinceID = ''){
        var amphur = $('#CourceAmphurID');
        amphur.empty();
        amphur.html($('<option>').val('').html('เลือกอำเภอ'));
        if(provinceID != ''){
            $.ajax({
                method: "GET",
                url: "<?php echo api_url('Common/amphur') ?>",
                data: {'ProvinceID': provinceID},
                success: function(res) {
                    if (res.length > 0) {
                        for (i in res.amphur) {
                            amphur.append($('<option>').val(res.amphur[i].ID).html('อำเภอ ' + res.amphur[i].NAME));
                        }
                    }
                }
            });
        }
    }

    function bindLecturerType(){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/lecturerType') ?>",
            success: function(res) {
                var lecturerType = $('#LecturerTypeID');
                
                lecturerType.empty();
                lecturerType.html($('<option>').val('').html('เลือกประเภทวิทยากร'));
                if (res.length > 0) {
                    for (i in res.data) {
                        lecturerType.append($('<option>').val(res.data[i].LecturerTypeID).html(res.data[i].LecturerTypeName));
                    }
                }
            }
        });
    }

    function bindDegree(){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/degree') ?>",
            data: {'DegreeType': 2},
            success: function(res) {
                var degree = $('#DegreeID');
                
                degree.empty();
                degree.html($('<option>').val('').html('เลือกวุฒิการศึกษา'));
                if (res.length > 0) {
                    for (i in res.data) {
                        degree.append($('<option>').val(res.data[i].DegreeID).html(res.data[i].DegreeName));
                    }
                }
            }
        });
    }

</script>