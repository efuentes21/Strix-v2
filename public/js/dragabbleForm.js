$(document).ready(function() {
    var dropzone = $('#dropzone');

    dropzone.on('dragover', function(e) {
        e.preventDefault();
    })

    dropzone.on('drop', function(e) {
        e.preventDefault();

        var files = e.originalEvent.dataTransfer.files;
        var dropzone = document.getElementById('dropzone');
        var formData = new FormData();

        formData.append('_token', $('input[name="_token"]'))

        if(files.length > 0){
            var dataFiles = new DataTransfer();
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (file.type.startsWith('image/')) {
                    var imageUrl = URL.createObjectURL(file);

                    // Crear un elemento imagen y establecer su src en la URL del objeto
                    var img = new Image();
                    img.src = imageUrl;
                    dropzone.appendChild(img);

                    if(files.length){
                        // Attach uploaded files to images input
                        var input = document.getElementById('images');
                        
                        // Add the file to the DataTransfer
                        dataFiles.items.add(file);
                        img.classList.add('img-thumbnail');
                        input.files = dataFiles.files;

                        console.log(files[i]);
                        formData.append('images[]', files[i]);
                    }
                }

                // var currentUrl = window.location.href;
                // var urlParts = currentUrl.split('/');
                // var raceId = urlParts[urlParts.length - 1];
                // var url = '/admin/raceimages/store/' + raceId;
                // console.log(url);

                // $.ajax({
                //     url: url,
                //     type: 'POST',
                //     data: formData,
                //     processData: false,
                //     contentType: false,
                //     success: function(response) {
                //         console.log('Archivos subidos correctamente');
                //         // Aquí puedes manejar la respuesta del servidor si es necesario
                //     },
                //     error: function(xhr, status, error) {
                //         console.error('Error al subir archivos:', error);
                //         // Manejar errores aquí
                //     }
                // });
                // for (var pair of formData.entries()) {
                //     console.log(pair[0] + ', ' + pair[1]);
                // }
            }
        }
    });
});

/*
document.addEventListener("DOMContentLoaded", function() {
    // Escuchar el evento drop en todo el documento
    document.addEventListener('drop', drop);

    // Cancelar la propagación del evento dragover en todo el documento
    document.addEventListener('dragover', function(event) {
        event.preventDefault();
        event.stopPropagation();
    });
});

function drop(event) {
    event.preventDefault();

    // Obtener el área de soltar y el formulario
    var dropzone = document.getElementById('dropzone');
    var form = document.querySelector('form');

    // Obtener los archivos (imágenes) que se soltaron
    var files = event.dataTransfer.files;

    // Verificar si se soltaron archivos
    if (files.length > 0) {
        // Iterar sobre cada archivo
        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            if (file.type.startsWith('image/')) {
                var imageUrl = URL.createObjectURL(file);

                // Crear un elemento imagen y establecer su src en la URL del objeto
                var img = new Image();
                img.src = imageUrl;
                img.classList.add('img-thumbnail');
                // Agregar la imagen al área de soltar
                dropzone.appendChild(img);

                // Crear un campo de tipo input de archivo para almacenar la imagen como archivo
                var input = document.createElement('input');
                input.type = 'file';
                input.name = 'imgCarrera[]'; // Usar el mismo nombre que en el formulario
                input.id = 'imgCarrera'; // Usar el mismo id que en el formulario
                
                // Crear un objeto FileList con el archivo y asignarlo al input
                var fileList = new DataTransfer();
                fileList.items.add(file);
                input.files = fileList.files;

                // Agregar el campo de input al formulario
                form.appendChild(input);

                var inputValue = document.getElementById('imgCarrera').value;
                console.log('Valor del input después de agregar los archivos:', inputValue);
            }
        }
    }
}
*/