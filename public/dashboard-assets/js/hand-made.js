/* custome Js */


/* Spinner animation */

let load_btn = document.querySelector("#btn-loading");
let load_text = load_btn.firstElementChild;
let spin_loading = load_btn.lastElementChild;
load_btn.addEventListener('click',(e)=>{
    load_text.setAttribute('class','d-none');
    spin_loading.classList.replace('d-none','d-block');
    setTimeout(()=>{
        spin_loading.classList.replace('d-block','d-none');
        load_text.classList.replace('d-none','d-block');
    },6000)
})


/* Color Picker */
// let color_input = document.querySelector("#color_pick");
// let color_code = document.querySelector("#color_code");
// let color_name = document.querySelector("#color_name");
// console.log(color_code)
// console.log(color_name)
// color_input.addEventListener("input",(e)=>{
//     let color = e.target.value;
//     // console.log(color);
//     color_name.setAttribute('value',color_data[color]);
// })

/* custome Js end*/
