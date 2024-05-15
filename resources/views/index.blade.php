<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="{{ asset('favicon.jpeg') }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta name="description" content="Web site created using create-react-app" />
    <link rel="apple-touch-icon" href="{{ asset('logo192.png') }}" />

    <title>{{ env('APP_NAME', 'Lara') }}</title>

    {{ Baezeta\App\Shared\Utils\HtmlUtils::css() }}

</head>
<body>
    <div id="root">
        {{ Baezeta\App\Shared\Utils\HtmlUtils::js() }}
    </div>
</body>



</html>