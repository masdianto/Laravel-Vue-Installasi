<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        <dashboard :user="{{ $user }}"></dashboard>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
