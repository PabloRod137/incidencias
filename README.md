# Incidencias Alpe

Sistema de gestión de incidencias desarrollado para la **Academia Alpe**. Permite a profesores, personal de mantenimiento y administradores registrar, dar seguimiento y resolver incidencias (averías, desperfectos, incidencias técnicas, etc.) relacionadas con las aulas del centro.

Este repositorio es el punto de entrada del proyecto: contiene la aplicación web (Laravel), un dump de base de datos con datos de demostración y la configuración Docker necesaria para levantar todo el entorno en local con un solo comando.

## Descripción del proyecto

La aplicación cubre el ciclo de vida completo de una incidencia:

- **Autenticación de usuarios** (registro, login, recuperación de contraseña) mediante Laravel Breeze.
- **Roles diferenciados**: `admin`, `profesor` y `mantenimiento`, cada uno con permisos distintos sobre el panel de administración.
- **Registro y seguimiento de incidencias**, con estado (abierta / en proceso / resuelta) y prioridad (baja / media / alta / crítica).
- **Comentarios** sobre cada incidencia para documentar su resolución.
- **Gestión de aulas y categorías** de incidencias (cada categoría con un responsable asignado), reservada a administradores.
- **Gestión de usuarios y roles**, reservada a administradores.
- **Dashboard** con indicadores generales y actividad reciente.

El acceso a la gestión de usuarios, aulas y categorías está restringido por middleware de rol (`role:admin`); un usuario autenticado sin ese rol no puede promocionarse a sí mismo ni gestionar esos recursos.

## Estructura del repositorio

```
incidencias/
├── incidenciasAlpe/     # Aplicación Laravel (backend + frontend)
├── alpe.sql             # Dump de MySQL con datos de demostración
├── docker-compose.yml   # Orquesta los contenedores de MySQL y de la app
└── README.md            # Este archivo
```

### `incidenciasAlpe/`

Aplicación Laravel 13 (PHP 8.3+) que implementa toda la lógica de negocio: modelos, controladores, middleware, vistas Blade, rutas, tests, etc. Sigue la estructura estándar de un proyecto Laravel. Usa Tailwind CSS, Alpine.js y Vite para el frontend. Tiene su propio [`README.md`](incidenciasAlpe/README.md) con detalle adicional de instalación pensado para ejecutarse dentro del proyecto Laravel en sí; este README de la raíz documenta el conjunto del repositorio, incluyendo el dump de datos y el docker-compose que viven fuera de esa carpeta.

### `alpe.sql`

Dump completo de la base de datos MySQL `alpe` con datos de **demostración** (usuarios, aulas, categorías, incidencias y comentarios generados con Faker — direcciones `@example.com` / `@example.org` / `@example.net`, sin datos reales de clientes). Sirve para que cualquiera que clone el repositorio pueda importar de golpe un conjunto de datos de ejemplo y ver la aplicación funcionando sin tener que sembrarla a mano. Incluye usuarios de prueba para cada rol, entre ellos `test@example.com` (rol `admin`).

> Nota: al ser datos ficticios de demo, no hay problema en tenerlos versionados en el repositorio. Si en algún momento se usa este dump como base para cargar datos reales de producción, **no debe commitearse** esa versión.

### `docker-compose.yml`

Define dos servicios para levantar el entorno de desarrollo:

- **`mysql`**: MySQL 8.0, expuesto en el puerto `3307` (mapeado al `3306` interno), con base de datos `alpe`, usuario `admin` y contraseña `1020` (más el usuario `root` con contraseña `root`).
- **`app_incidencias`**: imagen `serversideup/php:8.4-fpm-nginx` (PHP-FPM + Nginx) que monta la carpeta `./incidenciasAlpe` como document root y se conecta al servicio `mysql`. Expuesto en el puerto `8001` (mapeado al `8080` interno del contenedor).

## Cómo levantar el entorno

### Requisitos

- Docker Desktop (o Docker Engine + Docker Compose CLI)
- Git

### Pasos

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/PabloRod137/incidencias.git
   cd incidencias
   ```

2. **Configurar variables de entorno de la aplicación**

   Dentro de `incidenciasAlpe/` copia el archivo de ejemplo y ajusta lo necesario:

   ```bash
   cd incidenciasAlpe
   cp .env.example .env
   ```

   Como mínimo revisa que estos valores coincidan con los definidos en `docker-compose.yml`:

   ```
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=alpe
   DB_USERNAME=admin
   DB_PASSWORD=1020
   ```

3. **Levantar los contenedores** (desde la raíz del repositorio, donde está `docker-compose.yml`)

   ```bash
   cd ..
   docker-compose up -d --build
   ```

   Esto arranca el contenedor de MySQL y el de la aplicación (PHP-FPM + Nginx).

4. **Instalar dependencias de Composer y generar la clave de la app**

   ```bash
   docker-compose exec app_incidencias composer install
   docker-compose exec app_incidencias php artisan key:generate
   ```

5. **Migrar la base de datos**

   ```bash
   docker-compose exec app_incidencias php artisan migrate
   ```

6. **(Opcional) Importar los datos de demostración desde `alpe.sql`**

   Desde la raíz del repositorio, con los contenedores levantados:

   ```bash
   docker-compose exec -T mysql sh -c 'mysql -uadmin -p1020 alpe' < alpe.sql
   ```

   Esto puebla la base de datos con los usuarios, aulas, categorías, incidencias y comentarios de ejemplo descritos más arriba.

7. **Instalar dependencias de frontend y compilar assets**

   ```bash
   docker-compose exec app_incidencias npm install
   docker-compose exec app_incidencias npm run build
   ```

   Para desarrollo con recarga en caliente:

   ```bash
   docker-compose exec app_incidencias npm run dev
   ```

8. **Acceder a la aplicación**

   Una vez completados los pasos anteriores, la aplicación estará disponible en `http://localhost:8001`.

   Si se importó `alpe.sql`, puedes iniciar sesión, por ejemplo, con `test@example.com` (rol `admin`) — la contraseña es la que corresponda a los datos de demo con los que se generó el dump.

## Configuración adicional

- El archivo `.env` de `incidenciasAlpe/` no se versiona (está en `.gitignore`); usa siempre `.env.example` como plantilla.
- `docker-compose.yml` fija `DB_CONNECTION=mysql` como variable de entorno a nivel de contenedor. Esto tiene prioridad sobre el sqlite en memoria que usa `phpunit.xml` para los tests, según cómo lo resuelva el entorno Docker. Por seguridad, los tests abortan con un `RuntimeException` si detectan que no están usando sqlite (ver `incidenciasAlpe/tests/TestCase.php`), para evitar truncar por error la base de datos real. Si ocurre, fuerza el override explícitamente:

  ```bash
  docker-compose exec -e DB_CONNECTION=sqlite -e DB_DATABASE=:memory: app_incidencias php artisan test
  ```

## Repositorios remotos

Este proyecto se mantiene sincronizado en dos remotos:

- GitHub: https://github.com/PabloRod137/incidencias
- GitLab: https://gitlab.com/pablorod1377-group/proeycto-personal/automatizacion/incidencias
