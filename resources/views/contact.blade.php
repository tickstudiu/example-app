<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    <title>{{env('APP_NAME')}}</title>
</head>
<body>
    <div id="app">
        <contact></contact>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script type="text/javascript">

    $('#create-form').on('submit', function(event) {
        event.preventDefault();

        $('#name-error').text('');
        $('#email-error').text('');
        $('#mobile-number-error').text('');
        $('#message-error').text('');

        name = $('#name').val();
        email = $('#email').val();
        mobile_number = $('#mobile_number').val();
        message = $('#message').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: '{{url("contact")}}',
            type:'POST',
            data:{
                name: name,
                email: email,
                mobile_number: mobile_number,
                message: message
            },
            success:function(response){
                console.log(response);
            },
            error: function(response) {
                console.log(response);
                $('#name-error').text(response.responseJSON.errors.name);
                $('#email-error').text(response.responseJSON.errors.email);
                $('#mobile-number-error').text(response.responseJSON.errors.mobile_number);
                $('#message-error').text(response.responseJSON.errors.message);
            }
        });

    })
    </script>
</body>
</html>