
	$(document).on('click', '.btn-delete' ,function(e){
		e.preventDefault(); 
		var row = $(this).parents('tr');
		var form = $(this).parents('form');
//		var url = form.attr('action');
		var url = $(this).attr('href');
		var elemento = $("input[name=elemento]").val();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type:"DELETE",
			url:url,
			success: function(data){
				row.fadeOut();
			},
			data:{elemento:elemento},
			error: function(data){
				console.log('Error:', data);
			}

		});

	});


	$(document).on('click', '.page-link', function(event){
    	event.preventDefault(); 
	    var page = $(this).attr('href').split('page=')[1];
	    var ruta = $('#ruta').attr('href');
	    var elemento = $("input[name=elemento]").val();
    	fetch_data(page,elemento,ruta);
    	$('input[name=pagina]').val(page);
 	});

	 function fetch_data(page, elemento,ruta)
 	{
	  $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
  	$.ajax({
    	  url:ruta,
	      method:"POST",
    	  data:{page:page, elemento:elemento},
    	  success:function(data)
      	{
       	$('#table_data').html(data);
      	}
    	});
 	};


 	$(document).on('click', '#createNewProduct',function(){
 		$('#saveBtn').val("create-product");
        $('#id').val('');
        $('#modalform').trigger("reset");
        $('#modelHeading').html("Nuevo elemento");
        $('#ajaxModel').modal('show');


 	});

//    $('#createNewProduct').click(function () {
//        $('#saveBtn').val("create-product");
//        $('#id').val('');
//        $('#modalform').trigger("reset");
//        $('#modelHeading').html("Nuevo elemento");
//        $('#ajaxModel').modal('show');
//
//    });

    