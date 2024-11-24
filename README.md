
#  Construir y Ejecutar el Contenedor  
  1.1 Construye los contenedores (Obligatorio): 
  ~~~bash  
        docker-compose build
  ~~~
  1.2 .Inicia los servicios (Obligatorio): 
  ~~~bash  
        docker-compose up -d
  ~~~
  1.3 .Verifica que los contenedores estén corriendo. Este paso no es obligatorio
  ~~~bash  
        docker ps
  ~~~

# Generar laravel key
  .Usa el siguiente comando para generar la Application Key de Laravel: 
  ~~~bash  
  docker-compose exec app  php artisan key:generate
  ~~~

#  Especificaciones técnicas de las tablas 
   [ Especificaciones técnicas](https://docs.google.com/document/d/1vk9SmsyMqpxX3pX6C6pW32tMuKqWLi7Edxdit0FxJP8/edit?tab=t.0)

## Ejecutar migraciones 
  Generar tablas: 
  ~~~bash  
  docker-compose exec app php artisan migrate
  ~~~

## Remover contenedores.  
  To get started, hit the 'clear' button at the top of the editor!  
  
  Generar tablas: 
  ~~~bash  
  docker-compose exec app php artisan migrate
  ~~~

## Documentación de los servicios en Swagger
  
   [Swagger](https://raw.githubusercontent.com/Rrosso27/Prueba_T-cnica_Linktic-/refs/heads/main/swagger.yaml)
  

## Realizar pruebas de las peticiones:   
  Si deseas ejecutar las peticiones del proyecto sin la necesidad de instalar Postman, puedes hacerlo mediante el archivo 🧾[REST Client](https://raw.githubusercontent.com/Rrosso27/Prueba_T-cnica_Linktic-/refs/heads/main/script.http)   ubicado en la raíz del proyecto.

  Para realizar las peticiones mediante el archivo script.http,
  necesitas instalar 📦[REST Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client) en tu Visual Studio 


## Remover contenedores.  🗑️

  ~~~bash  
  docker compose down
  ~~~
 
 
      
  
  