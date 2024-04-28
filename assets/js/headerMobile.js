window.addEventListener('scroll', function() {
    var header = document.querySelector('header');
    var scrollPosition = window.scrollY;

    // Se lo scroll è maggiore di 100px, nascondi l'header
    if (scrollPosition > 100) {
        header.classList.add('hidden');
    } else {
        header.classList.remove('hidden');
    }
});