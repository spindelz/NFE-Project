        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="<?php echo ASSETS_JS; ?>/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo ASSETS_JS; ?>/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo ASSETS_JS; ?>/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo ASSETS_JS; ?>/adminlte.js"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="<?php echo ASSETS_JS; ?>/demo.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="<?php echo ASSETS_JS; ?>/jquery.mousewheel.js"></script>
        <script src="<?php echo ASSETS_JS; ?>/raphael.min.js"></script>
        <!-- <script src="<?php //echo ASSETS_JS; ?>/jquery.mapael.min.js"></script> -->
        <!-- <script src="<?php //echo ASSETS_JS; ?>/usa_states.min.js"></script> -->
        
        <script src="<?php echo ASSETS_JS; ?>/jquery.tmpl.min.js"></script>
        
        <!-- IonIcons -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo ASSETS_JS; ?>/Chart.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="<?php echo ASSETS_JS; ?>/bs-custom-file-input.min.js"></script>
        <!-- jquery-validation -->
        <script src="<?php echo ASSETS_JS; ?>/jquery.validate.min.js"></script>
        <script src="<?php echo ASSETS_JS; ?>/additional-methods.min.js"></script>
        <!-- Common Script -->
        <script src="<?php echo ASSETS_JS; ?>/script.js"></script>
        <!-- Select2 -->
        <script src="<?php echo ASSETS_JS; ?>/select2.full.min.js"></script>
        <!-- daterangepicker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
        <script src="<?php echo ASSETS_JS; ?>/daterangepicker.js"></script>
        <script src="<?php echo ASSETS_JS; ?>/timepicker.js"></script>
        <!-- PAGE SCRIPTS -->
        <!-- sweetalert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!-- <script src="<?php //echo ASSETS_JS; ?>/dashboard2.js"></script> -->
        <!-- loadJSON -->
        <script src="<?php echo ASSETS_JS; ?>/jquery.loadJSON.js"></script>
        <script>
                $('.select2').select2({
                        theme: 'bootstrap4'
                })
                <?php 
                        $user_logined = $this->session->userdata('user_logined');
                        // if(isset($user_logined)){
                        //         $data_script['UserTypeID'] = $user_logined['UserTypeID'];
                        // }
                ?>
                var userType = '<?php echo $user_logined['UserTypeID']; ?>';
                switch (userType) {
                        case 3:
                                $('#menu2').hide();
                                $('#menu4').hide();
                                $('#menu5').hide();
                                $('#menu6').hide();
                                $('#menu7').hide();
                                break;
                
                        default:
                                break;
                }
                // $(document).ready(function() {
                        
                // });
        </script>