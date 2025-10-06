$(function () {
    // Validasi Bootstrap
    $("#contactForm input, #contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // Bisa tambahkan pesan error di sini kalau mau
        },
        submitSuccess: function ($form, event) {
            event.preventDefault();

            // Ambil data dari form
            var first_name = $("input#first_name").val();
            var last_name = $("input#last_name").val();
            var subject = $("input#subject").val();
            var description = $("textarea#description").val();

            var $this = $("#sendMessageButton");
            $this.prop("disabled", true);

            // Kirim data ke Laravel pakai AJAX
            $.ajax({
                url: "/contactus", // karena Route::resource('contactus', ...) → POST ke /contactus
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // penting untuk Laravel
                    first_name: first_name,
                    last_name: last_name,
                    subject: subject,
                    description: description
                },
                cache: false,
                success: function (response) {
                    // Pesan sukses
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success')
                        .html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>")
                        .append("<strong>Your message has been sent successfully. </strong>")
                        .append('</div>');

                    // Reset form
                    $('#contactForm').trigger("reset");
                },
                error: function (xhr) {
                    // Pesan error
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger')
                        .html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>")
                        .append($("<strong>").text("Sorry " + first_name + ", it seems that our server is not responding. Please try again later!"))
                        .append('</div>');

                    // Reset form
                    $('#contactForm').trigger("reset");

                    console.error('Error:', xhr.responseText);
                },
                complete: function () {
                    // Re-enable button setelah 1 detik
                    setTimeout(function () {
                        $this.prop("disabled", false);
                    }, 1000);
                }
            });
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    // Support tab Bootstrap
    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// Hapus alert saat user mulai mengetik
$('#first_name').focus(function () {
    $('#success').html('');
});
