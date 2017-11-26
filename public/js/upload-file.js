$(function() {
    $('#btn-upload-img').click((e) => {
        e.preventDefault();
        triggerFile("choose-img");
    });

    $('#btn-upload-file').click((e) => {
        e.preventDefault();
        triggerFile("choose-file");
    });

    $('#choose-img').on('change', () => {
        // console.log($('#choose-file').prop('files').length === 0);
        if ($('#choose-img').prop('files').length === 0)
            return;
        $("#form-upload-img").submit();
    });

    $('#choose-file').on('change', () => {
        // console.log($('#choose-file').prop('files').length === 0);
        if ($('#choose-file').prop('files').length === 0)
            return;
        $("#form-upload-file").submit();
    });

    $('#form-upload-img').on('submit', ((e) => {
        e.preventDefault();
        $('#loading').show();
        uploadFileViaAjax("message-img", $('#choose-img').prop('files')[0]);
    }));

    $('#form-upload-file').on('submit', ((e) => {
        e.preventDefault();
        $('#loading').show();
        uploadFileViaAjax("message-file", $('#choose-file').prop('files')[0]);
    }));
});

function uploadFileViaAjax(target, fileData) {
    var formData = new FormData();
    formData.append('file', fileData);
    formData.append('sender', NAME);
    formData.append('sendTime', getTime());
    formData.append('avt', AVT);
    $.ajax({
        xhr: visualizeUpload,
        url: target,
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: (response) => {
            response = JSON.parse(response);
            if (response.hasOwnProperty("success") && response.success === 0) {
                $('#loading').hide();
                if (response.hasOwnProperty("message"))
                    alert(response.message);
                else alert("Sorry, unable to upload your file.");
            }

        }
    });
}

function triggerFile(id) {
    $(`#${id}`).trigger('click');
}

function visualizeUpload() {
    let xhr = new XMLHttpRequest();
    xhr.upload.addEventListener("progress", function(evt) {
        if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
            // console.log(percentComplete);
            $('#total-complete').text(percentComplete + "%");
            if (percentComplete === 100) {

            }
        }
    }, false);
    return xhr;
}