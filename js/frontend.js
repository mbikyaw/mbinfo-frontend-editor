/**
 * Created by mbikyaw on 18/9/15.
 */


window.addEventListener('load', function() {
    var main = document.querySelector('.l-main');
    if (main) {
        main.addEventListener('click', onClick, false);
    }

    function onClick(ev) {
        if (ev.target.tagName == 'A' && ev.target.getAttribute('href') == '#edit') {
            ev.preventDefault();
            var title = ev.target.parentElement.parentElement.firstChild.textContent;
            alert('Edit: ' + title);
        }
    }
}, false);