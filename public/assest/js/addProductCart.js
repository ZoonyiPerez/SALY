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

const addAmountProduct = async code => {
    const value = document.getElementById(`amount-product-${code}`).value;
    let response = await fetch('../api/product.php?q=' + code);
    let data = await response.json();
    if (value != 0 && data[0].stock > value) {
        cart.filter(c => c.code == code)[0].amountCart = value;
        response = await fetch('../api/products.php', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({  // El objeto que deseas enviar en la solicitud PATCH
                code,
                value: data[0].stock - value
            })
        });
        data = await response.json();
        console.log(data);
    } else if (data[0].stock < value) {
        alert('sin existencias necesarias para su pedido');
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


