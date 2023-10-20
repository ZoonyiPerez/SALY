const urlParams = new URLSearchParams(window.location.search);
const q = urlParams.get('q');
let products = [];
let cart = [];
let plus = document.querySelector('.add-icon');

if (decodedToken.rol != 'usuario') {
    document.querySelector('.cart-icon img').classList.add('hidden');
    plus.classList.remove('hidden');
    plus.addEventListener('click', () => {
        document.querySelector('body').classList.add('block-scroll');
        document.querySelector('.container-add-product').classList.remove('hidden');
    });
}

document.querySelector('.logout').addEventListener('click', e => {
    window.location.href = "./index.php";
});

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
    if (value > -1) {
        let response = await fetch('../api/product.php?q=' + code);
        let data = await response.json();
        if (data[0].stock > 0 || decodedToken.rol != 'usuario') {
            response = await fetch('../api/products.php', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({  // El objeto que deseas enviar en la solicitud PATCH
                    code,
                    value
                })
            });
            data = await response.json();
            console.log(data);
        } else {
            alert('sin existencias necesarias para su pedido');
        }
    } else {
        alert('error deben ser numero positivos');
    }


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

const addToCart = async e => {
    let code = e.target.previousSibling.previousSibling.innerText;
    let response = await fetch('../api/product.php?q=' + code);
    let data = await response.json();
    console.log(decodedToken.rol);
    if (data[0].stock > 0 || decodedToken.rol != 'usuario') {
        response = await fetch('../api/products.php', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({  // El objeto que deseas enviar en la solicitud PATCH
                code,
                value: data[0].stock - 1
            })
        });
        let product = products.filter(p => p.code == code)[0];
        if (!existInCart(product.code)) {
            cart.push({ ...product, amountCart: 1 });
        } else {
            alert('El producto ya se encuentra en el carrito');
        }
        loadItemsCart();
    } else {
        alert('sin existencias necesarias para su pedido');
    }
}

const existInCart = (id) => {
    return cart.filter(p => p.code == id).length > 0;
}

if (q) {
    loadProducts(q);
} else {
    loadProducts('ofertas');
}

const chargeCategories = async () => {
    let response = await fetch('../api/categories.php');
    let data = await response.json();
    let text = '';
    data.forEach(e => text += `<option value='${e.id}'>${e.nombre}</option>`);
    console.log(text);
    return text;
};

chargeCategories().then(res => document.getElementById('category').innerHTML = res);

document.getElementById('crear').addEventListener('click', e => {
    e.preventDefault();
    addProduct();
});

document.getElementById('salir').addEventListener('click', e => {
    document.querySelector('body').classList.remove('block-scroll');
    document.querySelector('.container-add-product').classList.add('hidden');
});



const addProduct = async () => {
    let code = document.getElementById('code').value;
    let name = document.getElementById('name').value;
    let description = document.getElementById('description').value;
    let price = document.getElementById('price').value;
    let stock = document.getElementById('stock').value;
    let category = document.getElementById('category').value;
    let response = await fetch('../api/product.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({  // El objeto que deseas enviar en la solicitud PATCH
            code,
            name,
            description,
            price,
            stock,
            category
        })
    });
    let data = await response.json();
    console.log(data);
};


