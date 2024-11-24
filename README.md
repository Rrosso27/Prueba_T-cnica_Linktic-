
# 1 Construir y Ejecutar el Contenedor 🚀  
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

## Ejecutar migraciones 📋 
  Generar tablas: 
  ~~~bash  
  docker-compose exec app php artisan migrate
  ~~~


 ## Prebuilt Components/Templates 🔥  

  ~~~bash  
  /users:
  get:
    summary: Obtiene una lista de usuarios
    description: Retorna una lista de todos los usuarios registrados.
    responses:
      '200':
        description: Lista de usuarios
        content:
          application/json:
            schema:
              type: array
              items:
                $ref: '#/components/schemas/User'

  ~~~




  ## Get Started  
  To get started, hit the 'clear' button at the top of the editor!  
  
 
 
      
  ## Save Readme ✨  
  Once you're done, click on the save button to download and save your ReadMe!
  