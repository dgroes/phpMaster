/* LIMITAR EL AÑO DEL VEHÍCULO Y EL CÓDIGO DE ESTE*/
function limitarDigitos(elemento, maxLength) {
    if (elemento.value.length > maxLength) {
      elemento.value = elemento.value.slice(0, maxLength);
    }
  }

  function validarPrecio(elemento) {
    const precio = parseInt(elemento.value);
    if (isNaN(precio) ||  precio > 50000000) {
      alert("Por favor, ingrese un precio válido entre 1,000,000 y 50,000,000.");
      elemento.value = ''; // Limpiar el valor si es inválido
    }
  }