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


window.onload = function () {


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
