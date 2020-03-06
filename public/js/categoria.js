$(document).on('click', '#saveBtn', function(event){
	event.preventDefault(); 
	var pagina = $('input[name=pagina]').val();
	var nombre = $('input[name=nombre]').val();
	var orden = $('input[name=orden]').val();
	var id = $('input[name=id]').val();
	var elemento = $("input[name=elemento]").val();
	var ruta = $('#rutacrear').attr('href');

  if(nombre.length != 0 && orden.length != 0){

	$('#ajaxModel').modal('hide');

	 $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
  	$.ajax({
    	  url:ruta,
	      method:"POST",
    	  data:{id:id, nombre:nombre, orden:orden, elemento:elemento, page:pagina},
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
       	    $('#orden').val(data.orden);
        	$('#modelHeading').html("Edita elemento");
        	$('#ajaxModel').modal('show');
      	}
    	});
    });


$("#orden").bind('keypress', function(event) {
  var regex = new RegExp("^[0-9]+$");
  var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!regex.test(key)) {
    event.preventDefault();
  }
});