@extends('layouts.app')

@section('title', 'Gestión de Usuarios - Admin')

@section('content')
<section class="py-4 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="h3 fw-bold mb-0">
                    <i class="fas fa-users me-2"></i>Gestión de Usuarios
                </h1>
                <p class="mb-0 opacity-75">Administrar usuarios del sistema</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admin.usuarios.create') }}" class="btn btn-light">
                    <i class="fas fa-user-plus me-2"></i>Nuevo Usuario
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
                                <i class="fas fa-users text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Total Usuarios</h6>
                                <h3 class="fw-bold mb-0">{{ $totalUsuarios }}</h3>
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
                                <i class="fas fa-user-shield text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Administradores</h6>
                                <h3 class="fw-bold mb-0">{{ $totalAdministradores }}</h3>
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
                                <i class="fas fa-user text-success fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Clientes</h6>
                                <h3 class="fw-bold mb-0">{{ $totalClientes }}</h3>
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
                                <i class="fas fa-check-circle text-info fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Activos</h6>
                                <h3 class="fw-bold mb-0">{{ $totalActivos }}</h3>
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
                    <div class="col-lg-5 col-md-6 mb-3">
                        <input type="text" 
                               id="searchInput" 
                               class="form-control" 
                               placeholder="Buscar por nombre o email...">
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <select id="rolFilter" class="form-select">
                            <option value="">Todos los roles</option>
                            <option value="admin">Administrador</option>
                            <option value="cliente">Cliente</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <select id="estadoFilter" class="form-select">
                            <option value="">Todos los estados</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-3">
                        <button type="button" class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                            <i class="fas fa-redo me-2"></i>Limpiar
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="usuariosTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Empresa</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuarios as $usuario)
                            <tr>
                                <td><small class="text-muted">#{{ $usuario->id }}</small></td>
                                <td>
                                    <strong>{{ $usuario->nombre }} {{ $usuario->apellido }}</strong>
                                </td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->empresa ?? '-' }}</td>
                                <td>
                                    @if($usuario->rol == 'admin')
                                    <span class="badge bg-warning">Administrador</span>
                                    @else
                                    <span class="badge bg-success">Cliente</span>
                                    @endif
                                </td>
                                <td>
                                    @if($usuario->isActivo())
                                    <span class="badge bg-success">Activo</span>
                                    @else
                                    <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $usuario->created_at->format('d/m/Y') }}
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" 
                                           class="btn btn-outline-primary" 
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-{{ $usuario->isActivo() ? 'warning' : 'success' }}" 
                                                onclick="toggleEstado('{{ $usuario->id }}', '{{ $usuario->nombre }}', {{ $usuario->isActivo() ? 'false' : 'true' }})"
                                                title="{{ $usuario->isActivo() ? 'Desactivar' : 'Activar' }}">
                                            <i class="fas fa-{{ $usuario->isActivo() ? 'ban' : 'check' }}"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                onclick="eliminarUsuario('{{ $usuario->id }}', '{{ $usuario->nombre }}')"
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
                                    <p class="text-muted mt-3">No hay usuarios registrados</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($usuarios->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $usuarios->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<form id="toggleEstadoForm" method="POST" style="display: none;">
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
document.getElementById('rolFilter').addEventListener('change', filterTable);
document.getElementById('estadoFilter').addEventListener('change', filterTable);

function filterTable() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const rolValue = document.getElementById('rolFilter').value.toLowerCase();
    const estadoValue = document.getElementById('estadoFilter').value.toLowerCase();
    
    const table = document.getElementById('usuariosTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let row of rows) {
        const cells = row.getElementsByTagName('td');
        if (cells.length === 0) continue;
        
        const nombre = cells[1].textContent.toLowerCase();
        const email = cells[2].textContent.toLowerCase();
        const rol = cells[5].textContent.toLowerCase();
        const estado = cells[6].textContent.toLowerCase();
        
        const matchSearch = nombre.includes(searchValue) || email.includes(searchValue);
        const matchRol = !rolValue || rol.includes(rolValue);
        const matchEstado = !estadoValue || estado.includes(estadoValue);
        
        row.style.display = (matchSearch && matchRol && matchEstado) ? '' : 'none';
    }
}

function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('rolFilter').value = '';
    document.getElementById('estadoFilter').value = '';
    filterTable();
}

function toggleEstado(id, nombre, activar) {
    const accion = activar === 'true' ? 'activar' : 'desactivar';
    
    Swal.fire({
        title: `¿${accion.charAt(0).toUpperCase() + accion.slice(1)} usuario?`,
        text: `Se va a ${accion} al usuario: ${nombre}`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí, continuar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('toggleEstadoForm');
            form.action = `/admin/usuarios/${id}/toggle-estado`;
            form.submit();
        }
    });
}

function eliminarUsuario(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará el usuario: ${nombre}. Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/usuarios/${id}`;
            form.submit();
        }
    });
}
</script>
@endpush