

  <a class="btn btn-app" href= "/centrocostos/crear/{{$clientes->id}}" id="espera_servicio" ><i class="glyphicon glyphicon-plus"></i> Añadir Centro Costo</a>
<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings">
        <th>
          <input type="checkbox" id="check-all" class="flat">
        </th>

        <th class="column-title">Nombre </th>
        <th class="column-title">Direccion </th>
        <th class="column-title">Contacto </th>

        <th class="column-title no-link last"><span class="nobr"></span>
        </th>
        <th class="bulk-actions" colspan="7">
          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
        </th>
      </tr>
    </thead>

    <tbody>

      @foreach ($centrocostos as $centrocosto)
      <tr class="even pointer">
        <td class="a-center ">
          <input type="checkbox" class="flat" name="table_records">
        </td>
        <td class=" ">{{$centrocosto->nombre}} </td>
        <td class=" ">{{$centrocosto->direccion}}</td>
        <td class=" ">{{$centrocosto->contacto}}</td>

        <td style=" text-align:right;" class=" last"><a href="/centrocosto/editar/{{$centrocosto->id}}"> <img data-toggle="tooltip" title="Editar" class="img-rounded" style="max-height:50px;" src="/images/edit.png" ></a ><a href="/centrocosto/eliminar/{{$centrocosto->id}}"><img data-toggle="tooltip" title="Eliminar"  class="img-rounded" style="max-height:50px;" src="/images/delete1.png" ></a></a>
        </td>
      </tr>
            @endforeach

    </tbody>
  </table>
  {!!$centrocostos->render()!!}
</div>
