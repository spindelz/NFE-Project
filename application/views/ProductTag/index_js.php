<script>
    $(function(){
        initControl();
        getData();
        bindSemestry();
    });

    function initControl(){

        $('#formSearch').submit(function(e){
            e.preventDefault();
            
            searchData( $(this).serialize() );
        });

        $('#search_all').click(function(){
            $('#ProductTagName').val('');
            searchData( $('#formSearch').submit() );
        });

        $('.btn-edit').click(function(){
            var id = $(this).data('id');
            window.location.href = '<?php echo SITE; ?>ProductTag/edit/' + id;
        });

        $('.btn-delete').click(function(){
            Swal.fire({
                title: 'ข้อความจากระบบ',
                text: "ยืนยันการลบข้อมูล?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ยืนยัน'
            }).then((result) => {
                if (result.value) {
                    var id = $(this).data('id');
                    deleteData(id);
                }
            });
        });
    }

    function getData(data){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('home') ?>",
            data: data,
			success: function(res){
                bindData(res.data);
            }
        });
    }

    function searchData(data){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('home') ?>",
            data: data,
            success: function(response){
                bindData(response.data);
            }
        });
    }
    
    function bindData(data){
        $('#datatable tbody').empty();
        // data = [{'TagID': 1, 'TagName': 'test', 'UpdatedDate': '28/12/2536', 'UpdatedBy': 'bank'},
        // {'TagID': 1, 'TagName': 'test', 'UpdatedDate': '28/12/2536', 'UpdatedBy': 'bank'},
        // {'TagID': 1, 'TagName': 'test', 'UpdatedDate': '28/12/2536', 'UpdatedBy': 'bank'},
        // {'TagID': 1, 'TagName': 'test', 'UpdatedDate': '28/12/2536', 'UpdatedBy': 'bank'},
        // {'TagID': 1, 'TagName': 'test', 'UpdatedDate': '28/12/2536', 'UpdatedBy': 'bank'},
        // {'TagID': 1, 'TagName': 'test', 'UpdatedDate': '28/12/2536', 'UpdatedBy': 'bank'}];
        // console.log(data);
        // data = {"data":[
        //     {"TagID":"2","TagName":"Hot","isActive":"1","CreatedBy":"1","CreatedDate":"2020-07-06 15:19:36","UpdatedBy":"Administrator","UpdatedDate":"06\/07\/2563"},
        //     {"TagID":"3","TagName":"New","isActive":"1","CreatedBy":"1","CreatedDate":"2020-07-06 16:00:14","UpdatedBy":"Administrator","UpdatedDate":"06\/07\/2563"}],
        //     "length":2}
        // data.length = 6;
        // console.log(data);
        if(data.length > 0){
            for(i in data){
                var str_table = '<tr>';
                str_table += '<td>' + (parseInt(i) + 1) + '</td>';
                str_table += '<td>' + data[i].SEMESTRY + '</td>';
                str_table += '<td>' + data[i].SUB_CODE + '</td>';
                str_table += '<td>' + data[i].SUB_NAME + '</td>';
                // str_table += '<td class="p-2">';
                // str_table += '<a href="javascript:void(0)" class="btn btn-sm btn-warning btn-edit" data-id="' + data[i].TagID + '"><i class="fas fa-pencil-alt"></i></a> ';
                // str_table += '<a href="javascript:void(0)" class="btn btn-sm btn-danger btn-delete" data-id="' + data[i].TagID + '"><i class="fas fa-trash"></i></a>';
                // str_table += '</td>';
                str_table += '</tr>';

                $('#datatable tbody').append(str_table);
            }
        }else{
            var str_table = '<tr><td colspan="7" class="text-danger">ไม่มีข้อมูล</td></tr>';
            $('#datatable tbody').html(str_table);
        }
    }

    function deleteData(id){
        $.ajax({
			method: "DELETE",
			url: "<?php echo api_url('ProductTag') ?>",
			data: {
                'TagID': id
            },
			success: function(response){
                Swal.fire(
                    'ทำการลบข้อมูลสำเร็จ!',
                    'หมวดสินค้าถูกลบแล้วเรียบร้อย',
                    'success'
                )
                getData();
            }
        });
    }
    function bindSemestry(data){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('result/getSemestry') ?>",
            data: data,
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