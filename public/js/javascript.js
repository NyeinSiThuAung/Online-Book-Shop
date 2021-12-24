// Add Cart in Aside Bar

const asideTag = document.getElementsByTagName('aside');
let lsCounter = 0; // ls = localStorage
let cartItemCounter = 0;
let showCart = document.getElementById('showCart');
let cartCountInner = document.getElementsByClassName('cartCountNo')[0];
addToCartFunction = (event) => {
    let addedCartItem = event.target.parentElement.childNodes;
    let title = addedCartItem[1].value;
    let price = addedCartItem[3].value;
    let image = addedCartItem[5].value;

    lsCounter++;
    cartItemCounter++;
    localStorage.setItem('title'+lsCounter, title);
    localStorage.setItem('price'+lsCounter, price);
    localStorage.setItem('image'+lsCounter, image);
    localStorage.setItem('lsCounter',lsCounter);
    localStorage.setItem('cartItemCounter',cartItemCounter);
    
    addToCartLocalStorageReuseFunction(lsCounter);
}
lsCounter = localStorage.getItem('lsCounter');
cartItemCounter = localStorage.getItem('cartItemCounter');
window.addEventListener('load', () => {
    if(localStorage.getItem('cartItemCounter') == 0){
        localStorage.setItem('lsCounter',0);
        lsCounter = localStorage.getItem('lsCounter');
        localStorage.clear();
        return ;
    }
    let numberLsCounter = Number(lsCounter);
    for(let i = 1; i <= numberLsCounter; i++){
        if(!localStorage.getItem('title'+i)){
            continue;
        }
        addToCartLocalStorageReuseFunction(i);
    }
})
addToCartReuseFunction = (createParam,tagNameParam,classNameParam,appendParam) => {
    createParam = document.createElement(tagNameParam);
    createParam.classList.add(classNameParam);
    appendParam.append(createParam);
    return createParam;
}
function addToCartLocalStorageReuseFunction(param){
    cartCountInner.innerHTML = localStorage.getItem('cartItemCounter');
    let createdRowDiv = addToCartReuseFunction("createRowDiv","div","row", showCart);
    
    let createdImgDiv = addToCartReuseFunction("createImgDiv", "div", "col-3", createdRowDiv);

    let createdImgTag = addToCartReuseFunction("createImgTag", "img", "addedCartImg", createdImgDiv);
    createdImgTag.src = "images/" + localStorage.getItem('image'+param);
    createdImgTag.width = "100";
    
    let createdTitleDiv = addToCartReuseFunction("createTitleDiv", "div", "col-8", createdRowDiv);
    let createdTitleTag = addToCartReuseFunction("createTitleDiv", "h5", "ps-2", createdTitleDiv);
    createdTitleTag.innerHTML = localStorage.getItem('title'+param);
    let createdPriceTag = addToCartReuseFunction("createPriceTag", "p", "ps-2", createdTitleDiv);
    createdPriceTag.classList.add('pt-2');
    createdPriceTag.innerHTML = localStorage.getItem('price'+param);
    
    let createdTrashIconDiv = addToCartReuseFunction("createTrashIconDiv", "div", "col-1", createdRowDiv);
    let creatTrashIconTag = addToCartReuseFunction("creatTrashIconTag", "i", "far", createdTrashIconDiv);
    creatTrashIconTag.classList.add('fa-trash-alt');
    creatTrashIconTag.addEventListener('click',() => {
        localStorage.removeItem('title'+param);
        localStorage.removeItem('price'+param);
        localStorage.removeItem('image'+param);
        createdRowDiv.style.display = "none";
        creatHrTag.style.display = "none";
        cartItemCounter--;
        localStorage.setItem('cartItemCounter',cartItemCounter);
        cartItemCounter = localStorage.getItem('cartItemCounter');
        cartCountInner.innerHTML = localStorage.getItem('cartItemCounter');
    })
    
    let creatHrTag = document.createElement('hr');
    document.getElementById('showCart').append(creatHrTag);
}
// show cart list
ShowReuseCartFunction = (display, zIndex, navDisplay) => {
    asideTag[0].style.display = display;
    asideTag[1].style.display = display;
    document.getElementsByClassName('carousel-control-prev')[0].style.zIndex = zIndex;
    document.getElementsByClassName('carousel-control-next')[0].style.zIndex = zIndex;
    document.getElementsByClassName('carousel-control-prev')[1].style.zIndex = zIndex;
    document.getElementsByClassName('carousel-control-next')[1].style.zIndex = zIndex;
    document.getElementsByTagName('nav')[0].style.display = navDisplay;
}
document.getElementsByClassName('cartIcon')[0].addEventListener('click',() => 
    ShowReuseCartFunction("block", "-1", "none")
);
// quit from aside bar
quitShowingCartItem = () => ShowReuseCartFunction("none", "1", "block");
document.getElementsByClassName('faTimesIcon')[0].addEventListener('click',quitShowingCartItem);
document.getElementsByClassName('asideLeft')[0].addEventListener('click',quitShowingCartItem);

// End Cart

// showImg in crete and edit file
function CreateImg(data){
    let newPhoto = document.getElementById('newPhoto');
    if (data.files && data.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('oldPhoto').style.display = "none";
            newPhoto.style.display = "inline-block";
            newPhoto.src = e.target.result;
        };
        reader.readAsDataURL(data.files[0]);
    }
}
  