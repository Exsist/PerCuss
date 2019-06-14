
var nameImage,
    editingNameImage,
    counterImage;

window.onload = function () {
    var upload_btn = document.getElementById("upload-btn"),
        upload_input = document.getElementById("upload-image-input"),
        preset_1_effect_1_button = document.getElementById("editing-preset-1"),
        preset_1_effect_2_button = document.getElementById("editing-preset-2"),
        cancel_editing_form = document.getElementById("cancel-editing-form"),
        download_image = document.getElementById("save-image");

    upload_btn.addEventListener("click", function (event){
        upload_input.click();
    });
    upload_input.addEventListener("change", function(event){
        $('.loader-action').css('display', 'block');
        var file_data = upload_input.files[0],
            form_data = new FormData();
        form_data.append("user_image", file_data);
        nameImage = file_data["name"];
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            $(".editing-form").css('display', 'block');
            editingNameImage = 'editing-' + file_data['name'];
            $('.editing-image').css('background-image', 'url("/uploads/' + editingNameImage + '")');
            counterImage = 0;
            $('.loader-action').css('display', 'none');
        };
        xhr.open("post", "/upload/image", true);
        xhr.send(form_data);
    });
    preset_1_effect_1_button.addEventListener("click", function () {
        $('.loader-action').css('display', 'block');
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            $('.loader-action').css('display', 'none');
            counterImage++;
            $('.editing-image').css('background-image', 'url("/uploads/' + counterImage + editingNameImage + '")');
        };
        xhr.open("post", "/preset/effect/base/1", true);
        xhr.send();
    });
    preset_1_effect_2_button.addEventListener("click", function () {
        $('.loader-action').css('display', 'block');
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            $('.loader-action').css('display', 'none');
            counterImage++;
            $('.editing-image').css('background-image', 'url("/uploads/' + counterImage + editingNameImage + '")');
        };
        xhr.open("post", "/preset/effect/base/2", true);
        xhr.send();
    });
    cancel_editing_form.addEventListener("click", function (event) {
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            $(".editing-form").css('display', 'none');
            $('.editing-image').css('background-image', '');
        };
        xhr.open("post", "/cancel", true);
        xhr.send();
    });
    download_image.addEventListener("click", function (event) {
        $('.loader-action').css('display', 'block');
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            console.log('EXELENT DOWNLOAD');
            $('.loader-action').css('display', 'none');
        };
        xhr.open("post", "/download/image", true);
        xhr.send();
    });

};