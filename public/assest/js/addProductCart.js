const cartBtn = document.getElementById('cart-container');
const cartImg = document.getElementById('cart-img');
const cartItems = document.querySelector('.cart-items');

const loadItemsCart = () => {
    let html = '';
    cart.forEach(i => html += `
        <div class="cart-item">
            <img src="https://www.yanbal.com/${i.imagen}" alt="">
            <span>${i.nombre}</span>
            <span>${i.precio}</span>
            <span class="hidden">${i.code}</span>
            <input onChange="addAmountProduct('${i.code}')" id="amount-product-${i.code}" type="number" value="${i.amountCart}"/>
            <button onClick="deleteItem('${i.code}')">eliminar</button>
        </div>
    `);
    cartItems.innerHTML = html;
};

const deleteItem = code => {
    cart = cart.filter(c => c.code != code);
    loadItemsCart();
}

const addAmountProduct = code => {
    const value = document.getElementById(`amount-product-${code}`).value;
    if(value != 0) {
        cart.filter(c => c.code == code)[0].amountCart = value;
    } else {
        alert('Debe ser un número mayor que 0');
    }

};

cartImg.addEventListener('click', e => {
    if (cartBtn.classList.contains('hidden')) {
        cartBtn.classList.remove('hidden');
        loadItemsCart();
    }
    else cartBtn.classList.add('hidden');
});


