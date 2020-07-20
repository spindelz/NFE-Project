<div style="display: flex; justify-content: center; background: #e9ecef; min-height: 100vh;" class="pt-5">
    <div class="login-box" style="width: 840px; padding-right: 7.5px; padding-left: 7.5px; margin-right: auto; margin-left: auto;">
        <div class="login-logo">
            <a href="<?php echo SITE; ?>"><b>Bdev</b>Tool</a>
        </div>

        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#controller">Controller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#view">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#api">API</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="controller" class="container tab-pane active"><br>
                        <h3>Controller</h3>
                        <div class="card">
                            <div class="card-body login-card-body">
                                <p class="login-box-msg">Create Controller</p>

                                <form method="post" id="controller_form">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="controller_name" placeholder="Class Controller Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <select class="form-control" name="page_type">
                                            <option value="">== View Page Type ==</option>
                                            <option value="normal_page">Normal</option>
                                            <option value="login_page">Login</option>
                                            <option value="blank_page">Blank</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="outside_folder" class="custom-control-input" id="outside_folder">
                                            <label class="custom-control-label" for="outside_folder">Outsite Folder</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="view" class="container tab-pane"><br>
                        <h3>View</h3>
                        <div class="card">
                            <div class="card-body login-card-body">
                                <p class="login-box-msg">Create View</p>

                                <form method="post" id="view_form">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="view_name" placeholder="View Name">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="api" class="container tab-pane fade"><br>
                        <h3>API</h3>
                        <div class="card">
                            <div class="card-body login-card-body">
                                <p class="login-box-msg">Create API</p>

                                <form method="post" id="api_form">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="table_name" placeholder="Database Table Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="pk" placeholder="Primary Key">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-gray p-3" style="box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2); margin-bottom: 1rem; min-height: 100%">
                    <h5>Status</h5>
                    <div class="bg-white mt-2 p-2" style="height: 310px; overflow-y: auto;" id="status-monitor"></div>
                </div>
            </div>
        </div>
    </div>
</div>
