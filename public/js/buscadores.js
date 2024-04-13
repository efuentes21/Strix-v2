$(document).ready(function () {
    $('#barra-busqueda').on('keyup', function() {
        var query = $(this).val();
        var url = $('#barra-busqueda').data('url');
        $.ajax({
            url: url,
            method: 'GET',
            data: {query: query},
            success: function(response) {
                console.log(response);
                
                // Reemplazar el contenido del div tbodyCont con los resultados de la búsqueda
                $('#race-container').html(response);
    
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
});
