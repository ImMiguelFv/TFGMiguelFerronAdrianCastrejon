document.addEventListener('DOMContentLoaded', function() {
    // URL del archivo JSON que contiene los datos del producto
    // Obtener los detalles del producto usando Fetch
    fetch('/data/productos.json')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        // Obtener el primer producto del JSON (asumiendo que es un arreglo)
        const product = data.productos[0];
  
        // Mostrar los detalles del producto en el HTML
        const productDetailsDiv = document.getElementById('productDetails');
        productDetailsDiv.innerHTML = `
        <h2>${product.nombre}</h2>
        <p><strong>Descripción:</strong> ${product.descripcion}</p>
        <p><strong>Precio:</strong> $${product.precio.toFixed(2)}</p>
        <h3>Imágenes:</h3>
        <ul>
          ${product.imagenes.map(image => `<li><img src="${image}" alt="${product.nombre}"></li>`).join('')}
        </ul>
        
        <h3>Colores disponibles:</h3>
        <ul>
          ${product.colores.map(color => `<li><div style="width: 20px; height: 20px; background-color: ${color}; display: inline-block; border: 1px solid black;"></div></li>`).join('')}
        </ul>
        
        
        `;
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  });
  