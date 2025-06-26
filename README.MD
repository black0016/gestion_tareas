# Gestión de Tareas - Plataforma AV

Este es un proyecto de gestión de tareas desarrollado como parte de una entrevista técnica. Permite a usuarios y administradores crear, editar, listar y eliminar tareas, así como gestionar usuarios y autenticación.

## Características

- Registro e inicio de sesión de usuarios
- Roles: Administrador y Usuario
- CRUD de tareas (crear, listar, editar, eliminar, marcar como completada)
- Validaciones en frontend y backend
- Interfaz responsiva con Bootstrap y AdminLTE
- Notificaciones y modales con jQuery Confirm
- DataTables para visualización de tareas
- Control de sesiones y permisos

## Estructura del Proyecto

```
gestion_tareas.sql            # Script de base de datos
app/
  controllers/                # Controladores PHP (MVC)
  models/                     # Modelos PHP (acceso a datos)
  libraries/                  # Librerías auxiliares (DB, rutas, vistas)
  services/                   # Servicios auxiliares
config/                       # Configuración de la app y rutas
public/
  css/                        # Estilos (Bootstrap, personalizados)
  js/                         # Scripts JS (tareas, login, helpers)
  AdminLTE/                   # Plantilla de administración
  index.php                   # Front controller
views/
  pages/                      # Vistas principales
  partials/                   # Partes reutilizables (header, footer, etc)
```

## Instalación

1. **Clona el repositorio**
   ```sh
   git clone https://github.com/tuusuario/gestion_tareas.git
   ```

2. **Configura el entorno**
   - Copia `config/env.php.example` a `config/env.php` y ajusta los parámetros de conexión a tu base de datos.

3. **Instala la base de datos**
   - Importa el archivo [`gestion_tareas.sql`](gestion_tareas.sql) en tu servidor MySQL/MariaDB.

4. **Configura el servidor web**
   - Apunta el DocumentRoot a la carpeta `public/`.
   - Asegúrate de que `mod_rewrite` esté habilitado si usas Apache.

5. **Accede a la aplicación**
   - Abre en tu navegador: [http://localhost/gestion_tareas/public](http://localhost/gestion_tareas/public)

## Tecnologías utilizadas

- PHP (MVC simple)
- MySQL/MariaDB
- jQuery, Bootstrap, AdminLTE
- DataTables, jQuery Confirm, Bootstrap Validator

## Notas

- El acceso a rutas está protegido por sesión y tipo de usuario.
- El sistema es fácilmente extensible para agregar nuevas funcionalidades o roles.

---

**Desarrollado para entrevista técnica.**