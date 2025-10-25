#  ETC Vallenas - Sistema de Gestión de Maquinaria Pesada

<div align="center">
  <img src="https://thumbs.dreamstime.com/b/dise%C3%B1o-del-logotipo-de-construcci%C3%B3n-excavaci%C3%B3n-elemento-equipo-pesado-miner%C3%ADa-veh%C3%ADculos-transporte-389775260.jpg" alt="ETC Vallenas Logo" width="200"/>
  
  [![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
  [![MongoDB](https://img.shields.io/badge/MongoDB-7.0-green.svg)](https://www.mongodb.com/)
  [![TailwindCSS](https://img.shields.io/badge/Tailwind-3.3-blue.svg)](https://tailwindcss.com)
  [![License](https://img.shields.io/badge/License-Proprietary-yellow.svg)](LICENSE)
</div>

## Descripción

Sistema integral de gestión para **ETC Vallenas**, empresa líder en alquiler de maquinaria pesada con más de 15 años de experiencia en Cusco, Perú. Este sistema permite gestionar:

- **Maquinaria**: Catálogo completo de 85+ equipos disponibles
- **Proyectos**: Gestión de proyectos de construcción y minería
- **Clientes**: Base de datos de clientes y cotizaciones
- **Servicios**: Alquiler, mantenimiento, construcción y transporte
- **Dashboard Administrativo**: Panel completo de estadísticas y gestión
- **Responsive**: Diseño adaptativo para dispositivos móviles

## Características Principales

### Frontend
- Diseño moderno con **Tailwind CSS** y **Bootstrap 5**
- Interfaz responsive y accesible (WCAG 2.1)
- Carrusel de imágenes con hero section
- Formularios de contacto y cotización
- Blog de noticias del sector
- SEO optimizado con meta tags completos
- PWA (Progressive Web App) ready
- Iconos Font Awesome 6

### Backend
- Laravel 10 con arquitectura MVC
- MongoDB para base de datos NoSQL
- Sistema de autenticación robusto
- Roles y permisos (Admin, Operador, Cliente)
- API RESTful para integraciones
- Gestión de archivos e imágenes
- Sistema de notificaciones
- Reportes y estadísticas

### Seguridad
- Autenticación con Laravel Sanctum
- CSRF Protection
- Rate Limiting
- Validación de datos
- Headers de seguridad
- Encriptación de contraseñas

## Tecnologías

| Categoría | Tecnologías |
|-----------|-------------|
| **Backend** | Laravel 10, PHP 8.1+ |
| **Base de Datos** | MongoDB 7.0+ |
| **Frontend** | Blade Templates, TailwindCSS 3, Bootstrap 5 |
| **JavaScript** | Alpine.js, Chart.js |
| **Build Tools** | Vite 5, PostCSS |
| **CSS Framework** | TailwindCSS + Bootstrap 5 |
| **Iconos** | Font Awesome 6 |

## Instalación

### Requisitos Previos

```bash
- PHP >= 8.1
- Composer
- Node.js >= 18.x
- MongoDB >= 7.0
- NPM o Yarn
```

### Pasos de Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/Ezer19/Empresa_-E.T.C-Vallenas.git
cd Empresa_-E.T.C-Vallenas
```

2. **Instalar dependencias PHP**
```bash
composer install
```

3. **Instalar dependencias Node.js**
```bash
npm install
```

4. **Configurar variables de entorno**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configurar MongoDB en .env**
```env
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=etc_vallenas
DB_USERNAME=
DB_PASSWORD=
```

6. **Compilar assets**
```bash
npm run build
```

7. **Iniciar servidor de desarrollo**
```bash
php artisan serve
npm run dev
```

8. **Acceder a la aplicación**
```
http://localhost:8000
```

## Estructura del Proyecto

```
etc-vallenas-web/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controladores
│   │   └── Middleware/       # Middlewares personalizados
│   ├── Models/               # Modelos Eloquent MongoDB
│   └── Providers/            # Service Providers
├── config/                   # Archivos de configuración
├── database/
│   ├── migrations/           # Migraciones
│   └── seeders/              # Seeders
├── public/                   # Assets públicos
│   ├── assets/
│   │   ├── images/           # Imágenes
│   │   ├── icons/            # Favicons
│   │   └── fonts/            # Tipografías
│   └── index.php             # Punto de entrada
├── resources/
│   ├── css/
│   │   └── app.css           # Estilos principales
│   └── views/                # Plantillas Blade
│       ├── layouts/          # Layouts base
│       ├── admin/            # Vistas admin
│       ├── auth/             # Autenticación
│       ├── empresa/          # Sobre nosotros
│       ├── maquinaria/       # Catálogo
│       ├── proyectos/        # Proyectos
│       ├── servicios/        # Servicios
│       └── blog/             # Blog
├── routes/
│   ├── web.php               # Rutas web
│   └── api.php               # Rutas API
├── storage/                  # Almacenamiento
├── tests/                    # Tests
├── composer.json             # Dependencias PHP
├── package.json              # Dependencias Node
├── tailwind.config.js        # Config Tailwind
├── vite.config.js            # Config Vite
└── README.md                 # Este archivo
```

## Paleta de Colores

```css
--primary-color: #1565C0    /* Azul corporativo */
--primary-dark: #0D47A1     /* Azul oscuro */
--secondary-color: #FFC107  /* Amarillo */
--success-color: #28A745    /* Verde */
--danger-color: #DC3545     /* Rojo */
--warning-color: #FFC107    /* Amarillo */
```

## Roles de Usuario

| Rol | Descripción | Permisos |
|-----|-------------|----------|
| **Super Admin** | Administrador principal | Acceso total al sistema |
| **Admin** | Administrador operativo | Gestión de maquinaria, proyectos y servicios |
| **Operador** | Operador de maquinaria | Registro de mantenimiento y operaciones |
| **Cliente** | Cliente registrado | Solicitar cotizaciones y ver proyectos |

## Módulos del Sistema

### 1. Gestión de Maquinaria
- Catálogo completo de equipos
- Estados: Disponible, En uso, Mantenimiento
- Historial de mantenimiento
- Documentación técnica
- Galería de imágenes

### 2. Gestión de Proyectos
- Planificación y seguimiento
- Asignación de recursos
- Control de presupuesto
- Hitos y entregas
- Reportes de avance

### 3. Sistema de Cotizaciones
- Formulario inteligente
- Cálculo automático de precios
- Envío por correo
- Seguimiento de estado
- Historial de cotizaciones

### 4. Panel Administrativo
- Dashboard con estadísticas
- Gestión de usuarios
- Configuración del sistema
- Reportes y exportación
- Logs de actividad

## Seguridad

- Autenticación de dos factores (2FA)
- Roles y permisos granulares
- Encriptación de datos sensibles
- Auditoría de acciones
- Backups automáticos
- Protección CSRF/XSS
- Rate limiting API

## Características PWA

- Instalable en dispositivos
- Funciona offline (básico)
- Notificaciones push
- Actualizaciones automáticas
- Icono de aplicación

## SEO y Performance

- Meta tags completos
- Structured Data (Schema.org)
- Sitemap XML
- Robots.txt
- Open Graph Protocol
- Twitter Cards
- Imágenes optimizadas
- Lazy loading
- Cache de assets

## Testing

```bash
# Ejecutar tests unitarios
php artisan test

# Ejecutar tests con coverage
php artisan test --coverage

# Tests específicos
php artisan test --filter=UsuarioTest
```

## Scripts Disponibles

```json
{
  "dev": "Servidor de desarrollo con hot reload",
  "build": "Compilar para producción",
  "preview": "Vista previa de build",
  "watch": "Watch mode para desarrollo"
}
```

## Contribución

Este es un proyecto privado de **ETC Vallenas**. Para contribuir:

1. Contactar al equipo de desarrollo
2. Solicitar acceso al repositorio
3. Seguir los lineamientos de código
4. Crear pull requests descriptivos

## Licencia

**Propietario**: ETC Vallenas  
**Copyright**: © 2025 E.T.C. Vallenas - Todos los derechos reservados

Este software es propiedad exclusiva de ETC Vallenas y está protegido por leyes de derechos de autor.

## Desarrollador

<div align="center">
  <p>
    <strong>Desarrollado por</strong><br>
    <a href="https://www.instagram.com/ezerzuniga.oficial16/">
      <strong>Ezer B. Zuñiga Chura</strong>
    </a>
  </p>
  <p>
    Email: ezerzuniga.dev@gmail.com<br>
    Instagram: @ezerzuniga.oficial16
  </p>
</div>

## Contacto ETC Vallenas

- **Web**: https://www.etcvallenas.com
- **Email**: vallenasfernando43@gmail.com
- **Teléfono**: +51 984 123 456
- **Dirección**: Av. La cultura control, Cusco, Perú
- **Horario**: Lun-Sab 8:00-18:00

## Roadmap

### Versión 1.0 (Actual)
- Sistema de autenticación
- Catálogo de maquinaria
- Gestión de proyectos
- Sistema de cotizaciones
- Panel administrativo

### Versión 1.1 (Próximamente)
- App móvil (React Native)
- Sistema de pagos online
- Chat en vivo
- Integración con GPS
- Firma digital de contratos

### Versión 2.0 (Futuro)
- IoT para maquinaria
- IA para mantenimiento predictivo
- Realidad aumentada para demostraciones
- Blockchain para trazabilidad

---

<div align="center">
  <p><strong>ETC Vallenas - Construyendo el futuro del Perú</strong></p>
  <p> Si este proyecto te fue útil, considera darle una estrella en GitHub</p>
</div>
