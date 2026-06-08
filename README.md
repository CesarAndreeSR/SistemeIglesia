# Sistema de Gestión de Actividades de Iglesia

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel 12">
  <img src="https://img.shields.io/badge/TailwindCSS-3-38B2AC?style=for-the-badge&logo=tailwind-css" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php" alt="PHP 8.2">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql" alt="MySQL">
</p>

Sistema web completo para la gestión de actividades, usuarios, asistencias y evidencias en una iglesia. Desarrollado con Laravel 12, Blade templates y TailwindCSS, con un diseño moderno, responsive y animado.

## 🚀 Características

### Gestión de Usuarios
- Registro y autenticación de usuarios
- Gestión de roles y cargos
- Perfil de usuario con actividades asignadas
- Historial de asistencia

### Gestión de Actividades
- Crear, editar y eliminar actividades
- Estados de actividad: Pendiente, En Proceso, Finalizado
- Asignación de responsables
- Programación de fechas y horarios
- Ubicación de actividades

### Gestión de Asistencias
- Registro de asistencia de usuarios
- Gestión masiva de asistencia
- Historial de asistencia por usuario
- Toggle rápido de asistencia

### Gestión de Evidencias
- Subida de imágenes y documentos
- Asociar evidencias a actividades
- Visualización y descarga de evidencias
- Tipos de evidencia: Imagen, Documento

### Dashboard
- Vista general del sistema
- Estadísticas de actividades
- Próximos eventos programados
- Métricas de usuarios

### Diseño y UX
- **Responsive Design**: Adaptado a todos los tamaños de pantalla
- **Sidebar colapsable**: Menú lateral con animaciones suaves
- **Animaciones**: Transiciones y efectos visuales modernos
- **Gradientes**: Diseño visual atractivo con gradientes
- **Dark/Light Mode**: Interfaz limpia y profesional
- **Iconos SVG**: Iconos vectoriales de alta calidad

## 📋 Requisitos Previos

- PHP >= 8.2
- Composer
- MySQL >= 8.0
- Node.js & NPM (opcional, para Vite)
- Servidor web (Apache/Nginx) o XAMPP

## 🔧 Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/tu-repositorio/sistema-iglesia.git
cd sistema-iglesia
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar el entorno
```bash
cp .env.example .env
```

Edita el archivo `.env` con tus credenciales de base de datos:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_iglesia
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generar clave de aplicación
```bash
php artisan key:generate
```

### 5. Ejecutar migraciones
```bash
php artisan migrate
```

### 6. Sembrar la base de datos (opcional)
```bash
php artisan db:seed
```

### 7. Iniciar el servidor de desarrollo
```bash
php artisan serve
```

El sistema estará disponible en `http://localhost:8000`

## 🗂️ Estructura del Proyecto

```
sistemaIglesia/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ActividadController.php
│   │   │   ├── AsistenciaController.php
│   │   │   ├── CargoController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── EvidenciaController.php
│   │   │   └── UserController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── Actividad.php
│   │   ├── Asistencia.php
│   │   ├── Cargo.php
│   │   ├── Evidencia.php
│   │   └── User.php
│   └── Providers/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   ├── header.blade.php
│   │   │   └── sidebar.blade.php
│   │   ├── actividades/
│   │   ├── asistencias/
│   │   ├── cargos/
│   │   ├── dashboard/
│   │   ├── evidencias/
│   │   └── users/
│   └── lang/
├── routes/
│   ├── web.php
│   └── api.php
├── database/
│   ├── migrations/
│   └── seeders/
└── public/
```

## 🎯 Funcionalidades Principales

### Autenticación
- Login por nombre de usuario
- Protección de rutas con middleware
- Sesiones gestionadas con driver de archivos
- Cierre de sesión seguro

### Rutas Principales
- `/dashboard` - Panel principal
- `/users` - Gestión de usuarios
- `/cargos` - Gestión de cargos/roles
- `/actividades` - Gestión de actividades
- `/evidencias` - Gestión de evidencias
- `/asistencias` - Gestión de asistencias

### Modelos de Base de Datos
- **Users**: Usuarios del sistema
- **Cargos**: Roles y cargos de usuarios
- **Actividades**: Eventos y actividades programadas
- **Asistencias**: Registro de asistencia a actividades
- **Evidencias**: Documentos y fotos de actividades

## 🎨 Tecnologías Utilizadas

- **Backend**: Laravel 12
- **Frontend**: Blade Templates
- **CSS Framework**: TailwindCSS (CDN)
- **Base de Datos**: MySQL
- **Autenticación**: Laravel Breeze
- **ORM**: Eloquent ORM
- **Validación**: Laravel Validation
- **Almacenamiento**: Laravel Storage (public)

## 📱 Responsive Design

El sistema está completamente optimizado para funcionar en:
- **Desktop**: Pantallas grandes (>1024px)
- **Tablet**: Pantallas medianas (768px - 1024px)
- **Móvil**: Pantallas pequeñas (<768px)

### Características Responsive
- Sidebar colapsable en móviles con overlay
- Tablas con scroll horizontal en pantallas pequeñas
- Grid adaptativo para tarjetas y estadísticas
- Botones y elementos táctiles optimizados
- Tipografía escalable

## 🔐 Seguridad

- Autenticación por nombre de usuario
- Protección CSRF en todos los formularios
- Validación de datos en servidor
- Sanitización de entradas
- Middleware de autenticación
- Hash de contraseñas con bcrypt

## 🚀 Comandos Útiles

### Limpiar caché
```bash
php artisan optimize:clear
```

### Limpiar caché de rutas
```bash
php artisan route:clear
```

### Limpiar caché de vistas
```bash
php artisan view:clear
```

### Ejecutar migraciones
```bash
php artisan migrate
```

### Revertir migraciones
```bash
php artisan migrate:rollback
```

### Crear nueva migración
```bash
php artisan make:migration nombre_migracion
```

### Crear nuevo modelo
```bash
php artisan make:model NombreModelo
```

### Crear nuevo controlador
```bash
php artisan make:controller NombreController
```

## 📝 Configuración Adicional

### Configuración de Storage
Las evidencias se almacenan en `storage/app/public/evidencias`. Asegúrate de crear el enlace simbólico:

```bash
php artisan storage:link
```

### Configuración de Sesiones
El sistema usa el driver de archivos para sesiones. Puedes cambiar esto en `config/session.php`:

```php
'driver' => env('SESSION_DRIVER', 'file'),
```

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/NuevaCaracteristica`)
3. Commit tus cambios (`git commit -am 'Añadir nueva característica'`)
4. Push a la rama (`git push origin feature/NuevaCaracteristica`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo LICENSE para más detalles.

## 👥 Autores

- **Tu Nombre** - Desarrollo inicial

## 🙏 Agradecimientos

- Laravel Framework
- TailwindCSS
- La comunidad de Laravel

## 📞 Soporte

Para soporte técnico, por favor abre un issue en el repositorio de GitHub.
