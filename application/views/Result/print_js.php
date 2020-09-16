<script>
    $(function(){
        getData();
    });

    function getData(){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('Result/getData') ?>",
            data: {
                'isTeacher': '<?php echo @$isTeacher ? 1 : ""; ?>',
                'StudentCode': '<?php echo @$StudentCode; ?>',
                'UserType': '<?php echo @$UserType; ?>',
                'Semestry': '<?php echo @$criterie; ?>'
            },
			success: function(res){
                if(res.semestry == ''){
                    $("#semestryCode").show();
                    bindData(res.data, 1);
                    $('#text-gpa').attr('colspan', '5');
                }else{
                    $("#semestryCode").hide();
                    bindData(res.data);
                    $('#text-gpa').attr('colspan', '4');
                }
                
                $('#GPA').html(res.gpa);
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
                str_table += '<td>' + data[i].SUB_CREDIT + '</td>';
                str_table += '<td>' + data[i].GRADE + '</td>';
                str_table += '</tr>';

                $('#datatable tbody').append(str_table);
            }
            var footData = '<tr>';
            footData += '<td colspan="" id="text-gpa" class="text-right">ระดับผลการเรียนเฉลี่ย</td>';
            footData += '<td class="text-center"><span id="GPA"></span></td>';
            footData += '</tr>';
            $('#datatable tbody').append(footData);
        }else{
            var str_table = '<tr><td colspan="7" class="text-danger">ไม่มีข้อมูล</td></tr>';
            $('#datatable tbody').html(str_table);
        }
    }
</script>