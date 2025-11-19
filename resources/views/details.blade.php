@extends('layouts.app')

@section('title', 'Detalles del producto')

@section('content')
    <h3>Detalles del producto</h3>

    {{-- Volver a /home respetando filtros si los había --}}
    <p>
        <a href="{{ route('home', ['category' => $category, 'order' => $order]) }}">
            ↩ Volver a la lista de productos
        </a>
    </p>

    {{-- Mostrar errores de validación --}}
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

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <p style="color: green; font-weight: bold;">
            {{ session('success') }}
        </p>
    @endif

    {{-- FORMULARIO UPDATE (UPDATE) --}}
    <form method="POST" action="{{ route('product.update', $product->id) }}">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <th>ID</th>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
                </td>
            </tr>
            <tr>
                <th>Categoría</th>
                <td>
                    <select name="category" required>
                        <option value="Informática" {{ old('category', $product->category) == 'Informática' ? 'selected' : '' }}>Informática</option>
                        <option value="Ropa" {{ old('category', $product->category) == 'Ropa' ? 'selected' : '' }}>Ropa</option>
                        <option value="Hogar" {{ old('category', $product->category) == 'Hogar' ? 'selected' : '' }}>Hogar</option>
                        <option value="Deportes" {{ old('category', $product->category) == 'Deportes' ? 'selected' : '' }}>Deportes</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Precio (€)</th>
                <td>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>
                </td>
            </tr>
        </table>

        <p style="margin-top: 15px;">
            <button type="submit">💾 Guardar cambios</button>
        </p>
    </form>

    {{-- FORMULARIO DELETE (DELETE) --}}
    <form method="POST" action="{{ route('product.delete', $product->id) }}" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: red;">🗑 Eliminar producto</button>
    </form>
@endsection

