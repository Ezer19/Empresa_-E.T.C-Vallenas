@extends('layouts.app')

@section('title', 'Gestión de Proyectos - Admin')

@section('content')
<section class="py-4 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="h3 fw-bold mb-0">
                    <i class="fas fa-building me-2"></i>Gestión de Proyectos
                </h1>
                <p class="mb-0 opacity-75">Administrar proyectos realizados y en curso</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admin.proyectos.create') }}" class="btn btn-light">
                    <i class="fas fa-plus me-2"></i>Nuevo Proyecto
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
                                <i class="fas fa-building text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Total Proyectos</h6>
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
                            <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-check-circle text-success fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Completados</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['completados'] }}</h3>
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
                                <i class="fas fa-spinner text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">En Progreso</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['en_progreso'] }}</h3>
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
                                <h6 class="text-muted mb-0 small">Inversión Total</h6>
                                <h3 class="fw-bold mb-0">S/ {{ number_format($estadisticas['inversion_total'], 0) }}</h3>
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
                               placeholder="Buscar proyectos...">
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select id="tipoFilter" class="form-select">
                            <option value="">Todos los tipos</option>
                            <option value="construccion_civil">Construcción Civil</option>
                            <option value="movimiento_tierras">Movimiento de Tierras</option>
                            <option value="infraestructura_vial">Infraestructura Vial</option>
                            <option value="mineria">Minería</option>
                            <option value="hidraulica">Hidráulica</option>
                            <option value="edificaciones">Edificaciones</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select id="estadoFilter" class="form-select">
                            <option value="">Todos los estados</option>
                            <option value="completado">Completado</option>
                            <option value="en_progreso">En Progreso</option>
                            <option value="pausado">Pausado</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <button type="button" class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                            <i class="fas fa-redo me-2"></i>Limpiar
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="proyectosTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cliente</th>
                                <th>Tipo</th>
                                <th>Ubicación</th>
                                <th>Estado</th>
                                <th>Progreso</th>
                                <th>Presupuesto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($proyectos as $proyecto)
                            <tr>
                                <td><small class="text-muted">#{{ $proyecto->id }}</small></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($proyecto->imagen_principal)
                                        <img src="{{ Storage::url($proyecto->imagen_principal) }}" 
                                             alt="{{ $proyecto->nombre }}"
                                             class="rounded me-2"
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                        <div class="bg-light rounded me-2 d-flex align-items-center justify-content-center"
                                             style="width: 40px; height: 40px;">
                                            <i class="fas fa-building text-muted"></i>
                                        </div>
                                        @endif
                                        <div>
                                            <strong>{{ $proyecto->nombre }}</strong>
                                            <br><small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $proyecto->fecha_inicio->format('d/m/Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $proyecto->cliente }}</td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $proyecto->tipo_label }}
                                    </span>
                                </td>
                                <td>
                                    <small>
                                        <i class="fas fa-map-marker-alt me-1"></i>{{ $proyecto->ubicacion }}
                                    </small>
                                </td>
                                <td>
                                    @if($proyecto->estado == 'completado')
                                    <span class="badge bg-success">Completado</span>
                                    @elseif($proyecto->estado == 'en_progreso')
                                    <span class="badge bg-primary">En Progreso</span>
                                    @else
                                    <span class="badge bg-warning">Pausado</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center" style="min-width: 100px;">
                                        <div class="progress flex-grow-1 me-2" style="height: 8px;">
                                            <div class="progress-bar bg-{{ $proyecto->estado_color }}" 
                                                 style="width: {{ $proyecto->avance_porcentaje }}%"></div>
                                        </div>
                                        <small class="fw-bold">{{ $proyecto->avance_porcentaje }}%</small>
                                    </div>
                                </td>
                                <td>
                                    @if($proyecto->presupuesto)
                                    <strong class="text-primary">S/ {{ number_format($proyecto->presupuesto, 2) }}</strong>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('proyectos.show', $proyecto->slug) }}" 
                                           class="btn btn-outline-info" 
                                           target="_blank"
                                           title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.proyectos.edit', $proyecto->id) }}" 
                                           class="btn btn-outline-primary" 
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                onclick="eliminarProyecto('{{ $proyecto->id }}', '{{ $proyecto->nombre }}')"
                                                title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <i class="fas fa-inbox text-muted" style="font-size: 3rem;"></i>
                                    <p class="text-muted mt-3">No hay proyectos registrados</p>
                                    <a href="{{ route('admin.proyectos.create') }}" class="btn btn-primary mt-2">
                                        <i class="fas fa-plus me-2"></i>Crear Primer Proyecto
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($proyectos->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $proyectos->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

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
    
    const table = document.getElementById('proyectosTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let row of rows) {
        const cells = row.getElementsByTagName('td');
        if (cells.length === 0) continue;
        
        const nombre = cells[1].textContent.toLowerCase();
        const cliente = cells[2].textContent.toLowerCase();
        const tipo = cells[3].textContent.toLowerCase();
        const estado = cells[5].textContent.toLowerCase();
        
        const matchSearch = nombre.includes(searchValue) || cliente.includes(searchValue);
        const matchTipo = !tipoValue || tipo.includes(tipoValue.replace('_', ' '));
        const matchEstado = !estadoValue || estado.includes(estadoValue.replace('_', ' '));
        
        row.style.display = (matchSearch && matchTipo && matchEstado) ? '' : 'none';
    }
}

function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('tipoFilter').value = '';
    document.getElementById('estadoFilter').value = '';
    filterTable();
}

function eliminarProyecto(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará el proyecto: ${nombre}. Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/proyectos/${id}`;
            form.submit();
        }
    });
}
</script>
@endpush