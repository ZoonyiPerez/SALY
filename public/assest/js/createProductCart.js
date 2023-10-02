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
    cart.push(e.target.previousSibling.previousSibling.innerText);
    loadItemsCart();
}

loadProducts('maquillaje');

