<script>
    $(function(){
        initControl();
        bindSemestry();
        var Semestry = '<?php echo @$Semestry; ?>';
        if(Semestry != ''){
            $('.btn-int-search').addClass('hide');
            $('#Semestry + input[type="submit"]').removeClass('hide');
        }
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
			url: "<?php echo api_url('Subject/getDataByTeach') ?>",
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
                str_table += '<td>' + data[i].SUB_CODE + '</td>';
                str_table += '<td>' + data[i].SUB_NAME + '</td>';
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
                url: "<?php echo api_url('Subject/getSemestry') ?>",
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