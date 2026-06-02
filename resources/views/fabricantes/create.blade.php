<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Fabricante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header text-black text-center">
            <h3 class="mb-0">Crear Fabricante</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('fabricantes.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>

                <div class="mb-3">
                    <label for="pais" class="form-label">País</label>
                    <input type="text" name="pais" id="pais" class="form-control" value="{{ old('pais') }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('productos.create') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-success">Guardar fabricante</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
