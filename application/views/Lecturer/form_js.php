<script>
    $(function() {
        // postData();
        initControl();
        bindProvince();
        bindAmphur();
        bindTambon();
        bindNFETambon();
        bindCareerType();
        bindBudgetType();
        bindLecturer();

        bindData();
    });

    function initControl() {
        $('#formSaveData').submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            postData(data);
        });

        $(document).on('change', '#province', function(){
            bindAmphur($(this).val());
        });

        $(document).on('change', '#amphur', function(){
            bindTambon($(this).val());
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
            $('#ClassDetail .row[data-index=' + index + ']').remove();
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

        $('#formOpenClass').submit(function(){
            console.log(12);
        });
    }

    function postData(data) {
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
                    text: 'เพิ่มข้อมูลสำเร็จ',
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

                bindCourseStructure(res);
                $('#CourseStructure .callout:first-child .removeCourseStructure').hide();

                bindClassDetail(res);
                $('#ClassDetail .callout:first-child .removeClassDetail').hide();

                bindLearningMaterial(res);
                $('#LearningMaterial .row:first-child .removeLearningMaterial').hide();

                bindEvaluate(res);
                $('#Evaluate .row:first-child .removeEvaluate').hide();

                bindCriteriaComplete(res);
                $('#CriteriaComplete .row:first-child .removeCriteriaComplete').hide();
            }
        });
    }

    function bindCourseStructure(data = {}){
        var index = $('#CourseStructure .callout').length;
        data['index'] = index;
        
        var $template = $('#CourseStructureTemp').tmpl(data);
        $("#CourseStructure").append($template);
    }

    function bindClassDetail(data = {}){
        var index = $('#ClassDetail .callout').length;
        data['index'] = index;
        
        var $template = $('#ClassDetailTemp').tmpl(data);
        $("#ClassDetail").append($template);
    }

    function bindLearningMaterial(data = {}){
        var index = $('#LearningMaterial .row').length;
        data['index'] = index;
        
        var $template = $('#LearningMaterialTemp').tmpl(data);
        $("#LearningMaterial").append($template);
    }

    function bindEvaluate(data = {}){
        var index = $('#Evaluate .row').length;
        data['index'] = index;
        
        var $template = $('#EvaluateTemp').tmpl(data);
        $("#Evaluate").append($template);
    }

    function bindCriteriaComplete(data = {}){
        var index = $('#CriteriaComplete .row').length;
        data['index'] = index;
        
        var $template = $('#CriteriaCompleteTemp').tmpl(data);
        $("#CriteriaComplete").append($template);
    }

    function bindProvince() {
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('OpenClass/province') ?>",
            success: function(res) {

                var prov = $('#province');
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
        var amphur = $('#amphur');
        amphur.empty();
        amphur.html($('<option>').val('').html('เลือกอำเภอ'));
        if(provinceID != ''){
            $.ajax({
                method: "GET",
                url: "<?php echo api_url('OpenClass/amphur') ?>",
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
        var tambon = $('#tambon');
        tambon.empty();
        tambon.html($('<option>').val('').html('เลือกตำบล'));
        if(amphurID != ''){
            $.ajax({
                method: "GET",
                url: "<?php echo api_url('OpenClass/tambon') ?>",
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

    function bindNFETambon(data){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('NFETambon/getData') ?>",
            data: {
                'isActive': 1,
                'OrganizationLavel': '1,2',
                'Amphur': '<?php echo @$AmphurID; ?>'
            },
            success: function(res) {

                var nfeTambon = $('#nfeTambon');
                var data_nfeTambon = res.data;
                nfeTambon.empty();
                nfeTambon.html($('<option>').val('').html('เลือกกศน.ตำบล'));
                if (res.length > 0) {
                    for (i in data_nfeTambon) {
                        nfeTambon.append($('<option>').val(data_nfeTambon[i].OrganizationID).html(data_nfeTambon[i].OrganizationNameTH));
                    }
                }
            }
        });
    }

    function bindCareerType(data){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('CareerType/getData') ?>",
            success: function(res) {
                var occType = $('#occType');
                
                occType.empty();
                occType.html($('<option>').val('').html('เลือกหมวดอาชีพ'));
                if (res.length > 0) {
                    for (i in res.data) {
                        occType.append($('<option>').val(res.data[i].CareerTypeID).html(res.data[i].CareerTypeName));
                    }
                }
            }
        });
    }

    function bindBudgetType(data){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('BudgetType/getData') ?>",
            success: function(res) {
                var budget = $('#budget');
                
                budget.empty();
                budget.html($('<option>').val('').html('เลือกงบประมาณที่ใช้'));
                if (res.length > 0) {
                    for (i in res.data) {
                        budget.append($('<option>').val(res.data[i].BudgetTypeID).html(res.data[i].BudgetTypeName));
                    }
                }
            }
        });
    }

    function bindLecturer(data){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('Lecturer/getData') ?>",
            success: function(res) {
                var lecturer = $('#LecturerID');
                
                lecturer.empty();
                lecturer.html($('<option>').val('').html('เลือกวิทยากร'));
                if (res.length > 0) {
                    for (i in res.data) {
                        lecturer.append($('<option>').val(res.data[i].LecturerID).html(res.data[i].LecturerName));
                    }
                }
            }
        });
    }

</script>

<script id="CourseStructureTemp" type="text/template">
    <div class="callout" data-index="${index}">
        <div class="text-right removeCourseStructure" data-index="${index}"><a href="javascript:void(0)"><i class="fas fa-times-circle text-danger"></i></a></div>
        <div class="row">
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">เรื่อง <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][Topic]" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">จุดประสงค์การเรียนรู้ <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][Objective]" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">เนื้อหา <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][Content]" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">การจัดกระบวนการเรียนรู้ <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][LearningProcess]" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">จำนวนชั่วโมงภาคทฤษฎี <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][TheoryTime]" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">จำนวนชั่วโมงภาคปฎิบัติ <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="CourseStructure[${index}][PracticeTime]" required>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</script>

<script id="ClassDetailTemp" type="text/template">
    <div class="callout" data-index="${index}">
        <div class="text-right removeClassDetail" data-index="${index}"><a href="javascript:void(0)"><i class="fas fa-times-circle text-danger"></i></a></div>
        <div class="row">
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">วันที่ และเวลา <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="ClassDetail[${index}][LearningDateTime]" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">กระบวนการจัดการเรียนรู้ <span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="ClassDetail[${index}][LearningDetail]" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="from-group row">
                    <label class="font-weight-bold text-right col-md-5">หมายเหตุ</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="ClassDetail[${index}][Remark]">
                    </div>
                </div>
            </div>                                        
        </div>
    </div>
</script>

<script id="LearningMaterialTemp" type="text/template">
    <div class="row mb-2" data-index="${index}">
        <div class="col-md-11">
            <input type="text" class="form-control" name="LearningMaterial[${index}][Name]" required>
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
            <input type="text" class="form-control" name="Evaluate[${index}][Detail]" required>
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
            <input type="text" class="form-control" name="CriteriaComplete[${index}][Detail]" required>
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <a href="javascript:void(0)" class="removeCriteriaComplete" data-index="${index}">
                <i class="fas fa-times-circle text-danger"></i>
            </a>
        </div>
    </div>
</script>