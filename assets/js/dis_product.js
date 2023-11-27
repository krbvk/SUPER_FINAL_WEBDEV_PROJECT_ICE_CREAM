let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', () => {
    body.classList.add('active');
});
closeShopping.addEventListener('click', () => {
    body.classList.remove('active');
});

let products = [
    {
        id: 1,
        name: 'Vanilla Ice-Cream',
        image: 'Vanilla.png',
        price: 50
    },
    {
        id: 2,
        name: 'Ube Ice-Cream',
        image: 'Ube.png',
        price: 50
    },
    {
        id: 3,
        name: 'Straberry Ice-Cream',
        image: 'strawberry.png',
        price: 50
    },
    {
        id: 4,
        name: 'Rocky road Ice-Cream',
        image: 'rockyroad.png',
        price: 50
    },
    {
        id: 5,
        name: 'Mango Ice-Cream',
        image: 'mango.png',
        price: 50
    },
    {
        id: 6,
        name: 'Dark Chocolate Ice-Cream',
        image: 'darkchoco.png',
        price: 50
    },
    {
        id: 7,
        name: 'Cookies and Cream Ice-Cream',
        image: 'cookiescream.png',
        price: 50
    },
    {
        id: 8,
        name: 'Banana Split Ice-Cream',
        image: 'bananasplit.png',
        price: 50
    },
    {
        id: 9,
        name: 'Chocolate Ice-Cream',
        image: 'chocolate.png',
        price: 50
    }
];
let listCards = [];

function initApp() {
    products.forEach((product, index) => {
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="../assets/images/${product.image}" style="width: 300px; height: 300px;">
            <div class="title">${product.name}</div>
            <div class="price">&#8369;${product.price.toLocaleString()}
            <button onclick="addToCart(${index})">Add To Cart</button>`;
        list.appendChild(newDiv);
    });
}

initApp();

function addToCart(index) {
    if (listCards[index] == null) {
        listCards[index] = JSON.parse(JSON.stringify(products[index]));
        listCards[index].quantity = 1;
    }
    reloadCard();
}

function reloadCard() {
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;

    listCards.forEach((value, key) => {
        totalPrice += value.price * value.quantity;
        count += value.quantity;

        if (value != null) {
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div>
                <img src="../assets/images/${value.image}" />
                </div>
                <div>${value.name}</div>
                <div>₱${(value.price * value.quantity).toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
            listCard.appendChild(newDiv);
        }
    });

    listCard.style.maxHeight = '500px';
    listCard.style.overflowY = 'auto';

    total.innerText = `Total: ₱${totalPrice.toLocaleString()}`;
    quantity.innerText = count;
}

function changeQuantity(key, quantity) {
    if (quantity == 0) {
        delete listCards[key];
    } else {
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}
