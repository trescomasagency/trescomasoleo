async function traerProductos() {

    function ItemProducto(item) {
        const itemProducto = document.createElement('div');
        itemProducto.innerHTML = `
            <img src="${item.images[0]}" />
            <p>${item.title}</p>
        `;
        return itemProducto;
    }
    
    const sectionFront = document.querySelector("#page-productos");

    const response = await controllerTraerProductos();
    
    response.forEach(item => {
        sectionFront.append(ItemProducto(item));
    });

}

async function crearGato() {

    const form = document.querySelector('#form-gato');
    form.addEventListener('submit', async function(evt) {
        evt.preventDefault();

        const response = await controllerCrearGatito(form);
        console.log(response);

    });

}