const createCard = (element) => {
    return `
    <div class="card">
        <img src="https://www.yanbal.com/${element.images[2].url}" alt="" srcset="">
        <span>${element.name}</span>
        <span>$ ${element.price.value}</span>
        <button>AGREGAR A LA BOLSA</button>
    </div>`;
};

const loadProducts = async (type, page = 0) => {
    const loader = document.getElementById('loader');
    loader.classList.remove('hidden');
    loader.classList.add('flex-center');
    const container = document.getElementById('card-container');
    const response = await fetch(`https://www.yanbal.com/co/corporate/c/${type}/results/?q=&page=${page}`);
    const data = await response.json();
    console.log(data);
    data.results.forEach(element => {
        container.innerHTML += createCard(element);
    }); 
    loader.classList.remove('flex-center');
    loader.classList.add('hidden');
};

loadProducts('maquillaje');