$(document).ready(function() {
    // Dosya seçildiğinde önizleme yap
    $('#file-input').on('change', function() {
        var files = Array.from($(this)[0].files);
        files.forEach(function(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-container').append('<img src="' + e.target.result + '" class="preview-image">');
            };
            reader.readAsDataURL(file);
        });
    });

    // Dosyaları yükle
    $('#upload-button').on('click', function() {
        var files = Array.from($('#file-input')[0].files);
        var formData = new FormData();
        files.forEach(function(file) {
            formData.append('files[]', file);
        });

        $('#upload-progress').html('Yükleniyor...');
        $.ajax({
            url: 'resimyukle.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            xhr: function() {
                var xhr = new XMLHttpRequest();
                xhr.upload.onprogress = function(e) {
                    if (e.lengthComputable) {
                        var percent = (e.loaded / e.total) * 100;
                        $('#upload-progress').html('Yükleniyor... ' + percent.toFixed(2) + '%');
                    }
                };
                return xhr;
            },
        }).done(function(data) {
            $('#upload-progress').empty();
            $('#upload-results').html(data);
        }).fail(function() {
            $('#upload-progress').html('Yükleme hatası.');
        });
    });
});