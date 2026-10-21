<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#33271f">
    <title>Caja · Cacao del Perú</title>
    @vite('resources/js/pos/main.ts')
</head>
<body><div id="pos-app"></div><noscript>Activa JavaScript para usar la caja.</noscript></body>
</html>
