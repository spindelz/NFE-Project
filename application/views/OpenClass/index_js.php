<script>
    $(function(){
        initControl();
        getDataOpenClass($('#formSearch').serialize());
        getNFETambon();
    });

    function initControl(){
        $('#formSearch').submit(function(e){
            e.preventDefault();
            getDataOpenClass($(this).serialize());
        });
    }

    function getDataOpenClass(input){
        $.ajax({
            method: "POST",
            url: "<?php echo api_url('OpenClass/list') ?>",
            data: input,
            success: function(res) {
                bindDataTable(res);
            }
        });
    }

    function bindDataTable(res){
        $('#datatable tbody').empty();
        if(res.length > 0){
            $.each(res.data, function(i,v){
                var str_table = '<tr>';
                str_table += '<td class="text-center">' + (parseInt(i) + 1) + '</td>';
                str_table += '<td>' + v.CourseName + '</td>';
                str_table += '<td>' + v.NFETambonName + '</td>';
                str_table += '<td>' + v.LecturerName + '</td>';
                str_table += '<td class="text-center">' + v.ResultAmount + '</td>';
                str_table += '<td>' + v.UpdatedDate + '</td>';
                str_table += '<td>' + v.UserUpdate + '</td>';
                str_table += '<td class="text-center">';
                str_table += '<a href="<?php echo SITE; ?>OpenClass/form/' + v.ClassID + '" style="font-size:15px;" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> ';
                str_table += '<a href="javascript:void(0)" class="btn btn-danger btn-delete" style="font-size:15px;" data-id="' + v.ClassID + '"><i class="fas fa-trash-alt"></i></a>';
                str_table += '</td>';
                str_table += '</tr>';

                $('#datatable tbody').append(str_table);
            });
        }else{
            var str_table = '<tr><td colspan="8" class="text-danger text-center">ไม่มีข้อมูล</td></tr>';
            $('#datatable tbody').html(str_table);
        }
    }

    function getNFETambon(){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('OpenClass/getNFETambon') ?>",
            success: function(res) {
                bindNFETambon(res);
            }
        });
    }

    function bindNFETambon(res){
        var NFETambonID = $('select[name="NFETambonID"]');
        NFETambonID.empty();
        NFETambonID.append($('<option>').val('').html('เลือกกศน.ตำบลทั้งหมด'));
        $.each(res.data, function(i, v){
            NFETambonID.append($('<option>').val(v.OrganizationID).html(v.OrganizationNameTH));
        });
    }

</script>