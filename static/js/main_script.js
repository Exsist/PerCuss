function rus_to_latin ( str ) {

    var ru = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
        'е': 'e', 'ё': 'e', 'ж': 'j', 'з': 'z', 'и': 'i',
        'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
        'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
        'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh',
        'щ': 'sch', 'ы': 'y', 'э': 'e', 'ю': 'u', 'я': 'ya'
    }, n_str = [];

    str = str.replace(/[ъь]+/g, '').replace(/й/g, 'i');

    for ( var i = 0; i < str.length; ++i ) {
        n_str.push(
            ru[ str[i] ]
            || ru[ str[i].toLowerCase() ] == undefined && str[i]
            || ru[ str[i].toLowerCase() ].replace(/^(.)/, function ( match ) { return match.toUpperCase() })
        );
    }

    return n_str.join('');
}

var nameImage,
    editingNameImage,
    counterImage;

window.onload = function () {
    var upload_btn = document.getElementById("upload-btn"),
        upload_input = document.getElementById("upload-image-input"),
        preset_1_effect_1_button = document.getElementById("editing-base-preset-1"),
        preset_1_effect_2_button = document.getElementById("editing-base-preset-2"),
        preset_1_effect_3_button = document.getElementById("editing-base-preset-3"),
        preset_1_effect_4_button = document.getElementById("editing-base-preset-4"),
        cancel_editing_form = document.getElementById("cancel-editing-form"),
        download_button = document.getElementById("save"),
        download_image = document.getElementById("save-image"),
        loader_action = document.getElementsByClassName('loader-action'),
        editing_image = document.getElementsByClassName('editing-image'),
        editing_form = document.getElementsByClassName('editing-form'),
        opas_save = 0.1,
        opas_cancel = 0.1;

    upload_btn.addEventListener("click", function (event){
        upload_input.click();
    });
    upload_input.addEventListener("change", function(event){
        loader_action[0].style.display = 'block';
        var file_data = upload_input.files[0],
            form_data = new FormData();
        form_data.append("user_image", file_data);
        nameImage = file_data["name"];
        console.log(nameImage);
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {

            editing_form[0].style.display = 'block';
            var fps = 60,
                opacity = 100,
                timer = setInterval(function() {
                    opacity -= 5;
                    var timePassed = Date.now() - start;
                    editing_form.style.opacity = opacity + '%';
                    if (opacity >= 100) {
                        clearInterval(timer);
                        return true;
                    }
                }, 1000 / fps);
            // TODO: сделать генерацию отредактированных изображений в зависимости от картинки
            preset_1_effect_1_button.style.backgroundImage = 'url("/static/images/effects/base-1.jpg")';
            preset_1_effect_2_button.style.backgroundImage = 'url("/static/images/effects/base-2.jpg")';
            preset_1_effect_3_button.style.backgroundImage = 'url("/static/images/effects/base-3.jpg")';
            preset_1_effect_4_button.style.backgroundImage = 'url("/static/images/effects/base-4.jpg")';
            editingNameImage = 'editing-' + rus_to_latin(file_data['name']);
            editing_image[0].style.backgroundImage = 'url("/uploads/' + editingNameImage + '")';
            counterImage = 0;
            loader_action[0].style.display = 'none';
        };
        xhr.open("post", "/upload/image", true);
        xhr.send(form_data);
    });
    preset_1_effect_1_button.addEventListener("click", function () {
        loader_action[0].style.display = 'block';
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            loader_action[0].style.display = 'none';
            counterImage++;
            editing_image[0].style.backgroundImage = 'url("/uploads/' + counterImage + editingNameImage + '")';
        };
        xhr.open("post", "/preset/effect/base/1", true);
        xhr.send();
    });
    preset_1_effect_2_button.addEventListener("click", function () {
        loader_action[0].style.display = 'block';
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            loader_action[0].style.display = 'none';
            counterImage++;
            editing_image[0].style.backgroundImage = 'url("/uploads/' + counterImage + editingNameImage + '")';
        };
        xhr.open("post", "/preset/effect/base/2", true);
        xhr.send();
    });
    preset_1_effect_3_button.addEventListener("click", function () {
        loader_action[0].style.display = 'block';
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            loader_action[0].style.display = 'none';
            counterImage++;
            editing_image[0].style.backgroundImage = 'url("/uploads/' + counterImage + editingNameImage + '")';
        };
        xhr.open("post", "/preset/effect/base/3", true);
        xhr.send();
    });
    preset_1_effect_4_button.addEventListener("click", function () {
        loader_action[0].style.display = 'block';
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            loader_action[0].style.display = 'none';
            counterImage++;
            editing_image[0].style.backgroundImage = 'url("/uploads/' + counterImage + editingNameImage + '")';
        };
        xhr.open("post", "/preset/effect/base/4", true);
        xhr.send();
    });
    cancel_editing_form.addEventListener("click", function (event) {
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            var fps = 60,
                opacity = 100,
                timer = setInterval(function() {
                    opacity -= 5;
                    var timePassed = Date.now() - start;
                    editing_form.style.opacity = opacity + '%';
                    if (opacity <= 0) {
                        clearInterval(timer);
                        return true;
                    }
                }, 1000 / fps);
            editing_form[0].style.display = 'none';
            editing_image[0].style.backgroundImage = '';
        };
        xhr.open("post", "/cancel", true);
        xhr.send();
    });
    cancel_editing_form.addEventListener('mouseenter', function (event) {
        var start = Date.now(),
            fps = 60,
            timer = setInterval(function() {
                opas_cancel += 0.02;
                var timePassed = Date.now() - start;
                if (opas_cancel >= 0.30) {
                    clearInterval(timer);
                    return;
                }
                cancel_editing_form.style.background = 'linear-gradient(to left, rgba(208, 129, 77, ' + opas_cancel + ') 0%,rgba(150,150,150,0) 100%)';
            }, 1000 / fps);

    });
    cancel_editing_form.addEventListener('mouseout', function (event) {
        var start = Date.now(),
            fps = 60,
            timer = setInterval(function() {
                opas_cancel -= 0.02;
                var timePassed = Date.now() - start;
                if ( opas_cancel <= 0.10) {
                    clearInterval(timer);
                    return;
                }
                cancel_editing_form.style.background = 'linear-gradient(to left, rgba(208, 129, 77, ' + opas_cancel + ') 0%,rgba(150,150,150,0) 100%)';
            }, 1000 / fps);

    });
    download_image.addEventListener("click", function (event) {
        loader_action[0].style.display = 'block';
        download_button.setAttribute('href', '/uploads/' + editingNameImage);
        download_button.click();
        loader_action[0].style.display = 'none';
    });
    download_image.addEventListener('mouseenter', function (event) {
        var start = Date.now(),
            fps = 60,
            timer = setInterval(function() {
                opas_save += 0.02;
                var timePassed = Date.now() - start;
                if (opas_save >= 0.30) {
                    clearInterval(timer);
                    return;
                }
                download_image.style.background = 'linear-gradient(to right, rgba(185, 121, 255, ' + opas_save + ') 0%,rgba(150,150,150,0) 100%)';
            }, 1000 / fps);

    });
    download_image.addEventListener('mouseout', function (event) {
        var start = Date.now(),
            fps = 60,
            timer = setInterval(function() {
                opas_save -= 0.02;
                var timePassed = Date.now() - start;
                if (opas_save <= 0.10) {
                    clearInterval(timer);
                    return;
                }
                download_image.style.background = 'linear-gradient(to right, rgba(185, 121, 255, ' + opas_save + ') 0%,rgba(150,150,150,0) 100%)';
            }, 1000 / fps);

    });
};