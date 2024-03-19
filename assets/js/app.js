document.addEventListener("DOMContentLoaded", function() {
    // Add loaded class to body when the page is fully loaded
    document.body.classList.add('loaded');
});

// Can also be used with $(document).ready()


//search
jQuery(document).ready(function($) {
    $('a[href="#search"]').on("click", function(event) {
        event.preventDefault();
        $("#search").addClass("open");
        $('#search > form > input[type="search"]').focus();
    });

    $("#search, #search button.close").on("click keyup", function(event) {
        if (
            event.target == this ||
            event.target.className == "close" ||
            event.keyCode == 27
        ) {
            $(this).removeClass("open");
        }
    });

    $("#search button[type='submit']").on("click", function(event) {
        $(this).closest("form").submit();
    });

    $("form.search-form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        var searchQuery = $(this).find("input[type='search']").val().trim(); // Get the search query
        if (searchQuery !== "") {
            window.location.href = "/?s=" + encodeURIComponent(searchQuery); // Redirect to search results page
        }
    });
});