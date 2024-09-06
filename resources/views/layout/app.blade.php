<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/cadastro.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #242e2d!important">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('assets/images/logo-palmeiras.jpeg')}}"
                    alt="Palmeiras Academy"
                    width="80"
                    height="80"
                    style="border-radius: 50%"
                />

            </a>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="bg-success py-5">
            <div class="container text-center text-white">
                <p>
                    Todos os direitos reservados
                </p>
                <p>Copyright &copy; {{now()->format('Y')}} Palmeiras Handball Academy</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
