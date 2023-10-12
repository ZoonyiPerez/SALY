const urlParams = new URLSearchParams(window.location.search);
const q = urlParams.get('q');
let products = [];
let cart = [];
const createCard = (element) => {
    return `
    <div class="card">
        <img src="https://www.yanbal.com/medias/${element.imagen}" alt="" srcset="">
        <span>${element.nombre}</span>
        <span>$ ${element.precio}</span>
        <span class="hidden">${element.code}</span>
        ${decodedToken.rol != 'usuario' ? `<input onChange="changeAmount('${element.code}')" id="amount-product-${element.code}" type="number" value="${element.stock}"/>` : '<button class="cart-add-btn">AGREGAR A LA BOLSA</button>'}
    </div>`;
};

const changeAmount = async code => {
    const value = document.getElementById(`amount-product-${code}`).value;
    const response = await fetch('../api/products.php', {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({  // El objeto que deseas enviar en la solicitud PATCH
            code,
            value
        })
    });
    const data = await response.json();
    console.log(data);

};

const loadProducts = async (type, page = 0) => {
    switch (type) {
        case 'ofertas':
            type = 1;
            break;
        case 'tratamiento-facial':
            type = 2;
            break;
        case 'cuidado-personal':
            type = 3;
            break;
        case 'maquillaje':
            type = 4;
            break;
        case 'perfumes':
            type = 5;
            break;
        case 'joyeria':
            type = 6;
            break;
    }
    const loader = document.getElementById('loader');
    loader.classList.remove('hidden');
    loader.classList.add('flex-center');
    const container = document.getElementById('card-container');
    const response = await fetch(`../api/products.php?q=${type}`);
    const data = await response.json();
    products = data;
    products.forEach(element => {
        container.innerHTML += createCard(element);
    });
    loader.classList.remove('flex-center');
    loader.classList.add('hidden');
    const cards = document.querySelectorAll('.cart-add-btn');
    cards.forEach(c => c.addEventListener('click', addToCart));
};

const addToCart = e => {
    let product = products.filter(p => p.code == e.target.previousSibling.previousSibling.innerText)[0];
    if (!existInCart(product.code)) {
        cart.push({ ...product, amountCart: 1 });
    } else {
        alert('El producto ya se encuentra en el carrito');
    }
    loadItemsCart();
}

const existInCart = (id) => {
    return cart.filter(p => p.code == id).length > 0;
}

if (q) {
    loadProducts(q);
} else {
    loadProducts('ofertas');
}


