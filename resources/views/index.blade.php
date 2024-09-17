<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="antialiased">
    <h1>test</h1>
    <form action="/submit-form" method="post">
        <input type="text" id="lname" name="lname"><br><br>
    </form>

    <script>
        $(document).ready(function() {
            $('#lname').keypress(function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    const val = $(this).val();
                    $.ajax({
                        url: '/submit-form',
                        type: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            val: val
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });

                }
            });
        });
    </script>
</body>

</html>
