<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> นักเรียน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SITE; ?>">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แท็กสินค้า</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content pb-1">
        <div class="container">

            <div class="card">
                
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'get', 'class' => 'form-horizontal', 'id' => 'formSearch')); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label rol="ProductTagName">ชื่อแท็กสินค้า</label>
                            <input type="text" name="ProductTagName" id="ProductTagName" class="form-control" placeholder="ชื่อแท็กสินค้า">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="<?php echo SITE; ?>ProductTag/create" class="btn btn-primary mr-auto"><i class="fas fa-plus"></i> เพิ่มแท็กสินค้า</a>
                        <a href="javascript:void(0)" class="btn btn-outline-primary mr-1" id="search_all"> แสดงทั้งหมด</a>
                        <button type="submit" class="btn btn-outline-dark"><i class="fas fa-search"></i> ค้นหา</button>
                    </div>
                    <?php echo form_close(); ?>
                    
                </div>
                
            </div>
            

        </div>
    </div>

    
</div>
