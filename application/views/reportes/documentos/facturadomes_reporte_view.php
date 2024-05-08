<div class="row animated fadeIn">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <?php if ($info_facturadomes->num_rows() > 0) : ?>
      <table class="table compact table-hover" width="100%" id="tabla_2">
        <thead>
          <h4>Productos Vendidos por Mes </h4>
          <p></p>
          <tr>
            <th width="30%">Año</th>
            <th width="10%">Mes</th>
            <th width="10%">Principio Activo</th>
            <th width="10%">Cantidad Vendido</th>
            <th width="10%">Precio Bs</th>
            <th width="10%">Precio Usd</th>
            <th width="10%">Tasa</th>
          </tr>
        </thead> 
        <tbody>
          <?php $con = 0; foreach ($info_facturadomes->result() as $row) : $con ++; ?>
          <tr style="cursor:pointer;">
            <td><?php echo $row->anno; ?></td>
            <td><?php echo $row->mes; ?></td>
            <td><b><?php echo $row->principio_activo; ?></b></td>
            <td><?php echo number_format($row->cantidad_vendido,0,',','.'); ?></td>
            <td><?php echo number_format($row->precio_bs,2,',','.'); ?></td>
            <td><?php echo number_format($row->precio_usd,2,',','.'); ?></td>
            <td><?php echo number_format($row->tasa,2,',','.'); ?></td>
          </tr>
          <?php endforeach; ?>   
        </tbody>
      </table>
    <?php else: ?>
      <h4>Sin Registro</h4>
      <p></p>
    <?php endif; ?>
  </div>
</div>

<script type="text/javascript">
    $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );

</script>