
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

## Remover contenedores.  
  To get started, hit the 'clear' button at the top of the editor!  
  
  Generar tablas: 
  ~~~bash  
  docker-compose exec app php artisan migrate
  ~~~

## Realizar pruebas de las peticiones: ✨  
  Si deseas ejecutar las peticiones del proyecto sin la necesidad de instalar Postman, puedes hacerlo mediante el archivo 
  ~~~bash  
  script.http 
  ~~~
  ubicado en la raíz del proyecto.

  Para realizar las peticiones mediante el archivo script.http,
  necesitas instalar 📦[REST Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client) en tu Visual Studio 


## Pswagger 🔥  

  ~~~bash 
     openapi: 3.0.3
info:
  title: API de Productos y Órdenes
  description: API para gestionar productos y órdenes.
  version: 1.0.0
servers:
  - url: http://127.0.0.1:8000/api

paths:
  /products/:
    get:
      summary: Obtener todos los productos
      description: Recupera la lista de todos los productos disponibles.
      responses:
        '200':
          description: Lista de productos obtenida exitosamente.
          content:
            application/json:
              schema:
                type: array
                items:
                  type: object
                  properties:
                    id:
                      type: integer
                    name:
                      type: string
                    price:
                      type: number
                      format: float
                    stock:
                      type: integer
    post:
      summary: Crear un nuevo producto
      description: Agrega un producto a la base de datos.
      requestBody:
        required: true
        content:
          application/json:
            schema:
              type: object
              properties:
                name:
                  type: string
                price:
                  type: number
                  format: float
                stock:
                  type: integer
              required: [name, price, stock]
      responses:
        '201':
          description: Producto creado exitosamente.

  /products/{id}/:
    get:
      summary: Mostrar un producto
      description: Recupera los detalles de un producto específico.
      parameters:
        - name: id
          in: path
          required: true
          schema:
            type: integer
      responses:
        '200':
          description: Detalles del producto obtenidos exitosamente.
    put:
      summary: Actualizar un producto
      description: Modifica los datos de un producto existente.
      parameters:
        - name: id
          in: path
          required: true
          schema:
            type: integer
      requestBody:
        required: true
        content:
          application/json:
            schema:
              type: object
              properties:
                name:
                  type: string
                price:
                  type: number
                  format: float
                stock:
                  type: integer
              required: [name, price, stock]
      responses:
        '200':
          description: Producto actualizado exitosamente.
    delete:
      summary: Eliminar un producto
      description: Elimina un producto específico.
      parameters:
        - name: id
          in: path
          required: true
          schema:
            type: integer
      responses:
        '204':
          description: Producto eliminado exitosamente.

  /orders/:
    get:
      summary: Obtener todas las órdenes
      description: Recupera la lista de todas las órdenes.
      responses:
        '200':
          description: Lista de órdenes obtenida exitosamente.
          content:
            application/json:
              schema:
                type: array
                items:
                  type: object
                  properties:
                    id:
                      type: integer
                    status:
                      type: string
                    total_amount:
                      type: number
                      format: float
                    payment_status:
                      type: string
    post:
      summary: Crear una nueva orden
      description: Agrega una orden a la base de datos.
      requestBody:
        required: true
        content:
          application/json:
            schema:
              type: object
              properties:
                status:
                  type: string
                total_amount:
                  type: number
                  format: float
                payment_status:
                  type: string
                payment_method:
                  type: string
                shipping_address:
                  type: string
                billing_address:
                  type: string
                shipping_fee:
                  type: number
                  format: float
                discount:
                  type: number
                  format: float
                notes:
                  type: string
                product_id:
                  type: integer
                total_price:
                  type: string
              required: [status, total_amount, payment_status, product_id, total_price]
      responses:
        '201':
          description: Orden creada exitosamente.

  /orders/{id}/:
    get:
      summary: Mostrar una orden
      description: Recupera los detalles de una orden específica.
      parameters:
        - name: id
          in: path
          required: true
          schema:
            type: integer
      responses:
        '200':
          description: Detalles de la orden obtenidos exitosamente.
    put:
      summary: Actualizar una orden
      description: Modifica los datos de una orden existente.
      parameters:
        - name: id
          in: path
          required: true
          schema:
            type: integer
      requestBody:
        required: true
        content:
          application/json:
            schema:
              type: object
              properties:
                status:
                  type: string
                total_amount:
                  type: number
                  format: float
                payment_status:
                  type: string
                payment_method:
                  type: string
                shipping_address:
                  type: string
                billing_address:
                  type: string
                shipping_fee:
                  type: number
                  format: float
                discount:
                  type: number
                  format: float
                notes:
                  type: string
                product_id:
                  type: integer
                total_price:
                  type: string
              required: [status, total_amount, payment_status, product_id, total_price]
      responses:
        '200':
          description: Orden actualizada exitosamente.
    delete:
      summary: Eliminar una orden
      description: Elimina una orden específica.
      parameters:
        - name: id
          in: path
          required: true
          schema:
            type: integer
      responses:
        '204':
          description: Orden eliminada exitosamente.
       
  ~~~



## Remover contenedores.  🗑️

  ~~~bash  
  docker compose down
  ~~~
 
 
      
  
  