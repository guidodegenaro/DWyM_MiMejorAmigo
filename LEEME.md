# Mi Mejor Amigo — Sitio en PHP + MySQL (XAMPP)

Prototipo de la clínica veterinaria para la materia de Bases de Datos.
Frontend mobile en HTML/CSS y portal privado en PHP conectado a MySQL (solo lectura).

## Puesta en marcha en XAMPP

1. **Copiar el proyecto**
   Poné toda esta carpeta dentro de `htdocs` de XAMPP, por ejemplo:
   `C:\xampp\htdocs\mi-mejor-amigo\`

2. **Prender los servicios**
   Abrí el *Panel de Control de XAMPP* y arrancá **Apache** y **MySQL**.

3. **Crear la base de datos**
   Entrá a `http://localhost/phpmyadmin` → pestaña **Importar** →
   elegí el archivo `bd_mi_mejor_amigo.sql` → **Continuar**.
   Eso crea la base `mi_mejor_amigo` con todas las tablas y datos de ejemplo.

4. **Abrir el sitio**
   Andá a `http://localhost/mi-mejor-amigo/index.html`
   (o directo al portal: `http://localhost/mi-mejor-amigo/login.php`).

5. **Ingresar al portal**
   En el login usá el DNI de prueba **30111222** (Manuel Sánchez),
   que tiene dos mascotas con historial cargado.

## Archivos

**Públicas (estáticas)**
- `index.html` — galería de las placas
- `nosotros.html`, `especialidades.html`, `contacto.html`

**Portal privado (PHP, leen de la base)**
- `login.php` / `logout.php` — ingreso por DNI del dueño
- `portal.php` — menú del portal
- `mis-datos.php` — perfil del dueño (`Dueno` + `Direccion`)
- `mis-mascotas.php` — fichas de las mascotas (`Mascota`)
- `historial.php` — consultas, diagnósticos, recetas y alergias
- `turnos.php` — flujo de reserva (maqueta, no guarda: el diagrama no tiene tabla de turnos)

**Infraestructura**
- `conexion.php` — conexión mysqli a MySQL
- `sesion.php` — control de acceso
- `cabecera.php` / `pie.php` — encabezado y pie reutilizables
- `estilos.css` — sistema de diseño
- `bd_mi_mejor_amigo.sql` — script de la base

## Notas

- La conexión usa `root` sin contraseña (valores por defecto de XAMPP).
  Si tu MySQL tiene otra clave, cambiála en `conexion.php`.
- Las consultas usan *prepared statements* (parámetros), buena práctica
  para evitar inyección SQL.
- El portal es de **solo lectura**, según lo definido para el trabajo.
