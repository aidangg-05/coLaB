$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        // submit the form data to the server using AJAX
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function() {
                // redirect to index.php after successful form submission
                window.location.href = 'index.php';
            }
        });
    });
});