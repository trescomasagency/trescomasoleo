async function controllerTraerProductos() {
    
    const request = await fetch('https://api.escuelajs.co/api/v1/products', {
        method: "GET"
    });

    const response = await request.json();
    return response;

}

async function controllerCrearGatito(form) {

    const formData = new FormData(form);
    const request = await fetch(`${controllerproduct.rest_url}oleo/crear-gato`, {
        method: 'POST',
        body: formData
    });

    const response = await request.json();
    return response;

}