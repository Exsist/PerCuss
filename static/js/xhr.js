
var nameImage,
    editingNameImage;

window.onload = function () {
    var upload_btn = document.getElementById("upload-btn"),
        upload_input = document.getElementById("upload-image-input"),
        preset_folder_button = document.getElementById("editing-folder-presets"),
        cancel_editing_form = document.getElementById("cancel-editing-form");
    console.log(upload_btn);
    console.log(upload_input);
    console.log(preset_folder_button);
    console.log(cancel_editing_form);
    upload_btn.addEventListener("click", function (event){
        upload_input.click();
        console.log("success");
    });
    upload_input.addEventListener("change", function(event){
        var file_data = upload_input.files[0],
            form_data = new FormData();
        form_data.append("user_image", file_data);
        nameImage = file_data["name"];
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            $(".editing-form").css('display', 'block');
            imagePath = '/uploads/' + nameImage;
            editingNameImage = '/uploads/editing-' + nameImage;
            $('.editing-image').css('background-image', 'url("' + editingNameImage + '")');
        };
        xhr.open("post", "/upload/image", true);
        xhr.send(form_data);
    });
    preset_folder_button.addEventListener("click", function () {
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            $('.editing-image').css('background-image', 'url("' + editingNameImage + '")');
        };
        xhr.open("post", "/preset/effect/base/1", true);
        xhr.send();
        console.log("success add filter raz");
    });
    cancel_editing_form.addEventListener("click", function (event) {
        $(".editing-form").css('display', 'none');
        $('.editing-image').css('background-image', '');
    })

};

