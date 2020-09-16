<script>
    $(function(){
        getData();
    });

    function getData(){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('Activity') ?>",
            data: {
                'isTeacher': '<?php echo @$isTeacher ? 1 : ""; ?>',
                'StudentCode': '<?php echo @$StudentCode; ?>',
                'UserType': '<?php echo @$UserType; ?>'
            },
			success: function(res){
                bindData(res.data);
                $('#Hour').html(res.hour);
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
                str_table += '<td class="text-left">' + data[i].ACTIVITY + '</td>';
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