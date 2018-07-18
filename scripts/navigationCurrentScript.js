try {
    let el = document.getElementById('menu').getElementsByTagName('a');
    let url = document.location.href;
    for (let i = 0; i < el.length; i++) {
        if (url == el[i].href) {
            el[i].className += ' current_menu';
        }
    }
} catch (e) {
    console.log("exception_1");
}





