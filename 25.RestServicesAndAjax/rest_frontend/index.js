let username = document.getElementById("username");
let response = document.getElementById("response");
const submit = document.getElementById("submit");

username.onkeyup = function (e){
   console.log(e.target.value);
   if(username.value.length < 5){
      response.innerHTML = "<h1 style=color:tomato>Ur username is too short. Use min 5 symbols.</h1>"
      submit.setAttribute("disabled", true)
   }else{
      response.innerHTML = "<h1 style=color:lime>Username is OK</h1>"
      submit.removeAttribute("disabled")
   }
}
username.onchange = function(e){console.log(e.target)};

// setTimeout(()=>{
//    document.body.innerHTML += "<h1>chushki</h1>";
// },2000);
