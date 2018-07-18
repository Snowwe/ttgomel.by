$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        margin: 10, //Отступ справа у элементов внутри слайдера px
        loop: true, //зацикливание
        slideBy: 4,//Пролистывание слайдера по оси X. Значение ‘page’ позволяет сделать навигацию по странице.
        autoplay: true, //автолистание
        autoplayHoverPause: true, //при наведении мышкой авто пауза
        autoWidth: true,
        responsive: { //Адаптивность. Кол-во выводимых элементов при определенной ширине.
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        },
        nav: true,
        navText: [' <img src="../../images/gallery/prev.png" alt="">',
            ' <img src="../../images/gallery/next.png" alt="">']

    });


    lightbox.options({
        'resizeDuration': 200,
        'wrapAround': true,
        'showImageNumberLabel':false,
        'albumLabel': "Фото %1 из %2"
    })
});