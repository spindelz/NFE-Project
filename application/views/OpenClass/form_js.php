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

        $(document).ready(function() {

            var input_budget_box = '<input type="text" class="form-control" id="moneyOth_box" name="Budget" placeholder="กรอกเงินสนับสนุนอื่นๆที่นี่" required>';
            var addCourseStr_attr_1   = 1 , addCourseStr_attr_2   = 2;
            var add_materials_attr_1  = 1 , add_materials_attr_2  = 3;
            var add_evaluation_attr_1 = 1 , add_evaluation_attr_2 = 3;
            var add_criteria_attr_1   = 1 , add_criteria_attr_2   = 3;
            var add_nfetable_attr_1   = 1 , add_nfetable_attr_2   = 2;
            var clk_mat = 1 ;
            var clk_evalue = 1 ;
            var clk_crt = 1 ;
            var clk_nfe = 1 ;

            $('[name="isExtendTime"]').change(function(e) {
                e.preventDefault();
                if ($(this).val() == 1) {
                    $(".lateTable").collapse('show');
                } else {
                    $(".lateTable").collapse('hide');
                }
            });
            
            $("#budget").on('change',function(e) {
                e.preventDefault();
                if ($(this).val() == "") {
                    $(".coll_budget").collapse('show');
                    $(".coll_budget").append(input_budget_box);
                } else {
                    $(".coll_budget").collapse('hide');
                    e.preventDefault(); $("#moneyOth_box").remove();
                }
            });

            $(".add-tb").click(function(e){
                e.preventDefault();
                var sw_value= $(this).val();

                switch (sw_value) {
                    case 'addCourseStr':
                            $("#course-str"+addCourseStr_attr_1).clone().appendTo('.main-co-str');

                            if(addCourseStr_attr_1 > 0){
                            $("#course-str"+addCourseStr_attr_1).attr("id","course-str" + addCourseStr_attr_2);
                            $("#stuctName"+addCourseStr_attr_1).attr({"id":"stuctName" + addCourseStr_attr_2,"name":"stuctName" + addCourseStr_attr_2});
                            $("#stuctPurpose"+addCourseStr_attr_1).attr({"id":"stuctPurpose" + addCourseStr_attr_2,"name":"StructurePurpose" + addCourseStr_attr_2});
                            $("#stuctDescript"+addCourseStr_attr_1).attr({"id":"stuctDescript" + addCourseStr_attr_2,"name":"StructureDescription" + addCourseStr_attr_2});
                            $("#stuctMethod"+addCourseStr_attr_1).attr({"id":"stuctMethod" + addCourseStr_attr_2,"name":"StructureMethod" + addCourseStr_attr_2});
                            $("#stuctLec"+addCourseStr_attr_1).attr({"id":"stuctLec" + addCourseStr_attr_2,"name":"StructureLecture" + addCourseStr_attr_2});
                            $("#stuctLab"+addCourseStr_attr_1).attr({"id":"stuctLab" + addCourseStr_attr_2,"name":"StructureLab" + addCourseStr_attr_2}); 

                            addCourseStr_attr_1 += 1;
                            addCourseStr_attr_2 += 1;
                            }

                        break;
                    
                    case 'add_materials':
                            $("#mt-r"+clk_mat).clone().appendTo('.main-materials');
                            $("#mt-r"+clk_mat).attr("id","mt-r" + (clk_mat + 1));

                            var i=2;
                            while(i > 0){
                                $("#addmaterials"+add_materials_attr_1).attr({"id":"addmaterials" + add_materials_attr_2,"name":"Materials" + add_materials_attr_2});
                                
                                add_materials_attr_1 += 1;
                                add_materials_attr_2 += 1;
                                i-- ;
                            }
                            clk_mat +=1 ;
                        break;
                    case 'add_evaluation':
                            $("#evalue"+clk_evalue).clone().appendTo('.main-evalue');
                            $("#evalue"+clk_evalue).attr("id","evalue" + (clk_evalue + 1));
                            
                            var i=2;
                            while(i > 0){
                                $("#addevaluation"+add_evaluation_attr_1).attr({"id":"addevaluation" + add_evaluation_attr_2,"name":"Evaluation" + add_evaluation_attr_2});
                                
                                add_evaluation_attr_1 += 1;
                                add_evaluation_attr_2 += 1;
                                i-- ;
                            }
                            clk_evalue +=1 ;
                        break;
                    case 'add_criteria':
                            $("#crt"+clk_crt).clone().appendTo('.main-crt');
                            $("#crt"+clk_crt).attr("id","crt" + (clk_crt + 1));
                            
                            var i=2;
                            while(i > 0){
                                $("#addcriteria"+add_criteria_attr_1).attr({"id":"addcriteria" + add_criteria_attr_2,"name":"Criterion" + add_criteria_attr_2});
                                
                                add_criteria_attr_1 += 1;
                                add_criteria_attr_2 += 1;
                                i-- ;
                            }
                            clk_crt +=1 ;
                        break;
                    case 'add_nfetable':
                            $("#nfe-tb"+clk_nfe).clone().appendTo('.main-nfetb');
                            $("#nfe-tb"+clk_nfe).attr("id","nfe-tb" + (clk_nfe + 1));

                            $("#nfetable_day"+add_nfetable_attr_1).attr({"id":"nfetable_day" + add_nfetable_attr_2,"name":"nfeTable_Day" + add_nfetable_attr_2});
                            $("#nfetable_time"+add_nfetable_attr_1).attr({"id":"nfetable_time" + add_nfetable_attr_2,"name":"nfeTable_Time" + add_nfetable_attr_2});
                            $("#nfetable_manage"+add_nfetable_attr_1).attr({"id":"nfetable_manage" + add_nfetable_attr_2,"name":"nfeTable_Manage" + add_nfetable_attr_2});
                            $("#nfetable_note"+add_nfetable_attr_1).attr({"id":"nfetable_note" + add_nfetable_attr_2,"name":"nfeTable_Note" + add_nfetable_attr_2});

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