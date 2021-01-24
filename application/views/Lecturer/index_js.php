<script>
    $(function(){
        initControl();
        getData( $('#formSearch').serialize() );
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
			url: "<?php echo api_url('Lecturer/getData') ?>",
            data: data,
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
                str_table += '<td>' + data[i].LecturerName + '</td>';
                str_table += '<td>' + data[i].LecturerType + '</td>';
                str_table += '<td>' + data[i].PhoneNumber + '</td>';
                str_table += '<td>' + data[i].Status + '</td>';
                str_table += '<td>' + data[i].RegisterDate + '</td>';
                str_table += '<td>' + data[i].CreatedBy + '</td>';
                str_table += '<td>';
                str_table += '<a href="<?php echo SITE; ?>Group/examSchedule/' + data[i].GRP_CODE + '?s=' + data[i].SEMESTRY + '" class="text-primary">ตารางสอบ</a> / ';
                str_table += '<a href="<?php echo SITE; ?>Group/student/' + data[i].GRP_CODE + '?s=' + data[i].SEMESTRY + '" class="text-success" data-id="' + data[i].GRP_CODE + '">รายชื่อนศ.</a> / ';
                str_table += '</td>';
                str_table += '</tr>';

                $('#datatable tbody').append(str_table);
            }
        }else{
            var str_table = '<tr><td colspan="7" class="text-danger">ไม่มีข้อมูล</td></tr>';
            $('#datatable tbody').html(str_table);
        }
    }
</script>