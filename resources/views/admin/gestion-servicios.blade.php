@extends('layouts.app')

@section('title', 'Gestión de Servicios - Admin')

@section('content')
<section class="py-4 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="h3 fw-bold mb-0">
                    <i class="fas fa-cogs me-2"></i>Gestión de Servicios
                </h1>
                <p class="mb-0 opacity-75">Administrar servicios ofrecidos por la empresa</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admin.servicios.create') }}" class="btn btn-light">
                    <i class="fas fa-plus me-2"></i>Nuevo Servicio
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-4 bg-light">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-cogs text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Total Servicios</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['total'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-star text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Destacados</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['destacados'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-check-circle text-success fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Activos</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['activos'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-dollar-sign text-info fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Precio Promedio</h6>
                                <h3 class="fw-bold mb-0">S/ {{ number_format($estadisticas['precio_promedio'], 0) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-4 col-md-6 mb-3">
                        <input type="text" 
                               id="searchInput" 
                               class="form-control" 
                               placeholder="Buscar servicios...">
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select id="tipoFilter" class="form-select">
                            <option value="">Todos los tipos</option>
                            <option value="alquiler">Alquiler de Maquinaria</option>
                            <option value="transporte">Transporte de Carga</option>
                            <option value="construccion">Construcción</option>
                            <option value="mantenimiento">Mantenimiento</option>
                            <option value="consultoria">Consultoría</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select id="estadoFilter" class="form-select">
                            <option value="">Todos los estados</option>
                            <option value="activo">Activos</option>
                            <option value="inactivo">Inactivos</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <button type="button" class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                            <i class="fas fa-redo me-2"></i>Limpiar
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="serviciosTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Servicio</th>
                                <th>Tipo</th>
                                <th>Precio Base</th>
                                <th>Estado</th>
                                <th>Destacado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($servicios as $servicio)
                            <tr>
                                <td><small class="text-muted">#{{ $servicio->id }}</small></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($servicio->imagen)
                                        <img src="{{ Storage::url($servicio->imagen) }}" 
                                             alt="{{ $servicio->nombre }}"
                                             class="rounded me-2"
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                        <div class="bg-light rounded me-2 d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-cog text-muted"></i>
                                        </div>
                                        @endif
                                        <div>
                                            <strong>{{ $servicio->nombre }}</strong>
                                            @if($servicio->descripcion_corta)
                                            <br><small class="text-muted">{{ Str::limit($servicio->descripcion_corta, 50) }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $servicio->tipo_label }}
                                    </span>
                                </td>
                                <td>
                                    @if($servicio->precio_base)
                                    <strong class="text-primary">S/ {{ number_format($servicio->precio_base, 2) }}</strong>
                                    <small class="text-muted d-block">/{{ $servicio->unidad_medida_label }}</small>
                                    @else
                                    <span class="text-muted">Por cotizar</span>
                                    @endif
                                </td>
                                <td>
                                    @if($servicio->activo)
                                    <span class="badge bg-success">Activo</span>
                                    @else
                                    <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    @if($servicio->destacado)
                                    <i class="fas fa-star text-warning fa-lg" title="Destacado"></i>
                                    @else
                                    <i class="far fa-star text-muted" title="Normal"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('servicios.show', $servicio->slug) }}" 
                                           class="btn btn-outline-info" 
                                           target="_blank"
                                           title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.servicios.edit', $servicio->id) }}" 
                                           class="btn btn-outline-primary" 
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-{{ $servicio->destacado ? 'warning' : 'secondary' }}" 
                                                onclick="toggleDestacado('{{ $servicio->id }}', '{{ $servicio->nombre }}', {{ $servicio->destacado ? 'false' : 'true' }})"
                                                title="{{ $servicio->destacado ? 'Quitar destacado' : 'Destacar' }}">
                                            <i class="fas fa-star"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                onclick="eliminarServicio('{{ $servicio->id }}', '{{ $servicio->nombre }}')"
                                                title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="fas fa-inbox text-muted" style="font-size: 3rem;"></i>
                                    <p class="text-muted mt-3">No hay servicios registrados</p>
                                    <a href="{{ route('admin.servicios.create') }}" class="btn btn-primary mt-2">
                                        <i class="fas fa-plus me-2"></i>Crear Primer Servicio
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($servicios->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $servicios->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<form id="toggleDestacadoForm" method="POST" style="display: none;">
    @csrf
    @method('PUT')
</form>

<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
document.getElementById('searchInput').addEventListener('keyup', filterTable);
document.getElementById('tipoFilter').addEventListener('change', filterTable);
document.getElementById('estadoFilter').addEventListener('change', filterTable);

function filterTable() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const tipoValue = document.getElementById('tipoFilter').value.toLowerCase();
    const estadoValue = document.getElementById('estadoFilter').value.toLowerCase();
    
    const table = document.getElementById('serviciosTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let row of rows) {
        const cells = row.getElementsByTagName('td');
        if (cells.length === 0) continue;
        
        const nombre = cells[1].textContent.toLowerCase();
        const tipo = cells[2].textContent.toLowerCase();
        const estado = cells[4].textContent.toLowerCase();
        
        const matchSearch = nombre.includes(searchValue);
        const matchTipo = !tipoValue || tipo.includes(tipoValue);
        const matchEstado = !estadoValue || estado.includes(estadoValue);
        
        row.style.display = (matchSearch && matchTipo && matchEstado) ? '' : 'none';
    }
}

function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('tipoFilter').value = '';
    document.getElementById('estadoFilter').value = '';
    filterTable();
}

function toggleDestacado(id, nombre, destacar) {
    const accion = destacar === 'true' ? 'destacar' : 'quitar el destacado de';
    
    Swal.fire({
        title: `¿${destacar === 'true' ? 'Destacar' : 'Quitar destacado'}?`,
        text: `Se va a ${accion} el servicio: ${nombre}`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí, continuar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('toggleDestacadoForm');
            form.action = `/admin/servicios/${id}/destacado`;
            form.submit();
        }
    });
}

function eliminarServicio(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará el servicio: ${nombre}. Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/servicios/${id}`;
            form.submit();
        }
    });
}
</script>
@endpush