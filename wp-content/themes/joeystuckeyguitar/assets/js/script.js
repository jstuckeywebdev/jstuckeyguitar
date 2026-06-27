document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.testimonial-slider', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // Desktop vs Mobile settings
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 40
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNav = document.querySelector('.main-navigation');

    menuToggle.addEventListener('click', function () {
        // Toggle the class that controls the 'right: 0' CSS
        siteNav.classList.toggle('is-open');

        // Optional: Change the hamburger icon to an 'X'
        menuToggle.classList.toggle('is-active');
        
        // Accessibility: Tell screen readers if it's open
        const expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
        menuToggle.setAttribute('aria-expanded', !expanded);
    });
});

window.addEventListener('load', function() { // Use 'load' so fonts/styles are fully ready
    const wrappers = document.querySelectorAll('.description-wrapper');

    wrappers.forEach(wrapper => {
        const button = wrapper.nextElementSibling; // Finds the button right after it

        // Check if the actual content is taller than the visible box
        if (wrapper.scrollHeight > wrapper.offsetHeight) {
            button.style.display = 'block'; // Show the button only if needed
        }
    });

    // Keep your existing click listener code here
    const readMoreButtons = document.querySelectorAll('.read-more-btn');
    readMoreButtons.forEach(button => {
        button.addEventListener('click', function() {
            const wrapper = this.previousElementSibling;
            wrapper.classList.toggle('is-open');
            this.textContent = wrapper.classList.contains('is-open') ? 'Read Less' : 'Read More';
        });
    });
});


// FAQ Logic
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.schema-faq-question');

    const faqSections = document.querySelectorAll('.schema-faq-section');

    faqSections.forEach(section => {
        section.classList.add('bg-parchment');
    })

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            // Toggle the 'is-active' class for the icon animation
            question.classList.toggle('is-active');

            // Find the answer immediately following the question
            const answer = question.nextElementSibling;

            // Toggle visibility
            if (answer.style.display === "block") {
                answer.style.display = "none";
            } else {
                answer.style.display = "block";
            }
        });
    });
});