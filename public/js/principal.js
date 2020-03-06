$(document).on('click', '.select_categ' ,function(e){
      e.preventDefault(); 
      var ruta = $(this).attr('href');
      $('#id').attr( 'href' ,ruta);

        $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url:ruta,
        method:"GET",
        success:function(data)
        { 

          $('.inyectar').html(data);

        }
      });
    });

$(document).on('click', '.page-link', function(event){
      event.preventDefault(); 
      var page = $(this).attr('href').split('page=')[1];
      var ruta = $('#id').attr('href');

      fetch_data(page,ruta);

  });

function fetch_data(page,ruta)
  {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url:ruta,
        method:"GET",
        data:{page:page},
        success:function(data)
        {
        $('.inyectar').html(data);
        }
      });
  };