document.addEventListener("DOMContentLoaded", function () {
    // Add loaded class to body when the page is fully loaded
    document.body.classList.add('loaded');
});

// Can also be used with $(document).ready()


//search
jQuery(document).ready(function ($) {
    $('a[href="#search"]').on("click", function (event) {
        event.preventDefault();
        $("#search").addClass("open");
        $('#search > form > input[type="search"]').focus();
    });

    $("#search, #search button.close").on("click keyup", function (event) {
        if (
            event.target == this ||
            event.target.className == "close" ||
            event.keyCode == 27
        ) {
            $(this).removeClass("open");
        }
    });

    $("#search button[type='submit']").on("click", function (event) {
        $(this).closest("form").submit();
    });

    $("form.search-form").submit(function (event) {
        event.preventDefault(); // Prevent the default form submission
        var searchQuery = $(this).find("input[type='search']").val().trim(); // Get the search query
        if (searchQuery !== "") {
            window.location.href = "/?s=" + encodeURIComponent(searchQuery); // Redirect to search results page
        }
    });
});

//Nav

    document.addEventListener('DOMContentLoaded', function () {
    var menuItems = document.querySelectorAll('.navbar-nav > li > a');

    // Add tabindex attribute to menu items
    menuItems.forEach(function (menuItem, index) {
    menuItem.setAttribute('tabindex', index + 1);
});

    // Add keyboard navigation functionality
    document.addEventListener('keydown', function (event) {
    var focusedElement = document.activeElement;
    var currentIndex = Array.from(menuItems).indexOf(focusedElement);

    if (event.altKey && event.key === 'Tab') {
    event.preventDefault();
    if (currentIndex === -1) {
    // If no menu item is focused, focus the first one
    menuItems[0].focus();
} else if (event.shiftKey) {
    // If Shift+Alt+Tab is pressed, navigate to the previous menu item
    var previousIndex = currentIndex === 0 ? menuItems.length - 1 : currentIndex - 1;
    menuItems[previousIndex].focus();
} else {
    // If Alt+Tab is pressed, navigate to the next menu item
    var nextIndex = currentIndex === menuItems.length - 1 ? 0 : currentIndex + 1;
    menuItems[nextIndex].focus();
}
}
});
});

