window.onload = function () {
    console.log('DOM модель подгружена');
    $("div.upload-btn").on("click", function (event) {
        $('.upload-image-input').click();
        $(".upload-image-input").on('change', function () {
            var file_data = $('.upload-image-input').prop('files')[0];
            var form_data = new FormData();
            form_data.append('user_image', file_data);
            $.ajax({
                url: '/upload/image', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    alert(response);
                    $(".editing-form").css('display', 'block'); 
                },
                error: function (response) {
                    alert("ERRORRRRLRLLRSDASD sdgadfg////...");
                }
            });
        });
    });
    $("div.cancel-editing-form").on("click", function (event) {
        $(".editing-form").css('display', 'none');
        console.log('Закрытие формы обработки фотографии');
    });
    
}