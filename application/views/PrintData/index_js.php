<script>
    $(function(){
        getData();
    });

    function getData(data,hour){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('PrintData/index') ?>",
            data: data,
            hour: hour,
			success: function(res){
                bindData(res.data);
                $('#GPA').html((res.hour));
        
            }
        });
    }

    function bindData(data){
        
        $('#datatable tbody').empty();
        if(data.length > 0){
            for(i in data){
                var str_table = '<tr>';
                str_table += '<td>' + (parseInt(i) + 1) + '</td>';
                str_table += '<td>' + data[i].SEMESTRY + '</td>';
                str_table += '<td>' + data[i].ACTIVITY + '</td>';
                str_table += '<td>' + data[i].HOUR + '</td>';
                str_table += '</tr>';

                $('#datatable tbody').append(str_table);
            }
        }else{
            var str_table = '<tr><td colspan="7" class="text-danger">ไม่มีข้อมูล</td></tr>';
            $('#datatable tbody').html(str_table);
        }
    }
</script>