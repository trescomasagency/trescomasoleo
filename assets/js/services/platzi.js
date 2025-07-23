async function getProducts() {

    const response = await platziAPI.get('products');
    return response;

}