fetch("https://api.github.com/users/testnakov/repos")
.then(res=>res.json())
.then(res=>{
    let content = '';
 
    for(let obj of res){
        let url = obj.clone_url;
        console.log(url);
        content += `<a href=${url}>Repo ${obj['name']}</a><br/><br/>`;
    }
    console.log(res);
    document.getElementById("response").innerHTML = content;
});