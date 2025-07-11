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

### Generar facturas
Para generar las mensualidades del mes en curso visite:
```
http://localhost/public/index.php?controller=facturas&action=generar
```
Luego podrá revisar la sección **Facturas** para ver deudas y registrar pagos.

Cada factura ahora incluye un desglose por entrenador en la tabla `facturas_coach`, permitiendo separar lo que corresponde pagar al club y a cada coach.
Además se añadió una pequeña interfaz para que el departamento de entrenadores consulte las deudas por coach desde `Deudas Coaches` en el menú principal.

### Uso de la sección "Facturas"
1. Ingrese al menú **Facturas** en la barra de navegación.
2. Desde ahí podrá filtrar por apoderado, mes o estado, consultar el detalle y registrar pagos parciales o totales.

## Estructura de carpetas
- `config/` – configuración de base de datos.
- `models/` – modelos con funciones CRUD.
- `controllers/` – controladores para cada entidad.
- `views/` – vistas con Bootstrap.
- `public/` – punto de entrada `index.php`.

## Notas
El proyecto no usa frameworks externos y sigue una estructura MVC básica para propósitos educativos.
