$(function () {
    $('.js-submit').click(function () {

        event.preventDefault();
        error = false;
        var keyword = $('#keyword');
        var price = $('#price');

        keyword.css('border-color', '#694545');
        price.css('border-color', '#694545');

        if (!keyword.val()) {
            error = true;
            keyword.css('border-color', 'red');
        }

        if (!price.val()) {
            error = true;
            price.css('border-color', 'red');
        }

        if (!error) {
            $('#status').html('Please wait...');
            $('#status').css('color', 'blue');
            $.ajax({
                type: 'POST',
                url: "game/go",
                data: {
                    keyword: keyword.val(),
                    price: price.val()
                },
                success: function (data) {
                    console.log(data);
                    if (data == 1) { 
                        $('#status').html('You win!');
                        $('#status').css('color', 'green');
                    } else {
                        $('#status').html('You lose!');
                        $('#status').css('color', 'red');
                    }
                }

            });
        }

    });
});

