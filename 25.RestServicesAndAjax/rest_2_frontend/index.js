document.getElementById("all-users").onclick = ()=>{
   fetch("http://localhost/softuni_php/restServicesAndAjax/lab/users")
   .then(res => res.json())
   .then(resUsers => {
      // console.log(resUsers)
      let table = `
         <table border=1>
            <thead>
               <tr>
                  <th>Number</th>
                  <th>Id</th>
                  <th>Username</th>
               </tr>
            </thead>
            <tbody>
      `;
      let counter = 1;
      for(let user of resUsers){
         table += `
            <tr>
               <td>${counter}</td>
               <td>${user.id}</td>
               <td><a href="#" class="user-info" data-id=${user.id}>${user.username}</a></td>
            </tr>
            `
         counter++;
      }
      table += `</tbody></table>`;
      document.getElementById("users").innerHTML = table;
      document.getElementById("all-users").setAttribute('style', 'display:none');
      document.getElementById("hide-all-users").setAttribute('style', 'display:block');

      let userInfos = document.querySelectorAll('.user-info');
      for(let userInfo of userInfos){
         userInfo.onclick = (e)=>{
            let id = e.target.getAttribute('data-id');
            fetch(`http://localhost/softuni_php/restServicesAndAjax/lab/users/${id}`)
            .then(res => res.json())
            .then(resUser => {
               console.log(resUser)
               document.getElementById("users").innerHTML = `
               <ul>
                  <li>Id: ${resUser[0].id}</li>
                  <li>Username: ${resUser[0].username}</li>
                  <li>Password: ${resUser[0].PASSWORD}</li>
                  <li>Profile Picture: ${resUser[0].profile_picture_url}</li>
               </ul>
              `
              document.getElementById("all-users").setAttribute('style', 'display:block');
            //   document.getElementById("hide-all-users").setAttribute('style', 'display:none');
            })
         }
      }
   });
}
          

document.getElementById('hide-all-users').onclick = ()=>{
   document.getElementById("users").innerHTML = '';
   document.getElementById("all-users").setAttribute('style', 'display:block');
   document.getElementById("hide-all-users").setAttribute('style', 'display:none')
}

document.getElementById('add-user').onclick = ()=>{
   document.getElementById("users").innerHTML = `
      <div id="error"></div>
      Username: <input type="text" id="username" />
      Password: <input type="password" id="password" />
      Confirm: <input type="password" id="confirm" />
      <button type="button" id="register">Register</button>
   `;

   document.getElementById('register').onclick=()=>{
      let username = document.getElementById("username").value;
      let password = document.getElementById("password").value;
      let confirm = document.getElementById("confirm").value;
      
      if(password != confirm){
         document.getElementById('error').innerHTML = "<h3 style='color:tomato'>Password Mismatch</h3>";
      }else{
         //!!!!!!!!!!!!!!!!!!!! second param in fetch with body and JSON.STRINGIFY
         fetch("http://localhost/softuni_php/restServicesAndAjax/lab/users", {
            'method': 'POST', 
            'body': JSON.stringify({"username":username, "password":password})
         });
         document.getElementById("users").innerHTML = `New user was registered.`;
         document.getElementById("all-users").setAttribute('style', 'display:block');
      }
   }
}


// instead of  xhr = new XMLHttpRequest(); xhr.open("GET", "") but fetch is asynch  
// MAGIC!!!



