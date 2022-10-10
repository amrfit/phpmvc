const userBtn = document.querySelector('.header_user');
const userLogoutBtn = document.querySelector('.header_userlogout');
const userCancelBtn = document.querySelector('.cancelbtn');
const shopBtn = document.querySelector('.header_shopping');
const likeBtn = document.querySelector('.header_like');
const searchBtn = document.querySelector('.header_search');
const userPopup = document.querySelector('.user_popup');
const userLogoutPopup = document.querySelector('.user_logout_popup');
const cartPopup = document.querySelector('.cart_popup');
const likePopup = document.querySelector('.like_popup');
const searchPopup = document.querySelector('.search_popup');
const outside = document.querySelector('.outside');

if (userBtn != null) {
    userBtn.addEventListener("click" , ()=>{
        userPopup.classList.toggle('active');
        outside.classList.add('active');
    });
}

if (userLogoutBtn != null) {
    userLogoutBtn.addEventListener("click" , ()=>{
        userLogoutPopup.classList.toggle('active');
        outside.classList.add('active');
    });
}


if (shopBtn != null) {
    shopBtn.addEventListener("click" , ()=>{
        cartPopup.classList.toggle('active');
        outside.classList.add('active');
    });
}


if (likeBtn != null) {
    likeBtn.addEventListener("click" , ()=>{
        likePopup.classList.toggle('active');
        outside.classList.add('active');
    });
}

searchBtn.addEventListener("click" , ()=>{
    searchPopup.classList.toggle('active');
    outside.classList.add('active');
});

userCancelBtn.addEventListener("click" , ()=>{
    userLogoutPopup.classList.remove('active');
    outside.classList.remove('active');
});

outside.addEventListener("click" , ()=>{
    // All popup in here removed
    userPopup.classList.remove('active');
    cartPopup.classList.remove('active');
    likePopup.classList.remove('active');
    searchPopup.classList.remove('active');
    userLogoutPopup.classList.remove('active');
    outside.classList.remove('active');
});

const signinBtn = document.querySelector('#signin_btn');
const signupBtn = document.querySelector('#signup_btn');
const signinArea = document.querySelector('#signin_area');
const signupArea = document.querySelector('#signup_area');

signinBtn.addEventListener("click" , function(){
    signinArea.classList.toggle('active');
    signupArea.classList.toggle('active');
});

signupBtn.addEventListener("click" , function(){
    signinArea.classList.toggle('active');
    signupArea.classList.toggle('active');
});
