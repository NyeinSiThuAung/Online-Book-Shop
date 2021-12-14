// Nav Waypoint

const navWaypoint = new Waypoint({
element: document.getElementById('navScrollWp'),
handler: function(direction) {
    if(direction === "down"){
        document.getElementsByClassName('nav-waypoint')[0].classList.add("fixed-top");
        document.getElementsByClassName('nav-waypoint')[0].classList.add("bg-color");
    }else{
        document.getElementsByClassName('nav-waypoint')[0].classList.remove("fixed-top");
        document.getElementsByClassName('nav-waypoint')[0].classList.remove("bg-color");
    }
},
offset: '32%'
})

// Add Cart Number

// const addCartButton = document.querySelectorAll('.addCartButton');
const asideTag = document.getElementsByTagName('aside');
// cart counter no
let counter = 0;
// for(let i = 0; i < addCartButton.length; i++){
//     addCartButton[i].addEventListener('click',function(){
//         counter ++;
//         document.getElementsByClassName('cartCountNo')[0].innerHTML = counter;
//     });
// }
function addToCartFunction(event){
    counter ++;
    document.getElementsByClassName('cartCountNo')[0].innerHTML = counter;
    let addedCartItem = event.target.parentElement.childNodes;
    let title = addedCartItem[1].value;
    let price = addedCartItem[3].value;
    let image = addedCartItem[5].value;
    
    let showCart = document.getElementById('showCart');
    let createdRowDiv = addToCartReuseFunction("createRowDiv","div","row", showCart);
    
    let createdImgDiv = addToCartReuseFunction("createImgDiv", "div", "col-3", createdRowDiv);

    let createdImgTag = addToCartReuseFunction("createImgTag", "img", "addedCartImg", createdImgDiv);
    createdImgTag.src = "images/" + image;
    createdImgTag.width = "100";
    
    let createdTitleDiv = addToCartReuseFunction("createTitleDiv", "div", "col-8", createdRowDiv);
    let createdTitleTag = addToCartReuseFunction("createTitleDiv", "h5", "ps-2", createdTitleDiv);
    createdTitleTag.innerHTML = title;
    let createdPriceTag = addToCartReuseFunction("createPriceTag", "p", "ps-2", createdTitleDiv);
    createdPriceTag.classList.add('pt-2');
    createdPriceTag.innerHTML = price;
    
    let createdTrashIconDiv = addToCartReuseFunction("createTrashIconDiv", "div", "col-1", createdRowDiv);
    let creatTrashIconTag = addToCartReuseFunction("creatTrashIconTag", "i", "far", createdTrashIconDiv);
    creatTrashIconTag.classList.add('fa-trash-alt');
    
    let creatHrTag = document.createElement('hr');
    document.getElementById('showCart').append(creatHrTag);
    
}

function addToCartReuseFunction (createParam,tagNameParam,classNameParam,appendParam){
    createParam = document.createElement(tagNameParam);
    createParam.classList.add(classNameParam);
    appendParam.append(createParam);
    return createParam;
}

// show cart list
document.getElementsByClassName('cartIcon')[0].addEventListener('click',function(){
    ShowReuseCartFunction("block", "-1", "none");

});
// quit from aside bar
document.getElementsByClassName('faTimesIcon')[0].addEventListener('click',quitShowingCartItem);
document.getElementsByClassName('asideLeft')[0].addEventListener('click',quitShowingCartItem);
function quitShowingCartItem() {
    ShowReuseCartFunction("none", "1", "block");
}
// reuse fun cart
function ShowReuseCartFunction(display, zIndex, navDisplay){
    asideTag[0].style.display = display;
    asideTag[1].style.display = display;
    document.getElementsByClassName('carousel-control-prev')[0].style.zIndex = zIndex;
    document.getElementsByClassName('carousel-control-next')[0].style.zIndex = zIndex;
    document.getElementsByTagName('nav')[0].style.display = navDisplay;
}


  