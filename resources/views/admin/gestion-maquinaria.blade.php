@extends('layouts.app')

@section('title', 'Gestión de Maquinaria - Admin')

@section('content')
<!-- Header Section -->
<section class="py-4 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="h3 fw-bold mb-0">
                    <i class="fas fa-truck-monster me-2"></i>Gestión de Maquinaria
                </h1>
                <p class="mb-0 opacity-75">Administrar equipos y maquinaria del sistema</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#nuevaMaquinariaModal">
                    <i class="fas fa-plus me-2"></i>Nueva Maquinaria
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
                                <i class="fas fa-truck-monster text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Total Equipos</h6>
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
                                <h6 class="text-muted mb-0 small">Disponibles</h6>
                                <h3 class="fw-bold mb-0">{{ $disponibles ?? 0 }}</h3>
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
                                <i class="fas fa-clock text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">En Uso</h6>
                                <h3 class="fw-bold mb-0">{{ $en_uso ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-wrench text-danger fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Mantenimiento</h6>
                                <h3 class="fw-bold mb-0">{{ $mantenimiento ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabla de Maquinaria -->
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
                               placeholder="Buscar maquinaria...">
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select id="tipoFilter" class="form-select">
                            <option value="">Todos los tipos</option>
                            <option value="excavadora">Excavadora</option>
                            <option value="retroexcavadora">Retroexcavadora</option>
                            <option value="cargador">Cargador</option>
                            <option value="motoniveladora">Motoniveladora</option>
                            <option value="rodillo">Rodillo</option>
                            <option value="volquete">Volquete</option>
                            <option value="grua">Grúa</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select id="estadoFilter" class="form-select">
                            <option value="">Todos los estados</option>
                            <option value="disponible">Disponible</option>
                            <option value="en_uso">En Uso</option>
                            <option value="mantenimiento">Mantenimiento</option>
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
                    <table class="table table-hover" id="maquinariaTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Marca/Modelo</th>
                                <th>Año</th>
                                <th>Disponibilidad</th>
                                <th>Tarifa/Día</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($maquinaria as $equipo)
                            <tr>
                                <td><small class="text-muted">#{{ substr($equipo->_id, -6) }}</small></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($equipo->imagenes && count($equipo->imagenes) > 0)
                                        <img src="{{ asset('storage/maquinaria/' . $equipo->imagenes[0]) }}" 
                                             alt="{{ $equipo->nombre }}"
                                             class="rounded me-2"
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        <strong>{{ $equipo->nombre }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ ucfirst($equipo->tipo) }}</span>
                                </td>
                                <td>{{ $equipo->marca }} / {{ $equipo->modelo }}</td>
                                <td>{{ $equipo->año }}</td>
                                <td>
                                    @if($equipo->disponibilidad == 'disponible')
                                    <span class="badge bg-success">Disponible</span>
                                    @elseif($equipo->disponibilidad == 'en_uso')
                                    <span class="badge bg-warning">En uso</span>
                                    @else
                                    <span class="badge bg-danger">Mantenimiento</span>
                                    @endif
                                </td>
                                <td>
                                    @if($equipo->tarifa_dia)
                                    <strong class="text-primary">S/ {{ number_format($equipo->tarifa_dia, 2) }}</strong>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('maquinaria.show', $equipo->_id) }}" 
                                           class="btn btn-outline-info" 
                                           target="_blank"
                                           title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-primary" 
                                                onclick="editarMaquinaria('{{ $equipo->_id }}')"
                                                title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                onclick="eliminarMaquinaria('{{ $equipo->_id }}', '{{ $equipo->nombre }}')"
                                                title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <i class="fas fa-inbox text-muted" style="font-size: 3rem;"></i>
                                    <p class="text-muted mt-3">No hay maquinaria registrada</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                @if(isset($maquinaria) && $maquinaria->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $maquinaria->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Modal Nueva/Editar Maquinaria -->
<div class="modal fade" id="nuevaMaquinariaModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-truck-monster me-2"></i>
                    <span id="modalTitle">Nueva Maquinaria</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="maquinariaForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="maquinaria_id" name="maquinaria_id">
                <input type="hidden" id="form_method" name="_method" value="POST">
                
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Nombre del Equipo <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Tipo <span class="text-danger">*</span></label>
                            <select name="tipo" class="form-select" required>
                                <option value="">Seleccionar...</option>
                                <option value="excavadora">Excavadora</option>
                                <option value="retroexcavadora">Retroexcavadora</option>
                                <option value="cargador">Cargador</option>
                                <option value="motoniveladora">Motoniveladora</option>
                                <option value="rodillo">Rodillo</option>
                                <option value="volquete">Volquete</option>
                                <option value="grua">Grúa</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Disponibilidad <span class="text-danger">*</span></label>
                            <select name="disponibilidad" class="form-select" required>
                                <option value="disponible">Disponible</option>
                                <option value="en_uso">En uso</option>
                                <option value="mantenimiento">Mantenimiento</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Marca <span class="text-danger">*</span></label>
                            <input type="text" name="marca" class="form-control" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Modelo <span class="text-danger">*</span></label>
                            <input type="text" name="modelo" class="form-control" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Año <span class="text-danger">*</span></label>
                            <input type="number" name="año" class="form-control" min="1990" max="2030" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Potencia</label>
                            <input type="text" name="potencia" class="form-control" placeholder="Ej: 150 HP">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Capacidad</label>
                            <input type="text" name="capacidad" class="form-control" placeholder="Ej: 1.5 m³">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Peso</label>
                            <input type="text" name="peso" class="form-control" placeholder="Ej: 20 ton">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Dimensiones</label>
                            <input type="text" name="dimensiones" class="form-control" placeholder="Ej: 6m x 2.5m x 3m">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Tarifa por Hora (S/)</label>
                            <input type="number" name="tarifa_hora" class="form-control" step="0.01" min="0">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Tarifa por Día (S/)</label>
                            <input type="number" name="tarifa_dia" class="form-control" step="0.01" min="0">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Tarifa por Semana (S/)</label>
                            <input type="number" name="tarifa_semana" class="form-control" step="0.01" min="0">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Tarifa por Mes (S/)</label>
                            <input type="number" name="tarifa_mes" class="form-control" step="0.01" min="0">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3"></textarea>
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
                        <i class="fas fa-save me-2"></i>Guardar
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
    
    const table = document.getElementById('maquinariaTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let row of rows) {
        const cells = row.getElementsByTagName('td');
        if (cells.length === 0) continue;
        
        const nombre = cells[1].textContent.toLowerCase();
        const tipo = cells[2].textContent.toLowerCase();
        const estado = cells[5].textContent.toLowerCase();
        
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

// Editar maquinaria
function editarMaquinaria(id) {
    // Aquí cargarías los datos mediante AJAX
    document.getElementById('modalTitle').textContent = 'Editar Maquinaria';
    document.getElementById('maquinaria_id').value = id;
    document.getElementById('form_method').value = 'PUT';
    document.getElementById('maquinariaForm').action = `/admin/maquinaria/${id}`;
    
    new bootstrap.Modal(document.getElementById('nuevaMaquinariaModal')).show();
}

// Eliminar maquinaria
function eliminarMaquinaria(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará la maquinaria: ${nombre}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Crear formulario para DELETE
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/maquinaria/${id}`;
            
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
document.getElementById('nuevaMaquinariaModal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('modalTitle').textContent = 'Nueva Maquinaria';
    document.getElementById('maquinariaForm').reset();
    document.getElementById('maquinaria_id').value = '';
    document.getElementById('form_method').value = 'POST';
    document.getElementById('maquinariaForm').action = '/admin/maquinaria';
});
</script>
@endpush
