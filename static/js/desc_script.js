
window.onload = function () {
    var desc_img = document.getElementsByClassName('desc-img'),
        fps = 60;

    /*desc_img[0].addEventListener('mouseenter', function (event) {
        console.log('mouseenter');
        var start = Date.now(),
            bg_size = 60,
            i = 1,
            timer = setInterval(function() {
                i *= 2;
                bg_size = bg_size + i;
                console.log(i + " i | bg-size " + bg_size);
                var timePassed = Date.now() - start;
                if (bg_size >= 100) {
                    clearInterval(timer);
                    return;
                }
                desc_img[0].style.backgroundSize = bg_size + '%';
            }, 1000 / fps);
    });
    desc_img[0].addEventListener('mouseout', function (event) {
        console.log('mouseout');
        var start = Date.now(),
            bg_size = 100,
            i = 1,
            timer = setInterval(function() {
                i *= 2;
                bg_size = bg_size - i;
                console.log(i + " i | bg-size " + bg_size);
                var timePassed = Date.now() - start;
                if (bg_size <= 60) {
                    i = 1;
                    clearInterval(timer);
                    return;
                }
                desc_img[0].style.backgroundSize = bg_size + '%';
            }, 1000 / fps);
    });*/
};