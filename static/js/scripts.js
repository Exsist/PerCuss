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

function refreshBackgroundSI() {
    setInterval(function() {
        console.log('refresh');
        $(".editing-image").attr("src", editingImagePath);
    }, 250);
}

function refreshBackgroundRCO(editingImagePath, counter, nameImage) {
    counter++;
    editingImagePath = '/uploads/editing-' + counter + nameImage;
    console.log('refresh');
    $('.editing-image').css('background-image', 'url("' + editingImagePath + '")');
}


function download_img(url){
    var link = document.createElement('a');
    link.target = "_blank";
    link.download = nameImage;
    link.href = url;
    link.click();
}


var editingImagePath;
var imagePath;
var zoneImage;
var nameImage;
var counterImage = 0;

$.session.set("image_counter", counterImage);

window.onload = function () {
    zoneImage = document.querySelector('.editing-zone-image');

    $("div.upload-btn").on("click", function (event) {
        $("input.upload-image-input").click().on('change', function () {
            var file_data = $('.upload-image-input').prop('files')[0];
            console.log(file_data);
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
                    nameImage = file_data["name"];
                    imagePath = '/uploads/' + nameImage;
                    editingImagePath = '/uploads/editing-' + nameImage;
                    $('.editing-image').css('background-image', 'url("' + editingImagePath + '")');
                }
            });
        });
    });
    $("div.cancel-editing-form").on('click', function (event) {
        $('div.editing-form').css('display', 'none');
        $(".editing-image").css("background-image", 'none');
        console.log('Закрытие формы обработки фотографии');
    });
    $("div.editing-folder-presets").on('click', function (event) {
        $.ajax({
            url: '/preset/effect/base/1',
            type: 'post',
            success: function (response) {
                console.log('success filter add');
                counterImage++;
                $.session.set("image_counter", counterImage);
                editingImagePath = '/uploads/editing-'+ counterImage + nameImage;
                $('.editing-image').css('background-image', 'url("' + editingImagePath + '")');

            }
        });
    });
    $("div.editing-preset-base-1").on('click', function (event) {

    });
    $("[data-download_img]").click(function(){
        var url=$(this).attr('data-download_img');
        download_img(url);
    });
    $("div.action-choose-buttons").on("click", function (event) {
       if ($("div.editing-presets").css('display') == "block") {
           $("div.editing-presets").css('display', 'none');
           $("div.editing-methods").css('display', 'block');
           $("div.action-choose-buttons").css('display', 'none');
       }
    });

        // LOGIN
    $("div.login-form .login-zone .login-content input.button").on('change', function (event) {
        $.ajax({
            url: '/login',
            cache: false,
            contentType: false,
            processData: false,
            type: 'post',
            success: function (response) {
                $('.successful-authorization').css('display', 'block');
            }
        });
    });
    $("div.login-form").on('click', function () {

    });
    $("div.menu-l a #login").on("click", function (event) {
        $("div.menu-l a #login").css();
        $("div.login-form").css('display', "block");
    });
    if ($('.successful-authorization').css("display") == 'block') {
        console.log('adfadadasd');
        setTimeout( function(){$('.successful-authorization').css('display', 'none');}, 4000);
    }
};
