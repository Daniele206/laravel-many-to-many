<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.css' integrity='sha512-U9Y1sGB3sLIpZm3ePcrKbXVhXlnQNcuwGQJ2WjPjnp6XHqVTdgIlbaDzJXJIAuCTp3y22t+nhI4B88F/5ldjFA==' crossorigin='anonymous'/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Auth-guest</title>
</head>
<body>
    @include('admin.partials.header')
    <div class="container-fluid cont_h">
        <div class="row h-100">
            @include('admin.partials.aside')
            @yield('content')
        </div>
    </div>
</body>
</html>
