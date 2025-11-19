<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - LS Shop</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #FDFFE5;
            color: #2f310bff;
        }

        header {
            background-color: #3E4217;
            color: #CFD426;
            padding: 15px;
            text-align: center;
        }

        footer {
            background-color: #3E4217;
            color: #CFD426;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .container {
            display: flex;
            margin-top: 10px;
            margin-bottom: 60px; 
        }

        .sidebar {
            width: 200px;
            background-color: #6D7529;
            padding: 15px;
        }

        .sidebar h3 {
            color: #CFD426;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }
        
        .sidebar a:link,
        .sidebar a:visited {
            text-decoration: none;
            color: #9FAD3B;
            font-weight: bold;
        }

        .sidebar a:hover {
            text-decoration: underline;
            color: #CFD426; 
        }

        .content {
            flex: 1;
            padding: 20px;
        }
        
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
            background-color: #F5F7DC;
            color: #3E4217;
            font-size: 16px;
            border: 2px solid #6D7529;
        }
        table {
            margin-left: auto;
            margin-right: auto;
        }

        table th {
            background-color: #6D7529;
            color: #CFD426;
            padding: 10px;
            text-align: left;
        }
       
        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #B7C680;
        }

        table th, table td {
            border-right: 1px solid #6D7529;
        }
        
        table th:last-child,
        table td:last-child {
            border-right: none;
        }
        table tr:nth-child(even) {
            background-color: #E9EDC9;
        }

        table tr:hover {
            background-color: #DDE4AA;
        }

        table th:first-child {
            border-top-left-radius: 6px;
        }

        table th:last-child {
            border-top-right-radius: 6px;
        }

        table {
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

    </style>
</head>
<body>

<header>
    <h1>LS Shop - Práctica Laravel</h1>
</header>

<div class="container">
    <aside class="sidebar">
        <h3>Menú</h3>
        <ul>
            <li><a href="{{ url('/home') }}">Home</a></li>
            {{-- <li><a href="{{ url('/details') }}">Details</a></li> --}}
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <li><a href="{{ url('/offers') }}">Offers</a></li>
        </ul>
    </aside>

    <main class="content">
        <h2>@yield('title')</h2>
        @yield('content')
    </main>
</div>

<footer>
    <p>&copy; {{ date('Y') }} - Práctica ICB0006-UF2-PR01</p>
</footer>

</body>
</html>
