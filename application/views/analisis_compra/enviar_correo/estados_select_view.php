                       <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
                       
                <select id="estado_tipo_empresa" name="estado_tipo_empresa[]" class="form-control select2-multiple" multiple onchange="ver_correos()">
                  <?php foreach($estado_tipo_empresa as $row){echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";} ?>
                </select>   

                        <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
