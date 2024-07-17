# Read Me
Pequeña guía sobre la app.

Aplicación probada y desarrollada en Symfony 7 y PHP 8.3

Para poder correr la app, iniciar servidor en Symfony y realizar un "composer install" para descargar todas las dependencias necesarias.

Es una aplicación base de Symfony, la parte "API Rest" se divide en:

 - Los métodos situados en "src/Controller/Methods"
 - Los servicios situados en "src/Service"

Para extraer los datos, la app se alimenta de Google Big Query, en este caso hacemos uso de un plugin instalado a través de composer del cual se llama desde el servicio creado para realizar querys.

En este caso, he enviado adunto unas credenciales de testing donde permitirá usar la conexión de forma limitada pero suficiente para la prueba. Este archivo "googleapi.json" hay que ponerlo en la raíz de la app junto con los composer.json y .env

La estructura está montada de tal forma que si quisiéramos crear métodos estos se agruparían en su controladora correspondiente dependiendo de los datos consultados.

Hay 2 métodos de prueba:

 - http://domain/api/posts/searchByText/{texto_a_buscar} donde consultará en la tabla de posts el texto escrito
 - http://domain/api/users/searchByName/{nombre_a_buscar} donde consultará usuarios con el texto escrito

Ambos métodos son tipo GET pues únicamente muestran información.

Ambos métodos usan la misma función creada en el servicio, por lo que si se actualizara el plugin de Google sería mas ameno pues solo habría que tocar una función.

Nota: *Al ser la primera vez que uso Big Query no me ha dado tiempo a poder implementar un sistema anti SQL Injection, pues la forma en la que extrae los datos no es del todo segura.