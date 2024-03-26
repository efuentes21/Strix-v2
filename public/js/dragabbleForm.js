$(document).ready(function() {
    var dropzone = $('#dropzone');

    dropzone.on('dragover', function(e) {
        e.preventDefault();
    })

    dropzone.on('drop', function(e) {
        e.preventDefault();

        var files = e.originalEvent.dataTransfer.files;
        var formData = new FormData();

        for (var i = 0; i < files.length; i++) {
            console.log(files[i]);
            formData.append('images[]', files[i]);
        }

        console.log($('input[name="images[]"]').val());
    });
});
