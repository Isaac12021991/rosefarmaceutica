                           <select class="form-control input-sm" id="co_contacto" name="co_contacto">
                              <?php foreach ($list_contactos->result() as $row) {
                                    echo "<option value='" . $row->id . "'>" . $row->nb_cliente . "</option>";
                                } ?>
                           </select>