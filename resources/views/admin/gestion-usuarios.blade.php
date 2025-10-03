@extends('layouts.app')

@section('title', 'Gestión de Usuarios - Admin')

@section('content')
<!-- Header Section -->
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
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#nuevoUsuarioModal">
                    <i class="fas fa-user-plus me-2"></i>Nuevo Usuario
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Estadísticas de Usuarios -->
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
                                <i class="fas fa-user-shield text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 small">Administradores</h6>
                                <h3 class="fw-bold mb-0">{{ $administradores ?? 0 }}</h3>
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
                                <h3 class="fw-bold mb-0">{{ $clientes ?? 0 }}</h3>
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
                                <h3 class="fw-bold mb-0">{{ $activos ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabla de Usuarios -->
<section class="section-padding">
    <div class="container">
        <div class="card border-0 shadow">
            <div class="card-body">
                <!-- Filtros -->
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

                <!-- Tabla -->
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
                                <td><small class="text-muted">#{{ substr($usuario->_id, -6) }}</small></td>
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
                                    @if($usuario->activo ?? true)
                                    <span class="badge bg-success">Activo</span>
                                    @else
                                    <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y') }}
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" 
                                                class="btn btn-outline-primary" 
                                                onclick="editarUsuario('{{ $usuario->_id }}')"
                                                title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-outline-{{ ($usuario->activo ?? true) ? 'warning' : 'success' }}" 
                                                onclick="toggleEstado('{{ $usuario->_id }}', {{ ($usuario->activo ?? true) ? 'false' : 'true' }})"
                                                title="{{ ($usuario->activo ?? true) ? 'Desactivar' : 'Activar' }}">
                                            <i class="fas fa-{{ ($usuario->activo ?? true) ? 'ban' : 'check' }}"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-outline-danger" 
                                                onclick="eliminarUsuario('{{ $usuario->_id }}', '{{ $usuario->nombre }}')"
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

                <!-- Paginación -->
                @if(isset($usuarios) && $usuarios->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $usuarios->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Modal Nuevo/Editar Usuario -->
<div class="modal fade" id="nuevoUsuarioModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user me-2"></i>
                    <span id="modalTitle">Nuevo Usuario</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="usuarioForm" method="POST">
                @csrf
                <input type="hidden" id="usuario_id" name="usuario_id">
                <input type="hidden" id="form_method" name="_method" value="POST">
                
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Apellido <span class="text-danger">*</span></label>
                            <input type="text" name="apellido" class="form-control" required>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Teléfono <span class="text-danger">*</span></label>
                            <input type="tel" name="telefono" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Rol <span class="text-danger">*</span></label>
                            <select name="rol" class="form-select" required>
                                <option value="cliente">Cliente</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Empresa</label>
                            <input type="text" name="empresa" class="form-control">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Contraseña <span class="text-danger" id="passwordRequired">*</span></label>
                            <input type="password" name="password" class="form-control" id="password">
                            <small class="text-muted" id="passwordHelp">Mínimo 6 caracteres</small>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Confirmar Contraseña <span class="text-danger" id="passwordConfirmRequired">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-check">
                                <input type="checkbox" name="activo" class="form-check-input" id="activoCheck" checked>
                                <label class="form-check-label" for="activoCheck">
                                    Usuario activo
                                </label>
                            </div>
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
// Filtros
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

function editarUsuario(id) {
    document.getElementById('modalTitle').textContent = 'Editar Usuario';
    document.getElementById('usuario_id').value = id;
    document.getElementById('form_method').value = 'PUT';
    document.getElementById('usuarioForm').action = `/admin/usuarios/${id}`;
    document.getElementById('password').required = false;
    document.getElementById('password_confirmation').required = false;
    document.getElementById('passwordRequired').style.display = 'none';
    document.getElementById('passwordConfirmRequired').style.display = 'none';
    document.getElementById('passwordHelp').textContent = 'Dejar en blanco para no cambiar';
    
    new bootstrap.Modal(document.getElementById('nuevoUsuarioModal')).show();
}

function toggleEstado(id, activo) {
    const accion = activo === 'true' ? 'activar' : 'desactivar';
    Swal.fire({
        title: `¿${accion.charAt(0).toUpperCase() + accion.slice(1)} usuario?`,
        text: `Se va a ${accion} este usuario`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí, continuar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Implementar toggle estado
            window.location.href = `/admin/usuarios/${id}/toggle-estado`;
        }
    });
}

function eliminarUsuario(id, nombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará el usuario: ${nombre}`,
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
            form.action = `/admin/usuarios/${id}`;
            
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

document.getElementById('nuevoUsuarioModal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('modalTitle').textContent = 'Nuevo Usuario';
    document.getElementById('usuarioForm').reset();
    document.getElementById('usuario_id').value = '';
    document.getElementById('form_method').value = 'POST';
    document.getElementById('usuarioForm').action = '/admin/usuarios';
    document.getElementById('password').required = true;
    document.getElementById('password_confirmation').required = true;
    document.getElementById('passwordRequired').style.display = 'inline';
    document.getElementById('passwordConfirmRequired').style.display = 'inline';
    document.getElementById('passwordHelp').textContent = 'Mínimo 6 caracteres';
});
</script>
@endpush
