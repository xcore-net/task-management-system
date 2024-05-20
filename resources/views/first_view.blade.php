<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Laravel App</title>

    <!-- Add Bootstrap for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <style>
        body {
            background-color: #f8fafc;
        }
        .container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="jumbotron text-center">
        <h1 class="display-4">{{ __('Welcome to My Laravel App!') }}</h1>
        <p class="lead">{{ __('This is a simple Laravel application.') }}</p>
        <hr class="my-4">
        <p>{{ __('Click the button below to learn more.') }}</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">{{ __('Learn more') }}</a>
    </div>
</div>

<!-- Add Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
