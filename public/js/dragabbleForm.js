$(document).ready(function() {
    var dropzone = $('#dropzone');

    dropzone.on('dragover', function(e) {
        e.preventDefault();
    })

    dropzone.on('drop', function(e) {
        e.preventDefault();

        var files = e.originalEvent.dataTransfer.files;
        var formData = new FormData();

        formData.append('_token', $('input[name="_token"]'))

        for (var i = 0; i < files.length; i++) {
            console.log(files[i]);
            formData.append('images[]', files[i]);
        }

        var currentUrl = window.location.href;
        var urlParts = currentUrl.split('/');
        var raceId = urlParts[urlParts.length - 1];
        var url = '/admin/raceimages/store/' + raceId;
        console.log(url)

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Archivos subidos correctamente');
                // Aquí puedes manejar la respuesta del servidor si es necesario
            },
            error: function(xhr, status, error) {
                console.error('Error al subir archivos:', error);
                // Manejar errores aquí
            }
        });
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
    });
});
