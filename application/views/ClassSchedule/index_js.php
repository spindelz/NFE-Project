<script>
    $(function(){
        initControl();
        bindSemestry();
    });

    function initControl(){
        $('#formSearch').submit(function(e){
            e.preventDefault();
            getData( $(this).serialize() );
        });
    }

    function getData(data){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('ClassSchedule/getData') ?>",
            data: data,
			success: function(res){

                if(res.semestry['Semestry'] == ''){
                    res.semestry['Semestry'] = 'ทั้งหมด' ;
                    $("#semestryCode").show();
                    bindData(res.data, 1);
                }else{
                    $("#semestryCode").hide();
                    bindData(res.data);
                }

                $('#SemestryTop').html(res.semestry['Semestry']);
                $('#GroupName').html(res.data[0]['GRP_NAME']);
                $('#MeetGroup').html(res.data[0]['GRP_MEET']);
                $('#TeacherName').html(res.data[0]['GRP_ADVIS']);
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
                str_table += '<td>' + data[i].SUB_CODE + '</td>';
                str_table += '<td class="text-left">' + data[i].SUB_NAME + '</td>';
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