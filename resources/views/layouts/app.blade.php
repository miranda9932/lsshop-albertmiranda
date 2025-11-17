<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tienda Online')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f7f7f7; }
        header { background: #2d3748; color: #fff; padding: 1.5rem 2rem; text-align: center; }
        footer { background: #2d3748; color: #fff; text-align: center; padding: 1rem; position: fixed; bottom: 0; width: 100%; }
        .container { display: flex; min-height: 90vh; }
        nav { background: #edf2f7; min-width: 200px; padding: 2rem 1rem; box-shadow: 2px 0 8px #e2e8f0; }
        nav ul { list-style: none; padding: 0; }
        nav li { margin-bottom: 1.5rem; }
        nav a { color: #2d3748; text-decoration: none; font-weight: bold; }
        nav a.active, nav a:hover { color: #3182ce; }
        main { flex: 1; padding: 2rem; background: #fff; margin-bottom: 3rem; }
    </style>
</head>
<body>
    <header>
        <h1>@yield('header', 'Tienda Online')</h1>
    </header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="/" class="{{ request()->is('/') || request()->is('home') ? 'active' : '' }}">Inicio</a></li>
                <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contacto</a></li>
                <li><a href="/offers" class="{{ request()->is('offers') ? 'active' : '' }}">Ofertas</a></li>
            </ul>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    <footer>
        &copy; {{ date('Y') }} Tienda Online. Todos los derechos reservados.
    </footer>
</body>
</html>
