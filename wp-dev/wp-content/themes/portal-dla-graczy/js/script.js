document.addEventListener('keydown', function(e) {
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const articles = document.querySelectorAll('article');

    let currentIndex = -1;
    let currentSection = '';

    if (document.activeElement.closest('nav')) {
        currentSection = 'navbar';
        currentIndex = Array.from(navLinks).indexOf(document.activeElement);
    } else if (document.activeElement.closest('article')) {
        currentSection = 'articles';
        currentIndex = Array.from(articles).indexOf(document.activeElement);
    }

    if (currentSection === 'navbar') {
        if (e.key === "ArrowRight") {
            if (currentIndex < navLinks.length - 1) {
                navLinks[currentIndex + 1].focus();
            } else {
                navLinks[0].focus();
            }
        }

        if (e.key === "ArrowLeft") {
            if (currentIndex > 0) {
                navLinks[currentIndex - 1].focus();
            } else {
                navLinks[navLinks.length - 1].focus();
            }
        }
    }

    if (currentSection === 'articles') {
        if (e.key === "ArrowDown") {
            if (currentIndex < articles.length - 1) {
                articles[currentIndex + 1].focus();
            } else {
                articles[0].focus();
            }
        }

        if (e.key === "ArrowUp") {

            if (currentIndex > 0) {
                articles[currentIndex - 1].focus();
            } else {
                articles[articles.length - 1].focus();
            }
        }

        if (e.key === "ArrowDown") {
            window.scrollBy(0, 100);
        } else if (e.key === "ArrowUp") {
            window.scrollBy(0, -100);
        }
    }


    if (currentSection === 'navbar' && e.key === "ArrowDown") {
        if (articles.length > 0) {
            articles[0].focus();
        }
    }


    if (currentSection === 'articles' && e.key === "ArrowUp") {
        if (navLinks.length > 0) {
            navLinks[0].focus();
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const firstNavLink = document.querySelector('.navbar-nav .nav-link');
    if (firstNavLink) {
        firstNavLink.focus();
    }
});
