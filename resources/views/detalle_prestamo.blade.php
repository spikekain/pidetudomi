<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">




    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalle de Prestamo <span id="codigo_servicio_espera_procesado">  <span></h4>

      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings">
                <th>
                  <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">Fecha </th>
                <th class="column-title">Descripcion del Prestamos </th>
                <th class="column-title">Total Prestamo </th>
                <th class="column-title">Monto Pendiente </th>

                </th>

              </tr>
            </thead>

            <tbody>
              @foreach ($prestamos as $prestamo)


              <tr class="even pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">{{$prestamo->fecha}}</td>                
                <td class=" ">{{$prestamo->descripcion}}</td>
                  <td class=" ">{{$prestamo->monto}}</td>
                  <td class=" ">{{$prestamo->saldo}}</td>
              </tr>
                    @endforeach

            </tbody>
          </table>
          {!!$prestamos->render()!!}
        </div>
      </div>


    </div>

  </div>
</div>
