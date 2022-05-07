<!doctype html>
<html lang="lv">
 
    <head>
        <meta charset="utf-8">
        <title>PD 2 - {{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
 
    <body>
        <div class="bg-light mb-4 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <header class="navbar navbar-light">
                            <span class="navbar-brand mb-0 h1">Kristians Kalnins</span>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container mb-4">
            <div class="row">
                <main class="col-md-6 offset-md-3">
                    
                     @yield('content')

                </main>
            </div>
        </div>
 
        <div class="bg-primary text-white py-4 mt-4">
            <div class="container">
                <div class="row">
                    <footer class="col-md-6 offset-md-3">
                        Ventspils Augstskola, 2021
                    </footer>
                </div>
            </div>
        </div>


    </body>
 
</html>
