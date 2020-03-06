// $(".decimales").bind('keypress', function (evt){

$(document).on('keypress', '.decimales', function (evt){
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = $(this).val()+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            evt.preventDefault();
        }
    }else{
          if(key == 8 || key == 13 || key == 46 || key == 0) {            
         if(filter(tempValue)=== false){
            evt.preventDefault();
        }
          }else{
              evt.preventDefault();
          }
    }
});

function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}


$(document).on('click', '#saveBtn', function(event){
  event.preventDefault(); 
  var pagina = $('input[name=pagina]').val();
  var nombre = $('input[name=nombre]').val();
  var categoria = $('select[name=categ]').val();
  var unidad = $('select[name=unid]').val();
  var marca = $('select[name=marc]').val();
  var id = $('input[name=id]').val();
  var pc = $('input[name=compra]').val();
  var pv = $('input[name=venta]').val();
  var elemento = $("input[name=elemento]").val();
  var ruta = $('#rutacrear').attr('href');

  if(nombre.length != 0 && marca.length != 0  && categoria.length != 0
       && unidad.length != 0 && unidad.length != 0 && unidad.length != 0){

  $('#ajaxModel').modal('hide');

   $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url:ruta,
        method:"POST",
        data:{id:id, nombre:nombre, marca_id:marca, categoria_id:categoria,
                unidad_id:unidad, p_c:pc, p_v:pv  , elemento:elemento, page:pagina},
        success:function(data)
        {       
          $('#table_data').html(data);
        },
        error: function (data) {
              console.log('Error:', data);
          }
      });

  }

});


$(document).on('click', '.btn-edit' ,function(e){
      e.preventDefault(); 
      var ruta = $(this).attr('href');
      var elemento = $("input[name=elemento]").val();

        $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url:ruta,
        method:"GET",
        data:{elemento:elemento},
        success:function(data)
        { 
          $('#modalform').trigger("reset");
            $('#id').val(data.id);
            $('#nombre').val(data.nombre);
            $("#categ option[value="+ data.categoria_id +"]").attr("selected",true);
            $("#unid option[value="+ data.unidad_id +"]").attr("selected",true);
            $("#marc option[value="+ data.marca_id +"]").attr("selected",true);
            $('#compra').val(data.p_c);
            $('#venta').val(data.p_v);
          $('#modelHeading').html("Edita elemento");
          $('#ajaxModel').modal('show');
        }
      });
    });