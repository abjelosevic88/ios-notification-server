<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    </head>
    <body>
        <div class="container">
            {{--<form method="POST" action="/files" enctype="multipart/form-data">--}}
                {{--{{ csrf_field() }}--}}
                {{--<input type="file" name="file" />--}}
                {{--<button type="submit">Save File</button>--}}
            {{--</form>--}}

            <alert>
                <strong>General!</strong> Your account has not been updated.
            </alert>

            <alert type="error">
                <strong>Error!</strong> Your account has not been updated.
            </alert>

            <alert type="success">
                <strong>Success!</strong> Your account has not been updated.
            </alert>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
