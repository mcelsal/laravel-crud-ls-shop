@extends('layouts.app')

@section('title', 'Página Home')

@section('content')
    <p>Bienvenida a la página principal de LS Shop.</p>
    <p>Mostramos la lista de productos.</p>
   
    <h3>Crear nuevo producto</h3>

    {{-- Mostrar mensaje de éxito --}}
    @if(session('success'))
        <p style="color: green; font-weight: bold;">
            {{ session('success') }}
        </p>
    @endif

    {{-- Mostrar errores --}}
    @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <strong>Hay errores en el formulario:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('product.store') }}" style="margin-bottom: 30px; padding: 15px; border: 1px solid #6D7529; border-radius: 8px; background-color: #F5F7DC;">
        @csrf

        <p>
            <label><strong>Nombre:</strong></label><br>
            <input type="text" name="name" required>
        </p>

        <p>
            <label><strong>Categoría:</strong></label><br>
            <select name="category" required>
                <option value="">Selecciona una opción</option>
                <option value="Informática">Informática</option>
                <option value="Ropa">Ropa</option>
                <option value="Hogar">Hogar</option>
                <option value="Deportes">Deportes</option>
            </select>
        </p>

        <p>
            <label><strong>Precio (€):</strong></label><br>
            <input type="number" name="price" step="0.01" required>
        </p>

        <button type="submit">➕ Crear producto</button>
    </form>
        <form method="GET" action="{{ url('/home') }}" style="margin-bottom: 20px;">
            <label for="category"><strong>Filtrar por categoría:</strong></label>
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="">Todas</option>
                <option value="Informática" {{ request('category') == 'Informática' ? 'selected' : '' }}>Informática</option>
                <option value="Ropa" {{ request('category') == 'Ropa' ? 'selected' : '' }}>Ropa</option>
                <option value="Hogar" {{ request('category') == 'Hogar' ? 'selected' : '' }}>Hogar</option>
                <option value="Deportes" {{ request('category') == 'Deportes' ? 'selected' : '' }}>Deportes</option>
            </select>

            &nbsp;&nbsp;

            <label for="order"><strong>Ordenar por precio:</strong></label>
            <select name="order" id="order" onchange="this.form.submit()">
                <option value="">Sin orden</option>
                <option value="asc"  {{ request('order') == 'asc' ? 'selected' : '' }}>Precio ascendente</option>
                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Precio descendente</option>
            </select>
    </form>        
    
    @if($products->isEmpty())
        <p>No hay productos en la base de datos.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio (€)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <a href="{{ route('details', [
                                'id'       => $product->id,
                                'category' => request('category'),
                                'order'    => request('order'),
                            ]) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ $product->category }}</td>
                        <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
