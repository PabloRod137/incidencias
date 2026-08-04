<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        // docker-compose.yml fija DB_CONNECTION=mysql a nivel de contenedor, lo que puede
        // pisar el sqlite en memoria de phpunit.xml. Se comprueba ANTES de arrancar la
        // aplicación (parent::setUp() ya dispara RefreshDatabase) para evitar que un
        // entorno mal configurado llegue a truncar la base de datos de desarrollo/producción real.
        if (getenv('DB_CONNECTION') !== 'sqlite') {
            throw new \RuntimeException(
                'Los tests deben ejecutarse con la conexión sqlite en memoria definida en phpunit.xml, '
                .'pero la variable de entorno DB_CONNECTION es "'.getenv('DB_CONNECTION').'". '
                .'Aborta antes de arrancar la aplicación para evitar truncar una base de datos real.'
            );
        }

        parent::setUp();
    }
}
