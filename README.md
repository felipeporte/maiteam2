# Club de Patinaje Artístico - Proyecto PHP MVC

Este proyecto es una implementación sencilla de un sistema de gestión para un club de patinaje artístico en Chile.

## Requisitos
- PHP 7+
- Servidor Apache
- MySQL

## Instalación
1. Cree una base de datos llamada `clubpatinaje` en MySQL.
2. Ejecute el script `schema.sql` incluido para crear las tablas y registros iniciales:
   ```bash
   mysql -u root -p clubpatinaje < schema.sql
   ```
3. Configure los datos de conexión a la base de datos en `config/database.php` (usuario y contraseña).
4. Copie todos los archivos en el directorio público de Apache (por ejemplo `htdocs`).
5. Acceda a `http://localhost/public/index.php` en su navegador para usar la aplicación.

## Estructura de carpetas
- `config/` – configuración de base de datos.
- `models/` – modelos con funciones CRUD.
- `controllers/` – controladores para cada entidad.
- `views/` – vistas con Bootstrap.
- `public/` – punto de entrada `index.php`.

## Notas
El proyecto no usa frameworks externos y sigue una estructura MVC básica para propósitos educativos.
