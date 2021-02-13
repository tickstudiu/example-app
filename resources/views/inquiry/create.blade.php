<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
<div id="app">
    <Create></Create>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
