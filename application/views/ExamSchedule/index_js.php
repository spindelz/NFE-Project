<script>
    $(function(){
        getData();
        initControl();
    });

    function initControl(){
        $(document).on('click', '.btn-print', function(){
            var data = $('#formSearch').serialize();
            window.location.href = '<?php echo SITE; ?>ExamSchedule/printData?' + data;
        });
    }

    function getData(data){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('ExamSchedule') ?>",
            data: {
                'isTeacher': '<?php echo @$isTeacher; ?>',
                'GroupCode': '<?php echo @$GroupCode; ?>',
                'Semestry': '<?php echo @$Semestry; ?>'
            },
			success: function(res){
                bindData(res.data);
            }
        });
    }
    
    function bindData(data){
        
        $('#datatable tbody').empty();
        if(data.length > 0){
            for(i in data){
                var str_table = '<tr>';
                str_table += '<td>' + (parseInt(i) + 1) + '</td>';
                str_table += '<td>' + data[i].EXAM_DAY + '</td>';
                str_table += '<td>' + data[i].EXAM_START + ' - ' + data[i].EXAM_END + '</td>';
                str_table += '<td>' + data[i].SUB_CODE + '</td>';
                str_table += '<td class="text-left">' + data[i].SUB_NAME + '</td>';
                str_table += '<td>' + data[i].ROOMNO + '</td>';
                str_table += '<td class="text-left">' + data[i].FLD_NAME + '</td>';
                str_table += '</tr>';

                $('#datatable tbody').append(str_table);
            }
        }else{
            var str_table = '<tr><td colspan="7" class="text-danger">ไม่มีข้อมูล</td></tr>';
            $('#datatable tbody').html(str_table);
        }
    }
</script>