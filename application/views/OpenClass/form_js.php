<script>
    $(function() {
        // ---- OpenClass -------
        initControl();
        var ClassID = '<?php echo @$ClassID; ?>';
        if(ClassID != ''){
            bindData();
        }else{
            initBindListAll();
            bindBirthProvince();
            bindPlaceProvince();
            bindPlaceAmphur();
            bindPlaceTambon();
            bindNFETambon();
            bindCareerType();
            bindBudgetType();
            bindLecturer();

            // ----- Student -------
            bindStudentProvince();
            bindStudentAmphur();
            bindStudentTambon();
            bindPrefix();
            bindCareer();
            bindGroupTarget();
            bindDegree();
            bindSchoolProvince();
            bindInterestBy();
            bindPeopleStatus();
        }
    });

    function initControl() {

        $(document).on('change', '#PlaceProvince', function(){
            bindPlaceAmphur($(this).val());
        });

        $(document).on('change', '#PlaceAmphur', function(){
            bindPlaceTambon($(this).val());
        });

        $(document).on('change', '[name="CareerID"]', function(){
            if($(this).val() == 9){
                $('.career-other').remove();
                $(this).closest('.form-group').after($('<div class="form-group career-other pr-4">').html('<label class="font-weight-bold" for="CareerOther">อาชีพอื่นๆ <span class="text-danger">*</span></label><input type="text" class="form-control" id="CareerOther" name="CareerOther" maxlength="50" required>'));
            }else{
                $('.career-other').remove();
            }
        });

        $(document).on('change', '[name="GroupTargetID"]', function(){
            if($(this).val() == 17){
                $('.group-target-other').remove();
                $(this).closest('.form-group').after($('<div class="form-group group-target-other pr-4">').html('<label class="font-weight-bold" for="GroupTargetOther">กลุ่มเป้าหมายอื่นๆ <span class="text-danger">*</span></label><input type="text" class="form-control" id="GroupTargetOther" name="GroupTargetOther" maxlength="50" required>'));
            }else{
                $('.group-target-other').remove();
            }
        });

        $(document).on('change', '[name="InterestByID"]', function(){
            if($(this).val() == 5){
                $('.interest-by-other').remove();
                $(this).closest('.form-group').after($('<div class="form-group interest-by-other pr-4">').html('<label class="font-weight-bold" for="InterestByOther">เหตุผลที่สนใจแบบอื่น <span class="text-danger">*</span></label><input type="text" class="form-control" id="InterestByOther" name="InterestByOther" maxlength="50" required>'));
            }else{
                $('.interest-by-other').remove();
            }
        });

        $(document).on('change', '[name="PeopleStatusID"]', function(){
            if($(this).val() == 8){
                $('.people-status-other').remove();
                $(this).closest('.form-group').after($('<div class="form-group people-status-other pr-4">').html('<label class="font-weight-bold" for="PeopleStatusOther">สถานภาพอื่นๆ <span class="text-danger">*</span></label><input type="text" class="form-control" id="PeopleStatusOther" name="PeopleStatusOther" maxlength="50" required>'));
            }else{
                $('.people-status-other').remove();
            }
        });

        $(document).on('change', '#StudentProvince', function(){
            bindStudentAmphur($(this).val());
        });

        $(document).on('change', '#StudentAmphur', function(){
            bindStudentTambon($(this).val());
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

        $(document).on('click', '.add-course-structure', function(){
            bindCourseStructure();
        });

        $(document).on('click', '.removeCourseStructure', function(){
            var index = $(this).data('index');
            $('#CourseStructure .callout[data-index=' + index + ']').remove();
        });

        $(document).on('click', '.add-class-detail', function(){
            bindClassDetail();
        });

        $(document).on('click', '.removeClassDetail', function(){
            var index = $(this).data('index');
            $('#ClassDetail .callout[data-index=' + index + ']').remove();
        });

        $(document).on('click', '.add-learning-material', function(){
            bindLearningMaterial();
        });

        $(document).on('click', '.removeLearningMaterial', function(){
            var index = $(this).data('index');
            $('#LearningMaterial .row[data-index=' + index + ']').remove();
        });

        $(document).on('click', '.add-evaluate', function(){
            bindEvaluate();
        });

        $(document).on('click', '.removeEvaluate', function(){
            var index = $(this).data('index');
            $('#Evaluate .row[data-index=' + index + ']').remove();
        });

        $(document).on('click', '.add-criteria-complete', function(){
            bindCriteriaComplete();
        });

        $(document).on('click', '.removeCriteriaComplete', function(){
            var index = $(this).data('index');
            $('#CriteriaComplete .row[data-index=' + index + ']').remove();
        });

        $(document).on('change', '[name="BudgetTypeID"]', function(){
            if($(this).val() == 4){
                $('.budget-other').remove();
                $(this).closest('.row').after($('<div class="form-group budget-other">').html('<label class="font-weight-bold" for="OtherBudget">งบประมาณที่ใช้อื่นๆ <span class="text-danger">*</span></label><input type="text" class="form-control" id="OtherBudget" name="OtherBudget" required>'));
            }else{
                $('.budget-other').remove();
            }
        });

        $(document).on('change', '[name="isExtendTime"]', function(){
            if ($(this).val() == 1) {
                $('.lateTable').collapse('show');
                $('.lateTable input').attr('required', 'required');
            } else {
                $('.lateTable').collapse('hide');
                $('.lateTable input').removeAttr('required');
            }
        });

        $('#formOpenClass').submit(function(e){
            e.preventDefault();
            var data = new FormData(this);
            saveDataClass(data);
        });

        $('#formStudent').submit(function(e){
            e.preventDefault();
            saveDataStudent($(this).serialize());
        });
    }

    function saveDataClass(data) {
        $.ajax({
            method: "POST",
            url: "<?php echo api_url('OpenClass/saveData') ?>",
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            dataType:"json",
            success: function(res) {
                Swal.fire({
                    icon: 'success',
                    title: 'ข้อความจากระบบ',
                    text: 'เพิ่มข้อมูลสำเร็จ โปรดกรอกข้อมูลประวัติผู้เรียนต่อ',
                }).then((result) => {
                    $('#opren-class-tab').removeClass('active');
                    $('#student-tab').addClass('active');
                    $('#student-tab').removeClass('disabled');
                    $('#opren-class').removeClass('show active');
                    $('#student').addClass('show active');
                    $('[name="ClassID"]').val(res.id);
                });
            }
        });
    }

    function saveDataStudent(data) {
        $.ajax({
            method: "POST",
            url: "<?php echo api_url('Student/saveDataStudentClass') ?>",
            data: data,
            dataType:"json",
            success: function(res) {
                Swal.fire({
                    icon: 'success',
                    title: 'ข้อความจากระบบ',
                    text: 'เพิ่มข้อมูลสำเร็จ ถ้าบันทึกประวัติผู้เรียนครบแล้ว โปรดบันทึกข้อมูลนิเทศ/ติดตามผลต่อ',
                }).then((result) => {
                    bindDatatableStudent($('[name="ClassID"]').val());
                });
            }
        });
    }

    function bindData() {
        $.ajax({
            method: "POST",
            url: "<?php echo api_url('OpenClass/getDetailOpenClass') ?>",
            data: { 'ClassID': $('[name="ClassID"]').val() },
            success: function(res) {
                if(res.data != null){
                    $('#formOpenClass').loadJSON(res.data);
                    bindPlaceProvince(res.data.PlaceProvince);
                    bindPlaceAmphur(res.data.PlaceProvince, res.data.PlaceAmphur);
                    bindPlaceTambon(res.data.PlaceAmphur, res.data.PlaceTambon);
                    bindCareerType(res.data.CareerTypeID);
                    bindNFETambon(res.data.NFETambonID);
                    bindBudgetType(res.data.BudgetTypeID);
                    bindBudgetType(res.data.BudgetTypeID);
                    bindLecturer(res.data.LecturerID);

                    $('.custom-file').before('<img src="<?php echo ASSETS_IMG; ?>/PlaceImage/' + res.data.PlaceImage + '" style="width:100%;" class="mb-2">');

                    var days = res.data.ClassDays.split(',');
                    $.each(days, function(i, v){
                        $('[name="ClassDays[]"][value="' + v + '"]').prop('checked', true);
                    });

                    if(res.isExtendTime == null){
                        $('[name="isExtendTime"][value="0"]').prop('checked', true);
                    }else{
                        $('[name="isExtendTime"][value="1"]').prop('checked', true);
                    }
                }

                bindCourseStructure(res.data.CourseStructure);
                $('#CourseStructure .callout:first-child .removeCourseStructure').hide();

                bindClassDetail(res.data.ClassDetail);
                $('#ClassDetail .callout:first-child .removeClassDetail').hide();

                bindLearningMaterial(res.data.LearningMaterial);
                $('#LearningMaterial .row:first-child .removeLearningMaterial').hide();

                bindEvaluate(res.data.Evaluate);
                $('#Evaluate .row:first-child .removeEvaluate').hide();

                bindCriteriaComplete(res.data.CriteriaComplete);
                $('#CriteriaComplete .row:first-child .removeCriteriaComplete').hide();

                bindDataStudent(res.Student);
            }
        });
    }

    function initBindListAll(){
        bindCourseStructure();
        $('#CourseStructure .callout:first-child .removeCourseStructure').hide();

        bindClassDetail();
        $('#ClassDetail .callout:first-child .removeClassDetail').hide();

        bindLearningMaterial();
        $('#LearningMaterial .row:first-child .removeLearningMaterial').hide();

        bindEvaluate();
        $('#Evaluate .row:first-child .removeEvaluate').hide();

        bindCriteriaComplete();
        $('#CriteriaComplete .row:first-child .removeCriteriaComplete').hide();
    }

    function bindCourseStructure(data = {}){
        var index = $('#CourseStructure .callout').length;
        
        if(Object.keys(data).length > 0){
            $.each(data, function(i,v){
                v.index = i;
            })
        }else{
            data.index = index;
            data.TheoryTime = '';
            data.PracticeTime = '';
        }
        
        var $template = $('#CourseStructureTemp').tmpl(data);
        $("#CourseStructure").append($template);
    }

    function bindClassDetail(data = {}){
        var index = $('#ClassDetail .callout').length;
        
        if(Object.keys(data).length > 0){
            $.each(data, function(i,v){
                v.index = i;
            })
        }else{
            data.index = index;
        }
        
        var $template = $('#ClassDetailTemp').tmpl(data);
        $("#ClassDetail").append($template);
    }

    function bindLearningMaterial(data = {}){
        var index = $('#LearningMaterial .row').length;
        
        if(Object.keys(data).length > 0){
            $.each(data, function(i,v){
                v.index = i;
            })
        }else{
            data.index = index;
        }
        
        var $template = $('#LearningMaterialTemp').tmpl(data);
        $("#LearningMaterial").append($template);
    }

    function bindEvaluate(data = {}){
        var index = $('#Evaluate .row').length;
        
        if(Object.keys(data).length > 0){
            $.each(data, function(i,v){
                v.index = i;
            })
        }else{
            data.index = index;
        }
        
        var $template = $('#EvaluateTemp').tmpl(data);
        $("#Evaluate").append($template);
    }

    function bindCriteriaComplete(data = {}){
        var index = $('#CriteriaComplete .row').length;
        
        if(Object.keys(data).length > 0){
            $.each(data, function(i,v){
                v.index = i;
            })
        }else{
            data.index = index;
        }
        
        var $template = $('#CriteriaCompleteTemp').tmpl(data);
        $("#CriteriaComplete").append($template);
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

    function bindPlaceProvince(ProvinceID = '') {
        var prov = $('#PlaceProvince');
        prov.empty();
        prov.html($('<option>').val('').html('เลือกจังหวัด'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/province') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.province) {
                        prov.append($('<option>').val(res.province[i].ID).html('จังหวัด ' + res.province[i].NAME));
                    }
                }
                if(ProvinceID != ''){
                    prov.val(ProvinceID);
                }
            }
        });
    }

    function bindPlaceAmphur(provinceID = '', AmphurID = ''){
        var amphur = $('#PlaceAmphur');
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
                    if(AmphurID != ''){
                        amphur.val(AmphurID);
                    }
                }
            });
        }
    }

    function bindPlaceTambon(amphurID = '', TambonID = ''){
        var tambon = $('#PlaceTambon');
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
                            tambon.append($('<option>').val(res.tambon[i].ID).html('ตำบล ' + res.tambon[i].NAME));
                        }
                    }
                    if(TambonID != ''){
                        tambon.val(TambonID);
                    }
                }
            });
        }
    }

    function bindNFETambon(NFETambonID){
        var nfeTambon = $('#NFETambonID');
        var StudentNFETombonID = $('#CurrentNFETombonID');
        nfeTambon.empty();
        StudentNFETombonID.empty();
        nfeTambon.html($('<option>').val('').html('เลือกกศน.ตำบล'));
        StudentNFETombonID.html($('<option>').val('').html('เลือกกศน.ตำบล'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('NFETambon/getData') ?>",
            data: {
                'OrganizationLavel': '1,2'
            },
            success: function(res) {
                var data_nfeTambon = res.data;
                if (res.length > 0) {
                    for (i in data_nfeTambon) {
                        nfeTambon.append($('<option>').val(data_nfeTambon[i].OrganizationID).html(data_nfeTambon[i].OrganizationNameTH));
                        StudentNFETombonID.append($('<option>').val(data_nfeTambon[i].OrganizationID).html(data_nfeTambon[i].OrganizationNameTH));
                    }
                }
                if(NFETambonID != ''){
                    nfeTambon.val(NFETambonID);
                }
            }
        });
    }

    function bindCareerType(CareerTypeID){
        var occType = $('#occType');
        occType.empty();
        occType.html($('<option>').val('').html('เลือกหมวดอาชีพ'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('CareerType/getData') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        occType.append($('<option>').val(res.data[i].CareerTypeID).html(res.data[i].CareerTypeName));
                    }
                }
                if(CareerTypeID != ''){
                    occType.val(CareerTypeID);
                }
            }
        });
    }

    function bindBudgetType(BudgetTypeID){
        var budget = $('#BudgetTypeID');
        budget.empty();
        budget.html($('<option>').val('').html('เลือกงบประมาณที่ใช้'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('BudgetType/getData') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        budget.append($('<option>').val(res.data[i].BudgetTypeID).html(res.data[i].BudgetTypeName));
                    }
                }
                if(BudgetTypeID != ''){
                    budget.val(BudgetTypeID);
                }
            }
        });
    }

    function bindLecturer(LecturerID){
        var lecturer = $('#LecturerID');
        lecturer.empty();
        lecturer.html($('<option>').val('').html('เลือกวิทยากร'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Lecturer/getData') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        lecturer.append($('<option>').val(res.data[i].LecturerID).html(res.data[i].LecturerName));
                    }
                }
                if(LecturerID != ''){
                    lecturer.val(LecturerID);
                }
            }
        });
    }

    function bindStudentProvince() {
        var prov = $('#StudentProvince');
        prov.empty();
        prov.html($('<option>').val('').html('เลือกจังหวัด'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/province') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.province) {
                        prov.append($('<option>').val(res.province[i].ID).html('จังหวัด ' + res.province[i].NAME));
                    }
                }
            }
        });
    }

    function bindStudentAmphur(provinceID = ''){
        var amphur = $('#StudentAmphur');
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

    function bindStudentTambon(amphurID = ''){
        var tambon = $('#StudentTambon');
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
                            tambon.append($('<option>').val(res.tambon[i].ID).html('ตำบล ' + res.tambon[i].NAME));
                        }
                    }
                }
            });
        }
    }

    function bindPrefix() {
        var prefix = $('#PrefixID');
        prefix.empty();
        prefix.html($('<option>').val('').html('เลือกคำนำหน้าชื่อ'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/prefix') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        prefix.append($('<option>').val(res.data[i].PrefixID).html(res.data[i].PrefixName));
                    }
                }
            }
        });
    }

    function bindCareer() {
        var career = $('#CareerID');
        career.empty();
        career.html($('<option>').val('').html('เลือกอาชีพ'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/career') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        career.append($('<option>').val(res.data[i].CareerID).html(res.data[i].CareerName));
                    }
                }
            }
        });
    }

    function bindGroupTarget() {
        var groupTarget = $('#GroupTargetID');
        groupTarget.empty();
        groupTarget.html($('<option>').val('').html('เลือกกลุ่มเป้าหมาย'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/GroupTarget') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        groupTarget.append($('<option>').val(res.data[i].GroupTargetID).html(res.data[i].GroupTargetName));
                    }
                }
            }
        });
    }

    function bindDegree() {
        var degree = $('#DegreeID');
        degree.empty();
        degree.html($('<option>').val('').html('เลือกวุฒิการศึกษา'));
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/Degree') ?>",
            data: {
                'DegreeType': 1
            },
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        degree.append($('<option>').val(res.data[i].DegreeID).html(res.data[i].DegreeName));
                    }
                }
            }
        });
    }

    function bindSchoolProvince() {
        var prov = $('#SchoolProvinceID');
        prov.empty();
        prov.html($('<option>').val('').html('เลือกจังหวัดสถานศึกษา'));

        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/province') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.province) {
                        prov.append($('<option>').val(res.province[i].ID).html('จังหวัด ' + res.province[i].NAME));
                    }
                }
            }
        });
    }

    function bindInterestBy() {
        var interestBy = $('#InterestByID');
        interestBy.empty();
        interestBy.html($('<option>').val('').html('เลือกเหตุผลที่สนใจ'));

        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/InterestBy') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        interestBy.append($('<option>').val(res.data[i].InterestedByID).html(res.data[i].InterestedByName));
                    }
                }
            }
        });
    }

    function bindPeopleStatus() {
        var peopleStatus = $('#PeopleStatusID');
        peopleStatus.empty();
        peopleStatus.html($('<option>').val('').html('เลือกสถานภาพ'));

        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Common/PeopleStatus') ?>",
            success: function(res) {
                if (res.length > 0) {
                    for (i in res.data) {
                        peopleStatus.append($('<option>').val(res.data[i].PeopleStatusID).html(res.data[i].PeopleStatusName));
                    }
                }
            }
        });
    }

    function bindDatatableStudent(){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Student/getStudentClass') ?>",
            success: function(res) {
                bindDataStudent(res.data);
            }
        });
    }

    function bindDataStudent(data){

    }

</script>

<script id="CourseStructureTemp" type="text/template">
    <div class="callout" data-index="${index}">
        <div class="text-right"><a href="javascript:void(0)" class="removeCourseStructure" data-index="${index}"><i class="fas fa-times-circle text-danger"></i></a></div>
        <div class="row">
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">เรื่อง <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][Topic]" value="${Topic}" maxlength="100" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">จุดประสงค์การเรียนรู้ <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][Objective]" value="${Objective}" maxlength="255" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">เนื้อหา <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][Content]" value="${Content}" maxlength="255" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">การจัดกระบวนการเรียนรู้ <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][LearningProcess]" value="${LearningProcess}" maxlength="255" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">จำนวนชั่วโมงภาคทฤษฎี <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][TheoryTime]" value="${TheoryTime}" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">จำนวนชั่วโมงภาคปฎิบัติ <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][PracticeTime]" value="${PracticeTime}" required>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</script>

<script id="ClassDetailTemp" type="text/template">
    <div class="callout" data-index="${index}">
        <div class="text-right"><a href="javascript:void(0)" class="removeClassDetail" data-index="${index}"><i class="fas fa-times-circle text-danger"></i></a></div>
        <div class="row">
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">วันที่ และเวลา <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="ClassDetail[${index}][LearningDateTime]" value="${LearningDateTime}" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">กระบวนการจัดการเรียนรู้ <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="ClassDetail[${index}][LearningDetail]" value="${LearningDetail}" maxlength="100" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">หมายเหตุ</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="ClassDetail[${index}][Remark]" value="${Remark}" maxlength="150">
                    </div>
                </div>
            </div>                                        
        </div>
    </div>
</script>

<script id="LearningMaterialTemp" type="text/template">
    <div class="row mb-2" data-index="${index}">
        <div class="col-md-11">
            <input type="text" class="form-control" name="LearningMaterial[${index}][LearningMaterialName]" maxlength="50" value="${LearningMaterialName}" required>
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <a href="javascript:void(0)" class="removeLearningMaterial" data-index="${index}">
                <i class="fas fa-times-circle text-danger"></i>
            </a>
        </div>
    </div>
</script>

<script id="EvaluateTemp" type="text/template">
    <div class="row mb-2" data-index="${index}">
        <div class="col-md-11">
            <input type="text" class="form-control" name="Evaluate[${index}][EvaluateDetail]" maxlength="100" value="${EvaluateDetail}" required>
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <a href="javascript:void(0)" class="removeEvaluate" data-index="${index}">
                <i class="fas fa-times-circle text-danger"></i>
            </a>
        </div>
    </div>
</script>

<script id="CriteriaCompleteTemp" type="text/template">
    <div class="row mb-2" data-index="${index}">
        <div class="col-md-11">
            <input type="text" class="form-control" name="CriteriaComplete[${index}][CriteriaCompleteName]" maxlength="100" value="${CriteriaCompleteName}" required>
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <a href="javascript:void(0)" class="removeCriteriaComplete" data-index="${index}">
                <i class="fas fa-times-circle text-danger"></i>
            </a>
        </div>
    </div>
</script>