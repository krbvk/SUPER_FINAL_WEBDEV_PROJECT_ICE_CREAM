const openShopping = document.querySelector('.shopping');
const closeShopping = document.querySelector('.closeShopping');
const list = document.querySelector('.list');
const listCard = document.querySelector('.listCard');
const body = document.querySelector('body');
const total = document.querySelector('.total');
const quantity = document.querySelector('.quantity');
let listCards = [];
let count = 0;
let totalPrice = 0;

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
function createProductItem(product, index) {
    const newDiv = document.createElement('div');
    newDiv.classList.add('item');
    newDiv.innerHTML = `
        <img src="../assets/images/${product.image}" style="width: 300px; height: 300px;">
        <div class="title">${product.name}</div>
        <div class="price">&#8369;${product.price.toLocaleString()}
        <button onclick="addToCart(${index})">Add To Cart</button>`;
    list.appendChild(newDiv);
}

function initApp() {
    products.forEach((product, index) => {
        createProductItem(product, index);
    });
}

initApp();

function addToCart(index) {
    let userQuantity = parseInt(prompt('Enter quantity:'), 10) || 0;

    if (listCards[index] == null) {
        listCards[index] = JSON.parse(JSON.stringify(products[index]));
        listCards[index].quantity = userQuantity || count; // Use user input or default to count

        // Add the selected item to the session
        addToSession(listCards[index]);
    } else {
        // If the quantity is already present in listCards, update it based on user input
        listCards[index].quantity = userQuantity || count; // Use user input or default to count
        updateSession();
    }

    reloadCard();
}

function reloadCard() {
    listCard.innerHTML = '';
    totalPrice = 0;
    count = 0;

    listCards.forEach((value, key) => {
        totalPrice += value.price * value.quantity;
        count += value.quantity;

        if (value != null) {
            const newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div>
                    <img src="../assets/images/${value.image}" />
                </div>
                <div>${value.name}</div>
                <div>₱${(value.price * value.quantity).toLocaleString()}</div>
                <div>
                    <div id="count">${value.quantity}</div>
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
    if (quantity === 0) {
        delete listCards[key];
    } else {
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}

function addToSession(item) {
    const cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    cartItems.push(item);
    sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
}
