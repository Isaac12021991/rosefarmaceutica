    <?php if($info_producto_publicaciones): ?>

    <?php endif; ?>

         <?php $info_carrito = $this->biomercado_library->info_comprado_carrito($info_producto_publicaciones->id);  ?>

            <?php if (!is_null($info_carrito)): 

                $co_carro_compras = $info_carrito->id;
                $ca_unidades_carrito = $info_carrito->ca_unidades;
                $co_partner = $info_carrito->co_partner;

            else:

                $co_carro_compras = '0';
                $ca_unidades_carrito = $info_producto_publicaciones->ca_pedido_minimo;
                $co_partner = '';

          endif; ?>

<div class="modal-header p-4">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $info_producto_publicaciones->username; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">



                                                                    <?php if($info_producto_publicaciones->nb_url_foto != ''): ?>
                                                                    <div class="card-body p-4 rounded px-5 py-5 d-flex align-items-center justify-content-center" style="background-color: #fff;">
                                                                        <img src="<?php echo $info_producto_publicaciones->nb_url_foto; ?>" style="width:200px; height: 180px;" />
                                                                    </div>
                                                                <?php endif; ?>

                                                                <div class="col-xxl-12 pl-xxl-12 mb-8">
                                                                <h2 class="font-weight-bolder text-dark mb-4" style="font-size: 24px;"><?php echo $info_producto_publicaciones->nb_producto; ?></h2>
                                                              
                                                                      <?php if($info_producto_publicaciones->nb_tipo_venta != 'Subasta'): ?>
                                                                          <div class="font-size-h2 mb-0 text-dark-50">
                                                                <span class="text-primary font-weight-boldest ml-0"><?php echo $info_producto_publicaciones->ca_precio; ?> <?php echo $info_producto_publicaciones->nb_acronimo; ?></span><br>
                                                                <span style="font-size:12px">
                                                                 <?php echo number_format($this->biomercado_library->get_info_dolar_bcv($info_producto_publicaciones->ca_precio),2,',','.'); ?> Bs
                                                             </span>
         
                                                                 </div>
                                                            <span class="font-weight-boldest ml-2"><br>
                                                                SubTotal: <span id="calcular_sub_total"></span>
                                                             </span>

                                                                <?php else: ?>

                                                                    <div class="font-size-h2 mb-7 text-dark-50">Cantidad:
                                                                <span class="text-info font-weight-boldest ml-2"><?php echo $info_producto_publicaciones->ca_disponible; ?></span>
                                                                 </div>



                                                                    <?php endif; ?>

                                                           
                                                                <div class="line-height-xl"><?php echo $info_producto_publicaciones->tx_descripcion; ?> | <?php echo $info_producto_publicaciones->ff_vence; ?></div>
                                                            </div>

                                                                <div class="row mb-6">
                                                            <!--begin::Info-->
                                                            <div class="col-6 col-md-4">
                                                                <div class="mb-2 d-flex flex-column">
                                                                    <span class="text-dark font-weight-bold mb-0">Usuario</span>
                                                                    <span class="text-primary font-weight-bolder font-size-lg"><?php echo $info_producto_publicaciones->username; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-md-4">
                                                                <div class="mb-2 d-flex flex-column">
                                                                    <span class="text-dark font-weight-bold mb-0">Tipo de Venta</span>
                                                                    <span class="text-primary font-weight-bolder font-size-lg"><?php echo $info_producto_publicaciones->nb_tipo_venta; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-md-4">
                                                                <div class="mb-2 d-flex flex-column">
                                                                    <span class="text-dark font-weight-bold mb-0">Ubicacion</span>
                                                                    <span class="text-primary font-weight-bolder font-size-lg"> <?php echo $info_producto_publicaciones->nb_estado; ?></span>
                                                                </div>
                                                            </div>

                                                             <?php $info_reputacion = $this->ion_auth->promedio_reputacion_usuario('VENDEDOR', $info_producto_publicaciones->co_usuario); ?>

                                                            <div class="col-6 col-md-4">
                                                                <div class="mb-2 d-flex flex-column">
                                                                    <span class="text-dark font-weight-bold mb-0">Reputacion</span>
                                                                    <span class="text-warning font-weight-bolder font-size-lg"> 
                                                                        <?php if ($info_reputacion): echo $info_reputacion->ca_promedio_reputacion; else: echo "Usuario Nuevo"; endif; ?>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                                <div class="col-6 col-md-4">
                                                                <div class="mb-2 d-flex flex-column">
                                                                    <span class="text-dark font-weight-bold mb-0">Forma de pago</span>
                                                                    <span class="text-primary font-weight-bolder font-size-lg"> 
                                                                    <?php echo $info_producto_publicaciones->nb_forma_entrega; ?>
                                                                    </span>
                                                                </div>
                                                            </div>



                                                            <div class="col-6 col-md-4">
                                                                <div class="mb-2 d-flex flex-column">
                                                                    <span class="text-dark font-weight-bold mb-0">Modo de pago</span>
                                                                    <span class="text-primary font-weight-bolder font-size-lg"> 
                                                                        <?php echo $info_producto_publicaciones->nb_tipo_pago; ?>
                                                                    </span>
                                                                </div>
                                                            </div>


                                                            <!--end::Info-->
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-6 col-md-6">
                                                            


                                                      </div>

                                                    <div class="col-6 col-md-6">

            <?php if($info_producto_publicaciones->nb_tipo_venta == 'Subasta'): ?>

         <?php $info_carrito_subasta = $this->biomercado_library->info_comprado_carrito_subasta($info_producto_publicaciones->id); ?>
            <?php if(!is_null($info_carrito_subasta)): 

                $ca_precio_actual = $info_carrito_subasta->ca_precio_carrito; 
                $co_usuario_subasta = $info_carrito_subasta->co_usuario; 
                else: $ca_precio_actual = $info_producto_publicaciones->ca_precio; $co_usuario_subasta = 0; endif; ?>

                                                    <div class="form-group row">
                                                        <label class="col-4 col-form-label">Precio</label>
                                                        <div class="col-8">
                                                            <input class="form-control" type="number"  min="<?php echo $ca_precio_actual; ?>"  name="ca_precio_carrito" id="ca_precio_carrito" placeholder="Precio" value="<?php echo $ca_precio_actual; ?>">
                                                        </div>
                                                    </div>

                                                     <?php if($co_usuario_subasta == $this->ion_auth->user_id()): ?> <b>Estas ganando la subasta</b> <?php endif; ?>


                                                         <?php endif; ?>

                 <?php if($info_producto_publicaciones->nb_tipo_venta != 'Subasta'): ?>

                                                                        <div class="form-group row">
                                                        <label class="col-12 col-lg-4 col-lg-4 col-form-label">Unidades</label>
                                                        <div class="col-12 col-lg-8 col-md-8">
                                                            <input  type="text" name="ca_unidades" onkeyup="calcular_sub_total()" onchange="calcular_sub_total()" onblur="calcular_sub_total()" id="ca_unidades" class="form-control" placeholder="Unidades" value="<?php echo $ca_unidades_carrito; ?>">
                                                        </div>
                                                    </div>


                                                    <?php endif; ?>

                                                    </div>

                                                      

                                                    </div>



             <?php if($info_producto_publicaciones): ?>
            <div class="modal-footer p-2">
                <button type="button" class="btn btn-light-primary btn-sm font-weight-bold p-2" data-dismiss="modal">Cerrar</button>

                   <?php if($this->usuario_library->permiso_empresa_obtener($info_producto_publicaciones->co_partner, "'Administrador'") or $info_producto_publicaciones->co_usuario == $this->ion_auth->user_id()): ?>

        <a href='<?php echo site_url("producto_publicaciones/editar_producto_publicaciones/$info_producto_publicaciones->id")?>' class="btn btn-primary btn-sm font-weight-bold p-2">Editar</a>

        <?php else: ?>

                <?php if($this->ion_auth->co_partner() != $info_producto_publicaciones->co_partner): ?>

<button type="button" onclick="agregar_producto_listado()" class="btn btn-primary btn-sm font-weight-bold p-2"> <?php if($info_producto_publicaciones->nb_tipo_venta == 'Subasta'): ?> Subastar <?php else: ?>Agregar al carro <?php endif; ?></button>

                <?php endif; ?>

                <?php endif; ?>

                    </div>
                 <?php else: ?>

                        <div class="modal-footer p-2">
                <button type="button" class="btn btn-light-primary btn-sm font-weight-bold p-2" data-dismiss="modal">Cerrar</button>

            </div>


                     <?php endif; ?>
                



<script type="text/javascript">


    <?php if ($info_producto_publicaciones->ca_pedido_minimo > $info_producto_publicaciones->ca_disponible): 
        $cantidad_minima =  $info_producto_publicaciones->ca_disponible; 
        else: $cantidad_minima = $info_producto_publicaciones->ca_pedido_minimo; endif; ?>

      $("input[name='ca_unidades']").TouchSpin({
                min: '<?php echo $cantidad_minima; ?>',
                step: '<?php echo $info_producto_publicaciones->ca_multiplo; ?>',
                max: '<?php echo $info_producto_publicaciones->ca_disponible; ?>',
                decimals: 0,
                verticalbuttons: true
            });

    calcular_sub_total();


function agregar_producto_listado()
{

    var co_producto_publicaciones = '<?php echo $info_producto_publicaciones->id; ?>';
    var co_carro_compras = '<?php echo $co_carro_compras; ?>';
    var nb_tipo_venta = '<?php echo $info_producto_publicaciones->nb_tipo_venta; ?>';

    <?php if($info_producto_publicaciones->nb_tipo_venta == 'Subasta'): ?>
    var ca_precio = $('#ca_precio_carrito').val();

        if (ca_precio == '') {


          toastr.error("Error", 'Ingrese una oferta mayor a la actual');
          $('#ca_precio_carrito').focus();
           return;

    };



            if (ca_precio <= '<?php echo $ca_precio_actual; ?>'){

        toastr.error("Error", 'Ingrese una oferta mayor a la actual');
          $('#ca_precio_carrito').focus();
            return false;
        }



    
            if (ca_precio % 1 != 0){

        toastr.error("Error", 'Ingrese un número entero');

          $('#ca_precio_carrito').focus();
            return false;
        }


          if ($('#ca_precio_carrito').val() <= 0) {

        toastr.error("Error", 'Ingrese la cantidad de unidades');

          
          $('#ca_precio_carrito').focus();
            return false;
        }



<?php else: ?>
    var ca_precio = '<?php echo $info_producto_publicaciones->ca_precio; ?>'

<?php endif; ?>

 <?php if($info_producto_publicaciones->nb_tipo_venta != 'Subasta'): ?>

     var ca_unidades = $('#ca_unidades').val();

    if (ca_unidades == '') {

        toastr.error("Error", 'Ingrese la cantidad de unidades');

          $('#ca_unidades').focus();
           return;

    };

    
            if (ca_unidades % 1 != 0){

            toastr.error("Error", 'Ingrese un número entero');

          $('#ca_unidades').focus();
            return false;
        }


          if ($('#ca_unidades').val() <= 0) {


            toastr.error("Error", 'Ingrese cantidad válida');
          $('#ca_unidades').focus();
            return false;
        }

    <?php else: ?>

        var ca_unidades = 0;

        <?php endif; ?>

                               $.ajax({
        method: "POST",
        data: {'co_producto_publicaciones':co_producto_publicaciones, 'ca_unidades':ca_unidades, 'co_carro_compras':co_carro_compras, 'ca_precio':ca_precio, 'nb_tipo_venta':nb_tipo_venta},
        url: "<?php echo site_url('compra/ejecutar_agregar_carro') ?>",
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                      if (obj.error > 0)

                      {
               
                        toastr.error("Error", obj.message);
                        return;


                      }else{


                    var url = "<?php echo site_url() ?>compra/agregar_carro"+'/'+co_producto_publicaciones;

                    var total = ca_unidades * ca_precio;

                     $("#td_unidades_comprado_"+co_producto_publicaciones).html(ca_unidades);
                     $("#td_unidades_total_"+co_producto_publicaciones).html(total);


                $("#td_"+co_producto_publicaciones).html('<div class="dropdown"><button class="btn btn-clean font-weight-bolder btn-sm mr-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajustar</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="javascript:" onclick="comprar_modal('+co_producto_publicaciones+')" >Ajustar</a> <a class="dropdown-item" href="javascript:" onclick="eliminar_producto('+co_producto_publicaciones+')">Cancelar</a> </div></div>');

                   $(".info_compra_general").load("<?php echo base_url(); ?>/biomercado/info_compra_general");

                   if ( $("#reload_carrito").length > 0 ) {
                    $("#reload_carrito").load("<?php echo base_url(); ?>/biomercado/reload_carro_compra");
                   }

                   $('#ajax_remote').modal('hide');


                      }


   
                      }).fail(function(){



                    alert('Fallo');


                      }); 




}


function calcular_sub_total() {

    var ca_unidades = $('#ca_unidades').val();
    var sub_total_unidad =  ca_unidades * <?php echo $info_producto_publicaciones->ca_precio; ?>;
    $('#calcular_sub_total').html(sub_total_unidad+' <?php echo $info_producto_publicaciones->nb_acronimo; ?>');
   
    // body...
}


</script>