$('#contratista_reporte').change(function (event) {
  $("#nombre_contratista_reporte"). val('');
  var ruta = "http://localhost:8000/buscar_ccontratista_id/" +event.target.value;
    $.get(ruta,function(res){
        $("#nombre_contratista_reporte"). val(res.nombre);
      });
});
