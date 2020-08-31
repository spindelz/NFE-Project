<script>
    $(function(){

        getData();

    });

    function getData(){
        $.ajax({
			method: "GET",
			url: "<?php echo api_url('Home/index') ?>",
            data: {
                'isTeacher': '<?php echo @$isTeacher; ?>'
            },
			success: function(res){

                $('#StudentName').html((res.data['PRENAME']) +' '+ (res.data['NAME']) +' '+ (res.data['SURNAME']));
                $('#StudentCode').html((res.data['ID']));
                $('#PersonalID').html((res.data['CARDID']));
                $('#BirthDate').html((res.data['BIRDAY']));
                $('#Age').html((res.data['Age']));
                $('#Address').html((res.data['CURADDR']) +'  ต.'+ (res.data['Tambon']) +'  อ.'+ (res.data['Amphur']) +'  จ.'+ (res.data['S_PROVINCE']) +' '+ (res.data['Zipcode']));
                $('#OldSchool').html((res.data['S_SCHOOL']));
                $('#Province').html((res.data['Province']));
                $('#PhoneNumber').html((res.data['CURPHONE']));
                
            }
        });
    }
    
    
    
</script>