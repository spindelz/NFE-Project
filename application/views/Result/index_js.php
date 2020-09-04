<script>
    $(function(){
        bindSemestry();
        initControl();
    });

    function initControl(){
        $('#formSearch').submit(function(e){
            e.preventDefault();
            getData( $(this).serialize() );
        });

        $(document).on('click', '.btn-exam', function(){
            $('#OrderNumber').val('');
            getData($('#formSearch').serialize());
        });
    }

    function getData(data){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('Result/getData') ?>",
            data: data,
			success: function(res){

                if(res.semestry['Semestry'] == ''){
                    res.semestry['Semestry'] = 'ทั้งหมด' ;
                    $("#semestryCode").show();
                    bindData(res.data, 1);
                    $('#text-gpa').attr('colspan', '5');
                }else{
                    $("#semestryCode").hide();
                    bindData(res.data);
                    $('#text-gpa').attr('colspan', '4');
                }

                $('#SemestryTop').html((res.semestry['Semestry']));
                $('#GroupName').html((res.data[0]['GRP_NAME']));
                $('#TeacherName').html((res.data[0]['GRP_ADVIS']));
                
                $('#GPA').html(res.gpa);
            }
        });
    }

    function bindData(data, showSemestry){
        
        $('#datatable tbody').empty();
        if(data.length > 0){
            for(i in data){
                var str_table = '<tr>';
                str_table += '<td>' + (parseInt(i) + 1) + '</td>';
                if(showSemestry){
                    str_table += '<td>' + data[i].SEMESTRY + '</td>';
                }
                str_table += '<td>' + data[i].GRP_NAME + '</td>';
                str_table += '<td>' + data[i].SUB_NAME + '</td>';
                str_table += '<td>' + data[i].SUB_CREDIT + '</td>';
                str_table += '<td>' + data[i].GRADE + '</td>';
                str_table += '</tr>';

                $('#datatable tbody').append(str_table);
            }
        }else{
            var str_table = '<tr><td colspan="7" class="text-danger">ไม่มีข้อมูล</td></tr>';
            $('#datatable tbody').html(str_table);
        }
    }

    function bindSemestry(){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('ClassSchedule/getSemestry') ?>",
            data: {
            },
            
			success: function(res){
                var elm = $('#Semestry');
                var data = res.data;
                elm.empty();
                elm.html($('<option>').val('').html('ภาคเรียนทั้งหมด'));
                for(i in data){
                    elm.append($('<option>').val(data[i].SEMESTRY).html('ภาคเรียนที่ ' + data[i].SEMESTRY));
                }
                elm.val(data[0].SEMESTRY);
                getData($('#formSearch').serialize());
                
            }
        });
    }
</script>