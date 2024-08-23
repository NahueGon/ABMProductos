-Archivo database.sql contiene la base de datos con la ta "product" (id, product, description, price)

-symfony server:start

-.env ya conectado a la base de datos mysql

-Controlador "Home" vista del inicio.

-Controlador "Product" contiene estos metodos:

	index:
		Lista todos los productos.
		url: /products
		name: products
	
	create:
		Muestra el form para crear productos,
  		mas la logica para insertarlos a la bd.
		url: /products/create
		name: create_product
	
	show:
		Muestra el producto seleccionado con el boton de la vista index "ver".
		url: /products/show/{id}
		name: show_product
	
	edit:
		Muestra el form para editar el producto seleccionado con el boton de la vista index "editar",
  		mas la logica para insertar los nuevos datos a la bd.
		url: /products/edit/{id}
		name: edit_product
	
	destroy:
		Elimina el producto seleccionado con el boton de la vista index "borrar".
		url: /products/delete/{id}
		name: delete_product
  
