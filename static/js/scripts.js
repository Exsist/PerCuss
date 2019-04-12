
window.onload = function () {
    console.log('DOM модель подгружена');
    $("div.upload-btn").on("click", function () {
        $('.editing-form').css('display', 'block');
    });
    $("div.cancel-editing-form").on("click", function (event) {
        $(".editing-form").css('display', 'none');
    });
}