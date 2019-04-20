function createFormEditing(editingForm) {
    var cancelEditingForm = document.createElement('div');
    cancelEditingForm.classList.add('cancel-editing-form');
    editingForm.appendChild(cancelEditingForm);
    var cancelForm = document.createElement('div');
    cancelForm.classList.add("cancel");
    cancelForm.innerHTML = '&#10006;';
    cancelEditingForm.appendChild(cancelForm);
    var editingZone = document.createElement('div');
    editingZone.classList.add("editing-zone");
    editingForm.appendChild(editingZone);
    var editingZoneImage = document.createElement('div');
    editingZoneImage.classList.add("editing-zone-image");
    var editingMethods = document.createElement('div');
    editingMethods.classList.add("editing-methods");
    editingZone.appendChild(editingZoneImage);
    editingZone.appendChild(editingMethods);
    var editingImage = document.createElement('div');
    editingImage.classList.add("editing-image");
    editingZoneImage.appendChild(editingImage);
}

window.onload = function () {
    $("div.upload-btn").on("click", function (event) {
        $("input.upload-image-input").click().on('change', function () {
            var file_data = $('.upload-image-input').prop('files')[0];
            var form_data = new FormData();
            form_data.append('user_image', file_data);
            $.ajax({
                url: '/upload/image',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    $(".editing-form").css('display', 'block');
                    $(".editing-image").css("background-image", 'url("/PerCuss/uploads/' + file_data.name + '")');
                }
            });
        });
    });

    $("div.editing-form .cancel-editing-form").on('click', function (event) {
        $('div.editing-form').css('display', 'none');
        $(".editing-image").css("background-image", '');
        console.log('Закрытие формы обработки фотографии');
    });
};
