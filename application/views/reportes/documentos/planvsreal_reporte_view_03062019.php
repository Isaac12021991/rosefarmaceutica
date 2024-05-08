<div class="row animated fadeIn">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <?php if ($info_planvsreal->num_rows() > 0) : ?>
      <table class="table compact table-hover" width="100%" id="tabla_2">
        <thead>
          <h4>Plan Vs Real : <b><?php $meses = array("Default","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");  echo $meses[$info_planvsreal->result()[0]->mes]; ?> - <?php echo $info_planvsreal->result()[0]->ano; ?></b></h4>
          <p></p>
          <tr>
            <th width="30%">Producto</th>
            <th width="10%">Plan</th>
            <th width="10%">Real</th>
          </tr>
        </thead> 
        <tbody>
          <?php $con = 0; foreach ($info_planvsreal->result() as $row) : $con ++; ?>
          <tr style="cursor:pointer;">
            <td><b><?php echo $row->nb_producto; ?></b></td>
            <td><?php echo number_format($row->plan,0,',','.'); ?></td>
            <td><?php echo number_format($row->reall,0,',','.'); ?></td>
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