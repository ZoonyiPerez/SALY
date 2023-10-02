const cartBtn = document.getElementById('cart-container');
const cartImg = document.getElementById('cart-img');
const cartItems = document.querySelector('.cart-items');

const loadItemsCart = () => {
    let html = '';
    let items = [];
    cart.forEach(c => items.push(products.filter(p => p.code == c)[0]));
    items.forEach(i => html += `
        <div class="cart-item">
            <img src="https://www.yanbal.com/${i.images[0].url}" alt="">
            <span>${i.name}</span>
            <span>${i.price.formattedValue}</span>
            <span class="hidden">${i.code}</span>
            <button onClick="deleteItem('${i.code}')">eliminar</button>
        </div>
    `);
    cartItems.innerHTML = html;
};

const deleteItem = code => {
    cart = cart.filter(c => c != code);
    loadItemsCart();
}

cartImg.addEventListener('click', e => {
    if (cartBtn.classList.contains('hidden')) {
        cartBtn.classList.remove('hidden');
        loadItemsCart();
    }
    else cartBtn.classList.add('hidden');
});


