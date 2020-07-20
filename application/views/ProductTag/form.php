<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $pageName; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SITE; ?>">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SITE; ?>ProductTag">แท็กสินค้า</a></li>
                        <li class="breadcrumb-item active"><?php echo $pageName; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content pb-1">
        <div class="container">

            <a href="<?php echo SITE; ?>ProductTag" class="btn btn-link"><span>< กลับไปหน้าแท็กสินค้า</span></a>

            <div class="card">
                <div class="card-body">
                    <div class="mx-auto" style="width: 480px;">
                        <?php echo form_open_multipart('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formAddProductTag')); ?>
                        <input type="hidden" name="TagID" id="ProductTagID" value="<?php echo @$ProductTagID; ?>">
                        <div class="form-group">
                            <label for="ProductTagName">ชื่อแท็กสินค้า <span class="text-danger">*</span></label>
                            <input type="text" name="TagName" id="ProductTagName" class="form-control" required>
                        </div>
                        <div class="form-group text-right">
                            <input type="button" class="btn btn-secondary btn-cancel" value="ยกเลิก">
                            <input type="submit" class="btn btn-success" value="บันทึก" formnovalidate>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
