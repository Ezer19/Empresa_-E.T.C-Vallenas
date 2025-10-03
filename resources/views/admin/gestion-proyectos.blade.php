@extends('layouts.app')

@section('title', 'Gestión de Proyectos - Admin')

@section('content')
<!-- Header Section -->
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
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#nuevoProyectoModal">
                    <i class="fas fa-plus me-2"></i>Nuevo Proyecto
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Estadísticas Rápidas -->
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
                                <h3 class="fw-bold mb-0">{{ $total ?? 0 }}</h3>
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
                                <h3 class="fw-bold mb-0">{{ $completados ?? 0 }}</h3>
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
                                <h3 class="fw-bold mb-0">{{ $en_progreso ?? 0 }}</h3>
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
                                <h3 class="fw-bold mb-0">S/ {{ number_format($inversion_total ?? 0, 0) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabla de Proyectos -->
<section class="section-padding">
    <div class="container">
        <div class="card border-0 shadow">
            <div class="card-body">
                <!-- Filtros y Búsqueda -->
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

                <!-- Tabla -->
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
                                <td><small class="text-muted">#{{ substr($proyecto->_id, -6) }}</small></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($proyecto->imagenes && count($proyecto->imagenes) > 0)
                                        <img src="{{ asset('storage/proyectos/' . $proyecto->imagenes[0]) }}" 
                                             alt="{{ $proyecto->nombre }}"
                                             class="rounded me-2"
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <strong>{{ $proyecto->nombre }}</strong>
                                            <br><small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $proyecto->cliente }}</td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ ucfirst(str_replace('_', ' ', $proyecto->tipo)) }}
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
                                    @if($proyecto->avance_porcentaje)
                                    <div class="d-flex align-items-center" style="min-width: 100px;">
                                        <div class="progress flex-grow-1 me-2" style="height: 8px;">
                                            <div class="progress-bar" 
                                                 style="width: {{ $proyecto->avance_porcentaje }}%"></div>
                                        </div>
                                        <small class="fw-bold">{{ $proyecto->avance_porcentaje }}%</small>
                                    </div>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
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
                                        <a href="{{ route('proyectos.show', $proyecto->_id) }}" 
                                           class="btn btn-outline-info" 
                                           target="_blank"
                                           title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-primary" 
                                                onclick="editarProyecto('{{ $proyecto->_id }}')"
                                                title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                onclick="eliminarProyecto('{{ $proyecto->_id }}', '{{ $proyecto->nombre }}')"
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
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                @if(isset($proyectos) && $proyectos->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $proyectos->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Modal Nuevo/Editar Proyecto -->
<div class="modal fade" id="nuevoProyectoModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-building me-2"></i>
                    <span id="modalTitle">Nuevo Proyecto</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="proyectoForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="proyecto_id" name="proyecto_id">
                <input type="hidden" id="form_method" name="_method" value="POST">
                
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Información General -->
                        <div class="col-12">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-info-circle me-2"></i>Información General
                            </h6>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Nombre del Proyecto <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Cliente <span class="text-danger">*</span></label>
                            <input type="text" name="cliente" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Tipo de Proyecto <span class="text-danger">*</span></label>
                            <select name="tipo" class="form-select" required>
                                <option value="">Seleccionar...</option>
                                <option value="construccion_civil">Construcción Civil</option>
                                <option value="movimiento_tierras">Movimiento de Tierras</option>
                                <option value="infraestructura_vial">Infraestructura Vial</option>
                                <option value="mineria">Minería</option>
                                <option value="hidraulica">Hidráulica</option>
                                <option value="edificaciones">Edificaciones</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Ubicación <span class="text-danger">*</span></label>
                            <input type="text" name="ubicacion" class="form-control" placeholder="Ej: Cusco, Perú" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Estado <span class="text-danger">*</span></label>
                            <select name="estado" class="form-select" required>
                                <option value="en_progreso">En Progreso</option>
                                <option value="completado">Completado</option>
                                <option value="pausado">Pausado</option>
                            </select>
                        </div>
                        
                        <!-- Fechas y Progreso -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-calendar me-2"></i>Fechas y Progreso
                            </h6>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Fecha de Inicio <span class="text-danger">*</span></label>
                            <input type="date" name="fecha_inicio" class="form-control" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Fecha de Fin</label>
                            <input type="date" name="fecha_fin" class="form-control">
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Avance (%) <span class="text-danger">*</span></label>
                            <input type="number" name="avance_porcentaje" class="form-control" min="0" max="100" value="0" required>
                        </div>
                        
                        <!-- Presupuesto -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-dollar-sign me-2"></i>Presupuesto
                            </h6>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Presupuesto Total (S/)</label>
                            <input type="number" name="presupuesto" class="form-control" step="0.01" min="0">
                        </div>
                        
                        <!-- Coordenadas (Opcional) -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-map-marker-alt me-2"></i>Coordenadas (Opcional)
                            </h6>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Latitud</label>
                            <input type="text" name="coordenadas_lat" class="form-control" placeholder="-13.53195">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Longitud</label>
                            <input type="text" name="coordenadas_lng" class="form-control" placeholder="-71.96746">
                        </div>
                        
                        <!-- Descripción -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-align-left me-2"></i>Descripción
                            </h6>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Descripción del Proyecto</label>
                            <textarea name="descripcion" class="form-control" rows="4"></textarea>
                        </div>
                        
                        <!-- Maquinaria Utilizada -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-truck-monster me-2"></i>Maquinaria Utilizada
                            </h6>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Seleccionar Maquinaria</label>
                            <select name="maquinaria_ids[]" class="form-select" multiple size="5">
                                @if(isset($maquinaria_disponible))
                                @foreach($maquinaria_disponible as $maquina)
                                <option value="{{ $maquina->_id }}">{{ $maquina->nombre }}</option>
                                @endforeach
                                @endif
                            </select>
                            <small class="text-muted">Mantén presionado Ctrl (Cmd en Mac) para seleccionar múltiples</small>
                        </div>
                        
                        <!-- Imágenes -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-images me-2"></i>Imágenes del Proyecto
                            </h6>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Imágenes</label>
                            <input type="file" name="imagenes[]" class="form-control" multiple accept="image/*">
                            <small class="text-muted">Puedes seleccionar múltiples imágenes</small>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Guardar Proyecto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Búsqueda y filtros
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

// Editar proyecto
function editarProyecto(id) {
    document.getElementById('modalTitle').textContent = 'Editar Proyecto';
    document.getElementById('proyecto_id').value = id;
    document.getElementById('form_method').value = 'PUT';
    document.getElementById('proyectoForm').action = `/admin/proyectos/${id}`;
    
    // Aquí cargarías los datos mediante AJAX
    new bootstrap.Modal(document.getElementById('nuevoProyectoModal')).show();
}

// Eliminar proyecto
function eliminarProyecto(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará el proyecto: ${nombre}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/proyectos/${id}`;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    });
}

// Limpiar formulario al cerrar modal
document.getElementById('nuevoProyectoModal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('modalTitle').textContent = 'Nuevo Proyecto';
    document.getElementById('proyectoForm').reset();
    document.getElementById('proyecto_id').value = '';
    document.getElementById('form_method').value = 'POST';
    document.getElementById('proyectoForm').action = '/admin/proyectos';
});
</script>
@endpush
