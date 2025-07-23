function customAppStart() {

    capturarProductosPlatzi();

}

async function capturarProductosPlatzi() {

    function ItemProductoPlatzi(item) {

        const itemProductoPlatzi = document.createElement('div');
        itemProductoPlatzi.classList.add('front__content');
        itemProductoPlatzi.innerHTML = `
        
            <article class="front__content-card">

                <p class="front__content-card-title">${item.title}</p>
                <p class="front__content-card-text">${item.price}</p>

            </article>
        
        `;

        return itemProductoPlatzi;

    }

    const frontProductos          = document.querySelector('#front-productos');
    const {status, data, headers} = await customControllerCapturarProductosPlatzi();
    
    if(status != 200) {
        console.log('algo salió mal');
        return;
    }

    data.forEach(item => {
        frontProductos.append(ItemProductoPlatzi(item));
    });

}