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
			url: "<?php echo api_url('Student/getDataByTeach') ?>",
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
                str_table += '<td>' + data[i].GRP_NAME + '</td>';
                str_table += '<td>' + data[i].SEMESTRY + '</td>';
                str_table += '<td>' + data[i].StudentCode + '</td>';
                str_table += '<td>' + data[i].CARDID + '</td>';
                str_table += '<td class="text-left">' + data[i].StudentName + '</td>';
                str_table += '<td>';
                str_table += '<a href="<?php echo SITE; ?>Student/profile?st=' + data[i].STD_CODE + '&u=' + data[i].UserType + '" class="text-primary">ประวัตินศ.</a> / ';
                str_table += '<a href="<?php echo SITE; ?>Student/activity?st=' + data[i].STD_CODE + '&u=' + data[i].UserType + '" class="text-success">กพช.</a> / ';
                str_table += '<a href="<?php echo SITE; ?>Student/result?st=' + data[i].STD_CODE + '&u=' + data[i].UserType + '" class="text-warning">ผลการเรียน</a>';
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
        var Semestry = '<?php echo @$Semestry; ?>';
        if(Semestry != ''){
            $('#Semestry').hide();
            $('#Semestry').html($('<option>').val(Semestry).html('ภาคเรียนที่ ' + Semestry));
            getData($('#formSearch').serialize());
        }else{
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
                    getData($('#formSearch').serialize());
                }
            });
        }
    }
</script>