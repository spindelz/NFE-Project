<script>
    $(function(){
        getData();
    });

    function getData(data){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('ExamSchedule/index') ?>",
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
                str_table += '<td>' + data[i].SUB_NAME + '</td>';
                str_table += '<td>' + data[i].ROOMNO + '</td>';
                str_table += '<td>' + data[i].FLD_NAME + '<br> ' + '#Link_GoogleMap' + '</td>';
                str_table += '</tr>';

                $('#datatable tbody').append(str_table);
            }
        }else{
            var str_table = '<tr><td colspan="7" class="text-danger">ไม่มีข้อมูล</td></tr>';
            $('#datatable tbody').html(str_table);
        }
    }
</script>