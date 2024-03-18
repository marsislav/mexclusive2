document.addEventListener("DOMContentLoaded", function() {
    // Add loaded class to body when the page is fully loaded
    document.body.classList.add('loaded');
});

/*FlexSlider*/

// Can also be used with $(document).ready()
const carousel = new bootstrap.Carousel('#mainSlider')