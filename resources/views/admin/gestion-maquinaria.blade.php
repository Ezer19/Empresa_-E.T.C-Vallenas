@extends('layouts.app')

@section('title', 'Gestión de Maquinaria - Admin')

@section('content')
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
                <a href="{{ route('admin.maquinaria.create') }}" class="btn btn-light">
                    <i class="fas fa-plus me-2"></i>Nueva Maquinaria
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
                                <i class="fas fa-truck-monster text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Total Equipos</h6>
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
                                <h6 class="text-muted mb-0 small">Disponibles</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['disponibles'] }}</h3>
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
                                <h3 class="fw-bold mb-0">{{ $estadisticas['en_uso'] }}</h3>
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
                                <h3 class="fw-bold mb-0">{{ $estadisticas['mantenimiento'] }}</h3>
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

                <div class="table-responsive">
                    <table class="table table-hover" id="maquinariaTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Marca/Modelo</th>
                                <th>Año</th>
                                <th>Estado</th>
                                <th>Tarifa/Día</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($maquinaria as $equipo)
                            <tr>
                                <td><small class="text-muted">#{{ $equipo->id }}</small></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($equipo->imagen_principal)
                                        <img src="{{ Storage::url($equipo->imagen_principal) }}" 
                                             alt="{{ $equipo->nombre }}"
                                             class="rounded me-2"
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                        <div class="bg-light rounded me-2 d-flex align-items-center justify-content-center"
                                             style="width: 40px; height: 40px;">
                                            <i class="fas fa-truck-monster text-muted"></i>
                                        </div>
                                        @endif
                                        <strong>{{ $equipo->nombre }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $equipo->tipo_label }}</span>
                                </td>
                                <td>{{ $equipo->marca }} / {{ $equipo->modelo }}</td>
                                <td>{{ $equipo->año }}</td>
                                <td>
                                    @if($equipo->estado == 'disponible')
                                    <span class="badge bg-success">Disponible</span>
                                    @elseif($equipo->estado == 'en_uso')
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
                                        <a href="{{ route('maquinaria.show', $equipo->slug) }}" 
                                           class="btn btn-outline-info" 
                                           target="_blank"
                                           title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.maquinaria.edit', $equipo->id) }}" 
                                           class="btn btn-outline-primary" 
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                onclick="eliminarMaquinaria('{{ $equipo->id }}', '{{ $equipo->nombre }}')"
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
                                    <a href="{{ route('admin.maquinaria.create') }}" class="btn btn-primary mt-2">
                                        <i class="fas fa-plus me-2"></i>Agregar Primer Equipo
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($maquinaria->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $maquinaria->links() }}
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

function eliminarMaquinaria(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará la maquinaria: ${nombre}. Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/maquinaria/${id}`;
            form.submit();
        }
    });
}
</script>
@endpush