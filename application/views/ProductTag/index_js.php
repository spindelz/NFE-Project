<script>
    $(function(){
        initControl();
        getData();
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

    function getData(){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('ProductTag') ?>",
			success: function(response){
                bindData(response.data);
                initControl();
            }
        });
    }

    function searchData(data){
        $.ajax({
            method: "GET",
            url: "<?php echo api_url('ProductTag/search') ?>",
            data: data,
            success: function(response){
                bindData(response.data);
            }
        });
    }
    
    function bindData(data){
        $('#datatable tbody').empty();
        if(data.length > 0){
            for(i in data){
                var str_table = '<tr>';
                str_table += '<td>' + (parseInt(i) + 1) + '</td>';
                str_table += '<td>' + data[i].TagName + '</td>';
                str_table += '<td>' + data[i].UpdatedDate + '</td>';
                str_table += '<td>' + data[i].UpdatedBy + '</td>';
                str_table += '<td class="p-2">';
                str_table += '<a href="javascript:void(0)" class="btn btn-sm btn-warning btn-edit" data-id="' + data[i].TagID + '"><i class="fas fa-pencil-alt"></i></a> ';
                str_table += '<a href="javascript:void(0)" class="btn btn-sm btn-danger btn-delete" data-id="' + data[i].TagID + '"><i class="fas fa-trash"></i></a>';
                str_table += '</td>';
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
    
</script>