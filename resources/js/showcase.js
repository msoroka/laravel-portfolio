import Typed from 'typed.js';

let typed = new Typed('#console-typing', {
    strings: [
        '> ./msoroka.dev <br>' +
        '> echo $name; <br>' +
        '> Mateusz Soroka <br>' +
        '> echo $profession; <br>' +
        '> Software Developer <br>' +
        '> echo $experience; <br>' +
        '> 1+ year <br>' +
        '> echo $skills <br>' +
        '> PHP, JavaScript, Laravel, WordPress <br>' +
        '> clear^3000'
    ],
    typeSpeed: 70,
    backSpeed: 0,
    loop: true,
    cursorChar: '',
});

let myNav = document.getElementById('ms-nav');
window.onscroll = function() {
    if (this.scrollY > 50) {
        console.log('juz');
        myNav.classList.add("scrolled");
        myNav.classList.remove("transparent");
    } else {
        myNav.classList.add("transparent");
        myNav.classList.remove("scrolled");
    }
};
