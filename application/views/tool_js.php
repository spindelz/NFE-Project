<script>
    $('#view_form').submit(function(e){
        $('#status-monitor').empty();
        var data = [];
        $($('#view_form').serializeArray()).each(function() {
            data[(this.name)] = this.value;
        });
        var array_type = ['index', 'js', 'css'];
        
        createViewFolder(data);
        
        for(i in array_type){
            data['Type'] = array_type[i];
            createViewFile(data);
        }
        
        e.preventDefault();
    });

    $('#controller_form').submit(function(e){
        $('#status-monitor').empty();
        
        var data = [];
        $($('#controller_form').serializeArray()).each(function() {
            data[(this.name)] = this.value;
        });
        
        createControllerFile(data);
                
        e.preventDefault();
    });

    $('#api_form').submit(function(e){
        $('#status-monitor').empty();
        var data = [];
        $($('#api_form').serializeArray()).each(function() {
            $('[name="' + this.name + '"]').val('');
            data[(this.name)] = this.value;
        });
        
        createAPIFile(data);
        createModelFile(data);
                
        e.preventDefault();
    });

    function createControllerFile(data){
        $.ajax({
            method: "POST",
            url: "<?php echo SITE.'BdevTool/genControllerFile'; ?>",
            asysc: false,
            data: {
                'ControllerName': data['controller_name'].charAt(0).toUpperCase() + data['controller_name'].slice(1),
                'PageType': data['page_type'],
                'OutsideFolder': data['outside_folder']
            },
            success: function(response) {
                $('[name="controller_name"]').val('');
                $('#status-monitor').append('<p>Create File: ' + response + '!!</p>')
            }
        });
    }

    function createViewFolder(data){
        $.ajax({
            method: "POST",
            url: "<?php echo SITE.'BdevTool/genViewFolder'; ?>",
            asysc: false,
            data: {
                'ViewName': data['view_name']
            },
            success: function(response) {
                $('#status-monitor').append('<p>Create Folder: ' + response + '!!</p>')
            }

        });
    }
    
    function createViewFile(data){
        $.ajax({
            method: "POST",
            url: "<?php echo SITE.'BdevTool/genViewFile'; ?>",
            asysc: false,
            data: {
                'ViewName': data['view_name'],
                'Type': data['Type']
            },
            success: function(response) {
                $('[name="view_name"]').val('');
                $('#status-monitor').append('<p>Create File (' + type + '): ' + response + '!!</p>')
            }

        });
    }

    function createAPIFile(data){
        $.ajax({
            method: "POST",
            url: "<?php echo SITE.'BdevTool/genAPIFile'; ?>",
            asysc: false,
            data: {
                'TableName': data['table_name'].charAt(0).toUpperCase() + data['table_name'].slice(1),
                'PK': data['pk']
            },
            success: function(response) {
                $('#status-monitor').append('<p>Create API File: ' + response + '!!</p>')
            }

        });
    }

    function createModelFile(data){
        $.ajax({
            method: "POST",
            url: "<?php echo SITE.'BdevTool/genModelFile'; ?>",
            asysc: false,
            data: {
                'TableName': data['table_name'].charAt(0).toUpperCase() + data['table_name'].slice(1),
                'PK': data['pk']
            },
            success: function(response) {
                $('[name="table_name"]').val('');
                $('#status-monitor').append('<p>Create Model File: ' + response + '!!</p>')
            }

        });
    }
</script>