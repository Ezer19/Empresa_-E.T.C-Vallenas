@extends('layouts.app')

@section('title', 'Gestión de Servicios - Admin')

@section('content')
<!-- Header Section -->
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
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#nuevoServicioModal">
                    <i class="fas fa-plus me-2"></i>Nuevo Servicio
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
                                <i class="fas fa-cogs text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Total Servicios</h6>
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
                            <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-star text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Destacados</h6>
                                <h3 class="fw-bold mb-0">{{ $destacados ?? 0 }}</h3>
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
                                <h3 class="fw-bold mb-0">{{ $activos ?? 0 }}</h3>
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
                                <h3 class="fw-bold mb-0">S/ {{ number_format($precio_promedio ?? 0, 0) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabla de Servicios -->
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
                        <select id="destacadoFilter" class="form-select">
                            <option value="">Todos</option>
                            <option value="destacado">Destacados</option>
                            <option value="normal">Normales</option>
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
                                <td><small class="text-muted">#{{ substr($servicio->_id, -6) }}</small></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($servicio->imagen)
                                        <img src="{{ asset('storage/servicios/' . $servicio->imagen) }}" 
                                             alt="{{ $servicio->nombre }}"
                                             class="rounded me-2"
                                             style="width: 50px; height: 50px; object-fit: cover;">
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
                                        {{ ucfirst($servicio->tipo) }}
                                    </span>
                                </td>
                                <td>
                                    @if($servicio->precio_base)
                                    <strong class="text-primary">S/ {{ number_format($servicio->precio_base, 2) }}</strong>
                                    @else
                                    <span class="text-muted">Por cotizar</span>
                                    @endif
                                </td>
                                <td>
                                    @if($servicio->activo ?? true)
                                    <span class="badge bg-success">Activo</span>
                                    @else
                                    <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    @if($servicio->destacado ?? false)
                                    <i class="fas fa-star text-warning fa-lg" title="Destacado"></i>
                                    @else
                                    <i class="far fa-star text-muted" title="Normal"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('servicios.show', $servicio->_id) }}" 
                                           class="btn btn-outline-info" 
                                           target="_blank"
                                           title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-primary" 
                                                onclick="editarServicio('{{ $servicio->_id }}')"
                                                title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-outline-warning" 
                                                onclick="toggleDestacado('{{ $servicio->_id }}', {{ $servicio->destacado ?? false ? 'false' : 'true' }})"
                                                title="Destacar">
                                            <i class="fas fa-star"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                onclick="eliminarServicio('{{ $servicio->_id }}', '{{ $servicio->nombre }}')"
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
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                @if(isset($servicios) && $servicios->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $servicios->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Modal Nuevo/Editar Servicio -->
<div class="modal fade" id="nuevoServicioModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-cogs me-2"></i>
                    <span id="modalTitle">Nuevo Servicio</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="servicioForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="servicio_id" name="servicio_id">
                <input type="hidden" id="form_method" name="_method" value="POST">
                
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Información General -->
                        <div class="col-12">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-info-circle me-2"></i>Información General
                            </h6>
                        </div>
                        
                        <div class="col-md-8">
                            <label class="form-label">Nombre del Servicio <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Tipo <span class="text-danger">*</span></label>
                            <select name="tipo" class="form-select" required>
                                <option value="">Seleccionar...</option>
                                <option value="alquiler">Alquiler de Maquinaria</option>
                                <option value="transporte">Transporte de Carga</option>
                                <option value="construccion">Construcción</option>
                                <option value="mantenimiento">Mantenimiento</option>
                                <option value="consultoria">Consultoría</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Descripción Corta <span class="text-danger">*</span></label>
                            <input type="text" name="descripcion_corta" class="form-control" 
                                   placeholder="Descripción breve del servicio (máx. 150 caracteres)" 
                                   maxlength="150" required>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Descripción Completa <span class="text-danger">*</span></label>
                            <textarea name="descripcion" class="form-control" rows="4" required></textarea>
                        </div>
                        
                        <!-- Precio -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-dollar-sign me-2"></i>Precio
                            </h6>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Precio Base (S/)</label>
                            <input type="number" name="precio_base" class="form-control" step="0.01" min="0">
                            <small class="text-muted">Dejar vacío si el precio es por cotización</small>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Unidad de Medida</label>
                            <select name="unidad_medida" class="form-select">
                                <option value="hora">Por Hora</option>
                                <option value="dia">Por Día</option>
                                <option value="semana">Por Semana</option>
                                <option value="mes">Por Mes</option>
                                <option value="proyecto">Por Proyecto</option>
                                <option value="cotizacion">Por Cotización</option>
                            </select>
                        </div>
                        
                        <!-- Características -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-list-check me-2"></i>Características
                            </h6>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Características del Servicio</label>
                            <div id="caracteristicasContainer">
                                <div class="input-group mb-2">
                                    <input type="text" name="caracteristicas[]" class="form-control" 
                                           placeholder="Ej: Atención 24/7">
                                    <button type="button" class="btn btn-outline-success" onclick="addCaracteristica()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <small class="text-muted">Agregue las características principales del servicio</small>
                        </div>
                        
                        <!-- Beneficios -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-thumbs-up me-2"></i>Beneficios
                            </h6>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Beneficios del Servicio</label>
                            <div id="beneficiosContainer">
                                <div class="input-group mb-2">
                                    <input type="text" name="beneficios[]" class="form-control" 
                                           placeholder="Ej: Ahorro de tiempo y costos">
                                    <button type="button" class="btn btn-outline-success" onclick="addBeneficio()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <small class="text-muted">Agregue los beneficios clave para el cliente</small>
                        </div>
                        
                        <!-- Preguntas Frecuentes -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-question-circle me-2"></i>Preguntas Frecuentes
                            </h6>
                        </div>
                        
                        <div class="col-md-12">
                            <div id="faqsContainer">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <input type="text" name="faqs[0][pregunta]" class="form-control" 
                                                       placeholder="Pregunta">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="faqs[0][respuesta]" class="form-control" rows="2" 
                                                          placeholder="Respuesta"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addFaq()">
                                <i class="fas fa-plus me-2"></i>Agregar Pregunta
                            </button>
                        </div>
                        
                        <!-- Imagen y Configuración -->
                        <div class="col-12 mt-4">
                            <h6 class="fw-bold mb-3 text-primary">
                                <i class="fas fa-image me-2"></i>Imagen y Configuración
                            </h6>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Imagen del Servicio</label>
                            <input type="file" name="imagen" class="form-control" accept="image/*">
                            <small class="text-muted">Recomendado: 800x600px</small>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label d-block">Opciones</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="destacado" value="1" id="destacadoCheck">
                                <label class="form-check-label" for="destacadoCheck">
                                    <i class="fas fa-star text-warning me-1"></i>Destacar servicio
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="activo" value="1" id="activoCheck" checked>
                                <label class="form-check-label" for="activoCheck">
                                    <i class="fas fa-check-circle text-success me-1"></i>Servicio activo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Guardar Servicio
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
document.getElementById('destacadoFilter').addEventListener('change', filterTable);

function filterTable() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const tipoValue = document.getElementById('tipoFilter').value.toLowerCase();
    const destacadoValue = document.getElementById('destacadoFilter').value.toLowerCase();
    
    const table = document.getElementById('serviciosTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let row of rows) {
        const cells = row.getElementsByTagName('td');
        if (cells.length === 0) continue;
        
        const nombre = cells[1].textContent.toLowerCase();
        const tipo = cells[2].textContent.toLowerCase();
        const destacado = cells[5].innerHTML.includes('fas fa-star') && !cells[5].innerHTML.includes('far fa-star');
        
        const matchSearch = nombre.includes(searchValue);
        const matchTipo = !tipoValue || tipo.includes(tipoValue);
        const matchDestacado = !destacadoValue || 
                              (destacadoValue === 'destacado' && destacado) ||
                              (destacadoValue === 'normal' && !destacado);
        
        row.style.display = (matchSearch && matchTipo && matchDestacado) ? '' : 'none';
    }
}

function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('tipoFilter').value = '';
    document.getElementById('destacadoFilter').value = '';
    filterTable();
}

// Agregar campos dinámicos
let caracteristicaCount = 1;
function addCaracteristica() {
    const container = document.getElementById('caracteristicasContainer');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" name="caracteristicas[]" class="form-control" placeholder="Nueva característica">
        <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
    caracteristicaCount++;
}

let beneficioCount = 1;
function addBeneficio() {
    const container = document.getElementById('beneficiosContainer');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" name="beneficios[]" class="form-control" placeholder="Nuevo beneficio">
        <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
    beneficioCount++;
}

let faqCount = 1;
function addFaq() {
    const container = document.getElementById('faqsContainer');
    const div = document.createElement('div');
    div.className = 'card mb-2';
    div.innerHTML = `
        <div class="card-body">
            <div class="row">
                <div class="col-md-11 mb-2">
                    <input type="text" name="faqs[${faqCount}][pregunta]" class="form-control" placeholder="Pregunta">
                </div>
                <div class="col-md-1 mb-2 text-end">
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.card').remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="col-md-12">
                    <textarea name="faqs[${faqCount}][respuesta]" class="form-control" rows="2" placeholder="Respuesta"></textarea>
                </div>
            </div>
        </div>
    `;
    container.appendChild(div);
    faqCount++;
}

// Editar servicio
function editarServicio(id) {
    document.getElementById('modalTitle').textContent = 'Editar Servicio';
    document.getElementById('servicio_id').value = id;
    document.getElementById('form_method').value = 'PUT';
    document.getElementById('servicioForm').action = `/admin/servicios/${id}`;
    
    // Aquí cargarías los datos mediante AJAX
    new bootstrap.Modal(document.getElementById('nuevoServicioModal')).show();
}

// Toggle destacado
function toggleDestacado(id, destacado) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `/admin/servicios/${id}/destacado`;
    
    const csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    
    const destacadoField = document.createElement('input');
    destacadoField.type = 'hidden';
    destacadoField.name = 'destacado';
    destacadoField.value = destacado;
    
    form.appendChild(csrfToken);
    form.appendChild(destacadoField);
    document.body.appendChild(form);
    form.submit();
}

// Eliminar servicio
function eliminarServicio(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará el servicio: ${nombre}`,
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
            form.action = `/admin/servicios/${id}`;
            
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
document.getElementById('nuevoServicioModal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('modalTitle').textContent = 'Nuevo Servicio';
    document.getElementById('servicioForm').reset();
    document.getElementById('servicio_id').value = '';
    document.getElementById('form_method').value = 'POST';
    document.getElementById('servicioForm').action = '/admin/servicios';
    
    // Resetear campos dinámicos
    caracteristicaCount = 1;
    beneficioCount = 1;
    faqCount = 1;
});
</script>
@endpush
