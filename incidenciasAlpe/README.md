# Proyecto IncidenciasAlpe: [Título Descriptivo del Proyecto]

## Tabla de Contenidos

1.  [Descripción del Proyecto](#1-descripción-del-proyecto)
2.  [Características Principales](#2-características-principales)
3.  [Tecnologías Utilizadas](#3-tecnologías-utilizadas)
4.  [Requisitos del Sistema](#4-requisitos-del-sistema)
5.  [Instalación Local](#5-instalación-local)
    *   [Clonar el Repositorio](#clonar-el-repositorio)
    *   [Configuración de Variables de Entorno](#configuración-de-variables-de-entorno)
    *   [Levantar el Entorno Docker](#levantar-el-entorno-docker)
    *   [Dependencias de Composer](#dependencias-de-composer)
    *   [Clave de Aplicación](#clave-de-aplicación)
    *   [Base de Datos e Importación](#base-de-datos-e-importación)
    *   [Dependencias de Frontend](#dependencias-de-frontend)
    *   [Compilación de Assets](#compilación-de-assets)
6.  [Uso de la Aplicación](#6-uso-de-la-aplicación)
7.  [Estructura del Proyecto](#7-estructura-del-proyecto)
8.  [Ejecución de Tests](#8-ejecución-de-tests)
9.  [Contribución](#9-contribución)
10. [Licencia](#10-licencia)

---

## 1. Descripción del Proyecto

[**TODO: Describe aquí brevemente de qué trata la aplicación IncidenciasAlpe. ¿Cuál es su propósito principal? ¿Qué problema resuelve?**]

Este proyecto es una aplicación web desarrollada con Laravel que gestiona XXXX.

## 2. Características Principales

[**TODO: Enumera las funcionalidades más importantes de la aplicación IncidenciasAlpe. Ejemplos:**]

*   Sistema de gestión de incidencias.
*   Autenticación de usuarios.
*   Registro y seguimiento de tickets.
*   Asignación de incidencias a técnicos/empleados.
*   Notificaciones.
*   [Añade más características específicas de tu proyecto aquí]

## 3. Tecnologías Utilizadas

*   **Backend:** PHP (v8.x) & Laravel (v12.x)
*   **Frontend:**
    *   Tailwind CSS (v3.x)
    *   Alpine.js (v3.x)
    *   Blade (como motor de plantillas de Laravel)
    *   Vite (para compilación de assets)
*   **Base de Datos:** MySQL (v8.x)
*   **Contenedores:** Docker & Docker Compose
*   **Control de Versiones:** Git & GitHub

## 4. Requisitos del Sistema

Para poder levantar y trabajar con este proyecto, necesitarás tener instalado:

*   **Docker Desktop** (o Docker Engine y Docker Compose CLI)
*   **Git**

## 5. Instalación Local

Sigue estos pasos para configurar y ejecutar la aplicación en tu entorno local:

### Clonar el Repositorio

Primero, clona el repositorio del proyecto:

```bash
git clone https://github.com/tu-usuario/IncidenciasAlpe.git # [TODO: Actualiza con la URL real de tu repositorio]
cd IncidenciasAlpe

Configuración de Variables de Entorno

Copia el archivo de ejemplo de variables de entorno y ajusta los valores según tu configuración local.

Bash


cp .env.example .env

Abre el archivo .env y configura al menos lo siguiente:

• DB_CONNECTION=mysql
• DB_HOST=mysql (Este es el nombre del servicio MySQL en docker-compose.yml)
• DB_PORT=3306
• DB_DATABASE=laravel (O el nombre que desees para tu base de datos)
• DB_USERNAME=root (O el usuario configurado en docker-compose.yml)
• DB_PASSWORD=*** (O la contraseña configurada en docker-compose.yml`)
• APP_URL=http://localhost (O la URL donde se ejecutará tu aplicación)

Levantar el Entorno Docker

Con Docker Desktop en ejecución, levanta los servicios definidos en docker-compose.yml:

Bash


docker-compose up -d --build

Esto creará los contenedores para PHP, Nginx (o similar) y MySQL.

Dependencias de Composer

Accede al contenedor de la aplicación PHP (normalmente llamado app o php
) y instala las dependencias de Composer:

Bash


docker-compose exec app composer install

Clave de Aplicación

Genera la clave de aplicación de Laravel:

Bash


docker-compose exec app php artisan key:generate

Base de Datos e Importación

Ejecuta las migraciones de la base de datos de Laravel (creará las tablas):

Bash



docker-compose exec app php artisan migrate

Importación de Datos (Opcional):

Si deseas importar los datos iniciales o de ejemplo desde alpe.sql, el archivo debería estar accesible desde el contenedor de la base de datos. Una forma común es la siguiente (asegúrate de que alpe.sql esté en el mismo directorio que docker-compose.yml o adaptando la ruta):

Bash


# Entra al contenedor de MySQL
docker-compose exec mysql sh -c "mysql -u`root` -p`password` laravel < /docker-entrypoint-initdb.d/alpe.sql" # [TODO: Ajusta usuario, contraseña y nombre de DB si son diferentes]

# Si alpe.sql está dentro del contenedor de la aplicación Laravel, puedes hacerlo así:
# docker-compose exec app sh -c "mysql -h mysql -u root -p password laravel < /var/www/html/alpe.sql"

Nota: Es crucial que los credenciales root y password en el comando mysql coincidan con los configurados en docker-compose.yml y .env.

Dependencias de Frontend

Accede al contenedor de la aplicación e instala las dependencias de Node.js:

Bash


docker-compose exec app npm install

Compilación de Assets

Compila los assets de frontend (CSS y JS):

Bash


docker-compose exec app npm run build

Para desarrollo con Hot Module Replacement (HMR):

Bash


docker-compose exec app npm run dev

Acceder a la Aplicación

Una vez que todos los pasos anteriores estén completos, la aplicación debería estar accesible en tu navegador en:

http://localhost (o el puerto que hayas configurado en tu docker-compose.yml si es diferente de 80)

6. Uso de la Aplicación

[TODO: Explica brevemente cómo usar la aplicación. Podrías incluir:]

• URL de acceso.
• Credenciales de prueba para el primer inicio de sesión (si existen).
• Pasos básicos para crear/ver una incidencia.
• [Añade más detalles sobre el flujo principal de uso]

7. Estructura del Proyecto

La estructura principal del proyecto sigue las convenciones de Laravel:

• app/: Contiene los modelos, controladores, middleware, etc.
• bootstrap/: Configuración del framework.
• config/: Archivos de configuración de la aplicación.
• database/: Migraciones, seeders y factorías de la base de datos.
• public/: El "document root" del proyecto, contiene los assets compilados.
• resources/: Vistas (Blade), assets SCSS/JS sin compilar.
• routes/: Definición de rutas web y de API.
• storage/: Archivos generados por Laravel (logs, cachés, sesiones, etc.).
• tests/: Tests unitarios y de características.
• vendor/: Dependencias de Composer.
• node_modules/: Dependencias de Node.js (Frontend).
• docker-compose.yml: Configuración de los servicios Docker para desarrollo.
• alpe.sql: Dump inicial de la base de datos.
• .env.example: Ejemplo de variables de entorno.

8. Ejecución de Tests

Para ejecutar los tests automatizados del proyecto:

Bash


docker-compose exec app php artisan test
