# Prueba_T-cnica_Linktic-
Este es el repositorio de la Prueba Técnica de Backend - Nivel Medio


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

## Ejecutar migraciones
  Paso 1. Ingresar a la consola de comandos de laravel tinker: 
  ~~~bash  
  docker-compose exec app php artisan tinker
  ~~~
  Paso 2.
 ~~~bash  
  
  ~~~

  ## Get Started  
  To get started, hit the 'clear' button at the top of the editor!  
  
  ## Prebuilt Components/Templates 🔥  
  You can checkout prebuilt components and templates by clicking on the 'Add Section' button or menu icon
  on the top left corner of the navbar.
      
  ## Save Readme ✨  
  Once you're done, click on the save button to download and save your ReadMe!
  