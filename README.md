<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### API Cuantos Pares

### Prerequisitos
- Composer^2.0.10
- Node^14.16
- MySql

## Instalación
- Ejecutar Composer install
- Copiar el archivo .env_original (cp .env_original .env)
- Modificar variables del archivo .env de acuedo al ambiente
- Crear App_Key -> ejecutar php artisan key:generate
- Ejecutar php artisan migrate
- Ejecutar npm install

## Despliegue
- La API se encuentra desplegada en RAILWAY servicio free que permite montar y desplegar una BD y API en nube
- Railway en la vercion free permite 500 horas de peticiones
