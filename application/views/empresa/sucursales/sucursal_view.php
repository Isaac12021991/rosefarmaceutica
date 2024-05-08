                                   <div class="portlet box bg-blue-chambray" id="box_form">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Empresa               <a class="btn btn-xs default" href='<?php echo site_url("empresa/editar_empresa");?>' data-target="#ajax_editar_empresa" data-toggle="modal" title="Editar empresa"> <li class="fa fa-edit"></li></a> </div>
                                        <div class="actions">


                                      <a href='<?php echo site_url("empresa/agregar_sucursal");?>' data-target="#ajax_nueva_sucursal" data-toggle="modal" title="Generar nuevo presupuesto a partir de este" class="btn default">Agregar sucursal</a>





                                        </div>
                                    </div>


                                      <div class="portlet-body">

                                      <?php if($sucursales->num_rows() > 0): ?>

                                        <table class="table table-striped table-hover dt-responsive compact">
                    <thead>
                       <tr>
                       <th width="12%">Sucursal</th>
                       <th width="10%">Telefono</th>
                         <th width="30%">Celular</th>
                         <th width="10%">Scim</th>
                         <th width="20%">Acciones</th>

                       </tr>
                    </thead> 
                    <tbody>
                      <?php foreach ($sucursales->result() as $row) : ?>
                          <tr>
                              <td align=center><?php echo $row->nb_direccion; ?> </td>
                              <td><?php echo $row->nu_telefono_local; ?> </td>
                              <td><?php echo $row->nu_telefono_movil; ?> </td>
                              <td><?php echo $row->cod_sicm; ?> </td>
                              <td> 

                                <a class="btn btn-xs default" href='<?php echo site_url("empresa/editar_sucursal/$row->id");?>' data-target="#ajax_editar_sucursal" data-toggle="modal" title="Editar empresa"> <li class="fa fa-edit"></li></a></td>
                              
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

               <?php endif; ?>    


                                        </div>
                                        </div>











  <script type="text/javascript">



            function ver_sucursales(co_empresa){

            $("#response_controllers").html('Espere por favor')
            $("#response_controllers").load('<?php echo site_url('empresa/sucursales') ?>' +'/'+co_empresa);

            }



                                   </script>

                                   <script src="<?php echo base_url() ?>js/datatables_usage.js" type="text/javascript"></script>

