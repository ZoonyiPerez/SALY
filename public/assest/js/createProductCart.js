const urlParams = new URLSearchParams(window.location.search);
const q = urlParams.get('q');
let products = [];
let cart = [];
const createCard = (element) => {
    return `
    <div class="card">
        <img src="https://www.yanbal.com/${element.images[2].url}" alt="" srcset="">
        <span>${element.name}</span>
        <span>$ ${element.price.value}</span>
        <span class="hidden">${element.code}</span>
        <button class="cart-add-btn">AGREGAR A LA BOLSA</button>
    </div>`;
};

const loadProducts = async (type, page = 0) => {
    const loader = document.getElementById('loader');
    loader.classList.remove('hidden');
    loader.classList.add('flex-center');
    const container = document.getElementById('card-container');
    const response = await fetch(`https://www.yanbal.com/co/corporate/c/${type}/results/?q=&page=${page}`);
    const data = await response.json();
    products = data.results;
    console.log(data);
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
    if(!existInCart(product.code)) {
        cart.push({ ...product, amountCart: 1});
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


