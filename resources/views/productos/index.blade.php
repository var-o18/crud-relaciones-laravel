<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('productos.index') }}">Gestión de Productos</a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm p-4">
            <h1 class="mb-4 text-center">Lista de Productos</h1>

            <div class="mb-3 text-end">
                <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo Producto</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-hover align-middle">
                <thead class="text-center">
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th style="width: 200px;">Nombre</th>
                        <th>Descripción</th>
                        <th style="width: 220px;">Fabricante</th>
                        <th style="width: 180px;">Ficha técnica</th>
                        <th style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <td class="text-center">{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>
                                {{ $producto->fabricante?->nombre ?? 'Sin fabricante' }}
                            </td>
                            <td class="text-center">
                                {{ $producto->fichaTecnica ? 'Sí' : 'No' }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-outline-warning btn-sm me-2">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hay productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
