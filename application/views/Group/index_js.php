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
			url: "<?php echo api_url('Group/getDataByTeach') ?>",
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
                str_table += '<td>' + data[i].SEMESTRY + '</td>';
                str_table += '<td>' + data[i].GRP_NAME + '</td>';
                str_table += '<td>' + data[i].FLD_NAME + '</td>';
                str_table += '<td>';
                str_table += '<a href="javascript:void(0)" class="text-primary btn-exam" data-id="' + data[i].GRP_CODE + '">ตารางสอบ</a> / ';
                str_table += '<a href="javascript:void(0)" class="text-success btn-student" data-id="' + data[i].GRP_CODE + '">รายชื่อนศ.</a> / ';
                str_table += '<a href="javascript:void(0)" class="text-warning btn-subject" data-id="' + data[i].GRP_CODE + '">รายชื่อวิชา</a>';
                str_table += '</td>';
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
			url: "<?php echo api_url('Group/getSemestry') ?>",
            data: {
                'TeachFirstName': '<?php echo @$TeachFirstName; ?>',
                'TeachLastName': '<?php echo @$TeachLastName; ?>'
            },
			success: function(res){
                var elm = $('#Semestry');
                var data = res.data;
                elm.empty();
                elm.html($('<option>').val('').html('ภาคเรียนทั้งหมด'));
                for(i in data){
                    elm.append($('<option>').val(data[i].SEMESTRY).html(data[i].SEMESTRY));
                }
                elm.val(data[0].SEMESTRY);
                getData($('#formSearch').serialize());
            }
        });
    }
</script>