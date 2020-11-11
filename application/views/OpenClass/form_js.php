<script>
    $(function() {
        // postData();
        initControl();
        bindProvince();
        bindBirthProvince();
        bindAmphur();
        bindTambon();
        bindNFETambon();
        bindCareerType();
        bindBudgetType();
        bindLecturer();
    });

    function initControl() {
        $('#formOpenClass_Home').submit(function(e) {   
            e.preventDefault();
            var data = new FormData(this);
            postData(data);
        });
        $('#formOpenClass_lecturer').submit(function(e) {   
            e.preventDefault();
            var data = new FormData(this);
            postData(data);
        });
        $('#formOpenClass_Profile').submit(function(e) {   
            e.preventDefault();
            var data = new FormData(this);
            postData(data);
        });
        $('#formOpenClass_Trace').submit(function(e) {   
            e.preventDefault();
            var data = new FormData(this);
            postData(data);
        });
        $('#formOpenClass_Result').submit(function(e) {   
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

        $(document).ready(function() {


            var input_budget_box = '<input type="text" class="form-control" id="moneyOth_box" name="BudgetTypeID" placeholder="กรอกเงินสนับสนุนอื่นๆที่นี่" required>';
            var input_CareerID_box = '<input type="text" class="form-control" id="CareerOther" name="CareerOther" placeholder="กรอกอาชีพอื่นๆที่นี่" required>';
            var input_GroupTargetID_box = '<input type="text" class="form-control" id="GroupTargetOther" name="GroupTargetOther" placeholder="กรอกกลุ่มเป้าหมายอื่นๆที่นี่" required>';
            var input_InterestedByID_box = '<input type="text" class="form-control" id="InterestedByOther" name="InterestedByOther" placeholder="กรอกความสนใจอื่นๆที่นี่" required>';
            var input_PeopleStatusID_box = '<input type="text" class="form-control" id="PeopleStatusOther" name="PeopleStatusOther" placeholder="กรอกสถานะอื่นๆที่นี่" required>';
            var input_LecturerTypeOther_box = '<input type="text" class="form-control" id="LecturerTypeOther" name="LecturerTypeOther" placeholder="กรอกประเภทวิทยากรอื่นๆที่นี่" required>';
            var input_KnowledgeOther_box = '<input type="text" class="form-control" id="KnowledgeOther" name="KnowledgeOther" placeholder="กรอกอื่นๆที่นี่" required>';
            var input_WantToLearnOther_box = '<input type="text" class="form-control" id="WantToLearnOther" name="WantToLearnOther" placeholder="กรอกอื่นๆที่นี่" required>';
            var inpur_followDetil_box = '<input type="text" class="form-control" id="FollowDetail" name="FollowDetail" required>'
            var addCourseStr_attr_1   = 0 , addCourseStr_attr_2   = 1;
            var add_materials_attr_1  = 0 , add_materials_attr_2  = 1;
            var add_evaluation_attr_1 = 0 , add_evaluation_attr_2 = 1;
            var add_criteria_attr_1   = 0 , add_criteria_attr_2   = 1;
            var add_nfetable_attr_1   = 0 , add_nfetable_attr_2   = 1;
            var clk_mat = 0 ;
            var clk_evalue = 0 ;
            var clk_crt = 0 ;
            var clk_nfe = 0 ;

            $('[name="isExtendTime"]').change(function(e) {
                e.preventDefault();
                if ($(this).val() == 1) {
                    $(".lateTable").collapse('show');
                } else {
                    $(".lateTable").collapse('hide');
                }
            });

            $('[name="isProblem"]').change(function(e) {
                e.preventDefault();
                if ($(this).val() == 1) {
                    $(".coll_isProblem").collapse('show');
                } else {
                    $(".coll_isProblem").collapse('hide');
                }
            });

            $('[name="isHasFollow"]').change(function(e) {
                e.preventDefault();
                if ($(this).val() == 1) {
                    $(".coll_bc0").collapse('hide');
                    $(".coll_followDetil0").collapse('hide');
                    // e.preventDefault(); $("#FollowDetail").remove();

                    $(".coll_bc1").collapse('show');
                    $(".coll_followDetil1").collapse('show');
                    // $(".coll_followDetil1").append(inpur_followDetil_box);
                } else {
                    $(".coll_bc1").collapse('hide');
                    $(".coll_followDetil1").collapse('hide');
                    // e.preventDefault(); $("#FollowDetail").remove();

                    $(".coll_bc0").collapse('show');
                    $(".coll_followDetil0").collapse('show');
                    // $(".coll_followDetil0").append(inpur_followDetil_box);
                }
            });
            
            $("#budgetTypeID").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "4") {
                    $(".coll_budget").collapse('show');
                    $(".coll_budget").append(input_budget_box);
                } else {
                    $(".coll_budget").collapse('hide');
                    e.preventDefault(); $("#moneyOth_box").remove();
                }
            });
            //--------------------
            // บันทึกประวัติ ผู้เรียน  
            // >>   อาชีพ
            $("#CareerID").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "") {
                    $(".coll_career").collapse('show');
                    $(".coll_career").append(input_CareerID_box);
                } else {
                    $(".coll_career").collapse('hide');
                    e.preventDefault(); $("#CareerOther").remove();
                }
            });
            //--------------------
            // บันทึกประวัติผู้เรียน  
            // >>   กลุ่มเป้าหมาย
            $("#GroupTargetID").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "17") {
                    $(".coll_groupTar").collapse('show');
                    $(".coll_groupTar").append(input_GroupTargetID_box);
                } else {
                    $(".coll_groupTar").collapse('hide');
                    e.preventDefault(); $("#GroupTargetOther").remove();
                }
            });
            //--------------------
            // บันทึกประวัติผู้เรียน  
            // >>   สนใจเข้าร่วมกิจรรมเนื่องจาก
            $("#InterestedByID").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "5") {
                    $(".coll_interest").collapse('show');
                    $(".coll_interest").append(input_InterestedByID_box);
                } else {
                    $(".coll_interest").collapse('hide');
                    e.preventDefault(); $("#InterestedByOther").remove();
                }
            });
            //--------------------
            // บันทึกประวัติผู้เรียน  
            // >>   สถานะ
            $("#PeopleStatusID").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "8") {
                    $(".coll_status").collapse('show');
                    $(".coll_status").append(input_PeopleStatusID_box);
                } else {
                    $(".coll_status").collapse('hide');
                    e.preventDefault(); $("#PeopleStatusOther").remove();
                }
            });
            //--------------------
            // บันทึกข้อมูลวิทยากร 
            // >>   ประเภทวิทยากร
            $("#LecturerTypeID").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "4") {
                    $(".coll_lacturerType").collapse('show');
                    $(".coll_lacturerType").append(input_LecturerTypeOther_box);
                } else {
                    $(".coll_lacturerType").collapse('hide');
                    e.preventDefault(); $("#LecturerTypeOther").remove();
                }
            });
            //--------------------
            // ผลการเรียน
            // >>   ผู้ผ่านการอบรมได้นำความรู้ไปใช้จริง
            $("#KnowledgeID").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "11") {
                    $(".coll_Knowledge").collapse('show');
                    $(".coll_Knowledge").append(input_KnowledgeOther_box);
                } else {
                    $(".coll_Knowledge").collapse('hide');
                    e.preventDefault(); $("#KnowledgeOther").remove();
                }
            });
            //--------------------
            //  ผลการเรียน
            // >>   สำรวจความต้องการเรียน
            $("#WantToLearnID").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "4") {
                    $(".coll_wantToLearn").collapse('show');
                    $(".coll_wantToLearn").append(input_WantToLearnOther_box);
                } else {
                    $(".coll_wantToLearn").collapse('hide');
                    e.preventDefault(); $("#WantToLearnOther").remove();
                }
            });

            $(".add-tb").click(function(e){
                e.preventDefault();
                var sw_value= $(this).val();

                switch (sw_value) {
                    case 'addCourseStr':
                            $("#course-str"+addCourseStr_attr_1).clone().appendTo('.main-co-str');

                            if(addCourseStr_attr_1 >= 0){
                            $("#course-str"+addCourseStr_attr_1).attr("id","course-str" + addCourseStr_attr_2);
                            $("#stuctName"+addCourseStr_attr_1).attr({"id":"stuctName" + addCourseStr_attr_2,"name":"CourseStructure[" + addCourseStr_attr_1 + "][Topic]"});
                            $("#stuctName"+addCourseStr_attr_1).attr({"id":"stuctName" + addCourseStr_attr_2,"name":"CourseStructure[" + addCourseStr_attr_1 + "][Objective]"});
                            $("#stuctName"+addCourseStr_attr_1).attr({"id":"stuctName" + addCourseStr_attr_2,"name":"CourseStructure[" + addCourseStr_attr_1 + "][Content]"});
                            $("#stuctName"+addCourseStr_attr_1).attr({"id":"stuctName" + addCourseStr_attr_2,"name":"CourseStructure[" + addCourseStr_attr_1 + "][LearningProcess]"});
                            $("#stuctName"+addCourseStr_attr_1).attr({"id":"stuctName" + addCourseStr_attr_2,"name":"CourseStructure[" + addCourseStr_attr_1 + "][TheoryTime]"});
                            $("#stuctName"+addCourseStr_attr_1).attr({"id":"stuctName" + addCourseStr_attr_2,"name":"CourseStructure[" + addCourseStr_attr_1 + "][PracticeTime]"}); 

                            addCourseStr_attr_1 += 1;
                            addCourseStr_attr_2 += 1;
                            }

                        break;
                    
                    case 'add_materials':
                            $("#mtr_tb"+clk_mat).clone().appendTo('.main-materials');
                            $("#mtr_tb"+clk_mat).attr("id","mtr_tb" + (clk_mat + 1));

                            $("#mtr"+add_materials_attr_1).attr({"id":"mtr" + add_materials_attr_2,"name":"LearningMaterial[" + add_materials_attr_2 + "][Name]"});
                            $("#mtr_tb"+add_materials_attr_1).addClass("pt-3");
                            // $("#mtr"+add_materials_attr_1).attr("class", "col-md-11 pt-3");

                            add_materials_attr_1 += 1;
                            add_materials_attr_2 += 1;
                            clk_mat +=1 ;

                        break;
                    case 'add_evaluation':
                            $("#evalue"+clk_evalue).clone().appendTo('.main-evalue');
                            $("#evalue"+clk_evalue).attr("id","evalue" + (clk_evalue + 1));
                            
                            $("#evl"+add_evaluation_attr_1).attr({"id":"evl" + add_evaluation_attr_2,"name":"Evaluate[" + add_evaluation_attr_2 + "][Detail]"});
                            $("#evalue"+add_evaluation_attr_1).addClass("pt-3");

                            add_evaluation_attr_1 += 1;
                            add_evaluation_attr_2 += 1;
                            clk_evalue +=1 ;

                        break;
                    case 'add_criteria':
                            $("#criteria"+clk_crt).clone().appendTo('.main-crt');
                            $("#criteria"+clk_crt).attr("id","criteria" + (clk_crt + 1));
                            
                            $("#crt"+add_criteria_attr_1).attr({"id":"crt" + add_criteria_attr_2,"name":"CriteriaComplete[" + add_criteria_attr_2 + "][Detail]"});
                            $("#criteria"+add_criteria_attr_1).addClass("pt-3");

                            add_criteria_attr_1 += 1;
                            add_criteria_attr_2 += 1;
                            clk_crt +=1 ;

                        break;
                    case 'add_nfetable':
                            $("#nfe-tb"+clk_nfe).clone().appendTo('.main-nfetb');
                            $("#nfe-tb"+clk_nfe).attr("id","nfe-tb" + (clk_nfe + 1));

                            $("#nfeTable"+add_nfetable_attr_1).attr({"id":"nfeTable" + add_nfetable_attr_2,"name":"ClassDetail[" + add_nfetable_attr_2 + "][LearningDateTime]"});
                            $("#nfeTable"+add_nfetable_attr_1).attr({"id":"nfeTable" + add_nfetable_attr_2,"name":"ClassDetail[" + add_nfetable_attr_2 + "][LearningDetail]"});
                            $("#nfeTable"+add_nfetable_attr_1).attr({"id":"nfeTable" + add_nfetable_attr_2,"name":"ClassDetail[" + add_nfetable_attr_2 + "][Remark]"});

                            add_nfetable_attr_1 += 1;
                            add_nfetable_attr_2 += 1;
                            clk_nfe += 1 ;
                        break;
                }
            });
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

    function bindProvince() {
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('OpenClass/province') ?>",
            success: function(res) {

                var prov = $('#ProvinceID');
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

    function bindBirthProvince() {
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('OpenClass/province') ?>",
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

                var nfeTambon = $('#TambonID');
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