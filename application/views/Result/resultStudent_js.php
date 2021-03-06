<script>
    $(function(){
        initControl();
        bindSemestry();
        $('.select2').select2({theme: 'bootstrap4'});
    });

    function initControl(){
        $('#formSearch').submit(function(e){
            e.preventDefault();
            // if()
            getData( $(this).serialize() );
        });
    }

    function getData(data){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('Student/getDataByTeach') ?>",
            data: data,
			success: function(res){
                // bindData(res.data);
            }
        });
    }
    
    function bindData(data){
        $('#datatable tbody').empty();
        if(data.length > 0){
            for(i in data){
                var str_table = '<tr>';
                str_table += '<td>' + (parseInt(i) + 1) + '</td>';
                str_table += '<td>' + data[i].GRP_NAME + '</td>';
                str_table += '<td>' + data[i].SEMESTRY + '</td>';
                str_table += '<td>' + data[i].STD_CODE + '</td>';
                str_table += '<td>' + data[i].CARDID + '</td>';
                str_table += '<td>' + data[i].StudentName + '</td>';
                str_table += '<td>';
                str_table += '<a href="javascript:void(0)" class="text-primary btn-profile" data-id="' + data[i].STD_CODE + '">ประวัตินศ.</a> / ';
                str_table += '<a href="javascript:void(0)" class="text-success btn-activity" data-id="' + data[i].STD_CODE + '">กพช.</a>';
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
			url: "<?php echo api_url('Student/getSemestry') ?>",
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
                    elm.append($('<option>').val(data[i].SEMESTRY).html('ภาคเรียนที่ ' + data[i].SEMESTRY));
                }
                // elm.val(data[0].SEMESTRY);
                // getData($('#formSearch').serialize());
            }
        });
    }
    
    function bindGroup(){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('Student/getSemestry') ?>",
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
                    elm.append($('<option>').val(data[i].SEMESTRY).html('ภาคเรียนที่ ' + data[i].SEMESTRY));
                }
                // elm.val(data[0].SEMESTRY);
                // getData($('#formSearch').serialize());
            }
        });
    }
</script>