<?php
  var_dump($_POST);
if (isset($_GET["getdata"])) {
    //////////////////////////////////////////////
    // PHP page intended for Javascript to read //
    //////////////////////////////////////////////
    $data = Array(
      "testing"=> Array(1=>"2", 3=>"4"),
      "example"=> Array("is this thing on?","Hello world!"),
      "random"=>rand(),
      "time"=>time()
    );
    if (isset($_POST["data"])) {
      //if the param data was sent as POST, include it in the data
      $data["post"] = $_POST["data"];
    }
    //echo json_encode($data,JSON_PRETTY_PRINT); //makes it easier for humans to read, but makes the data transfer larger (use when testing)
    echo json_encode($data);  //use in production
    //$siteoptions["dolayout"] = false; //use this on the actual website to remove the styling
}
else {
  //////////////////////////////
  // Page intended for humans //
  //////////////////////////////petya
    echo 'Post["data"] was not set.';
  
?>
<style>
  .output {
    white-space: pre-wrap; /*shows newlines*/
  }
  .output:before, .time:before {
    display: block;
    margin: 1em 0;
    font-weight: bold;
  }
  .output:not(:empty):before {
    content: "Raw output:";
  }
  .time:not(:empty):before {
    content: "Current server time:";
  }
</style>
<h3>
  Example page
</h3>
<script>
  //library
  //we should probably move this to the common module at one point >_>
  var http = {
      getpost: function(type,url,data,callback,errorCallback) {
          var xhr = new XMLHttpRequest();
          xhr.open(type, url, true);
          if (type == "POST") { xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); }

          if (errorCallback) { xhr.timeout = 8e3; } //go to timeout function after 8 seconds

          xhr.onload = function() {
              var status = xhr.status;
              if ((status >= 200) && (status < 300)) {
                  callback(xhr.response);
              }
              else if (errorCallback) {
                errorCallback(xhr);
              }
      };
      if (errorCallback) {
        xhr.onerror = function() {
          errorCallback(xhr);
        }
        xhr.ontimeout = xhr.onerror;
      }
      if (type == "POST") {
        var poststr;
        var post = [];
        for (var i in data) {
          post.push(i+"="+encodeURIComponent(data[i]));
        }
        if (post.length) { poststr = post.join("&"); }
        xhr.send(poststr);
      }
      else {
        xhr.send();
      }
    },
    get: function(url,callback,errorCallback){
      this.getpost("GET",url,null,callback,errorCallback);
    },
    post: function(url,data,callback,errorCallback){
      this.getpost("POST",url,data,callback,errorCallback);
     }
  };
</script>
<script>
  let btn = document.createElement("button");
  document.body.appendChild(btn);
  btn.appendChild(document.createTextNode("Request data"));
  
  let c = document.createElement("div");
  c.classList.add("output");
  document.body.appendChild(c);
  let output = document.createTextNode("");
  c.appendChild(output);
  
  c = document.createElement("div");
  c.classList.add("time");
  document.body.appendChild(c);
  let time = document.createTextNode("");
  c.appendChild(time);
  
  btn.addEventListener("click",function(){
    
      if (false) { //change to false to test post version
        http.get("?getdata",function(data){
          //output the raw data
          output.nodeValue = data;
          //convert JSON string to an object
          let obj = JSON.parse(data);
          //check it worked
          if (!obj) throw "Failed to convert json string to object!";
          //output the server time
          if (!obj.time) throw "The server didn't tell us what time it was!";
          time.nodeValue = (new Date(obj.time*1e3)).toLocaleString();
          
        },function(e){
          output.nodeValue = "Something went wrong :(";
          console.error("Error while fetching data",e);
        });
      }
      else {
      //with http.post, we can send post data
        http.post("?getdata",{data:"post-data"},function(data){
          //output the raw data
          output.nodeValue = data;
          //convert JSON string to an object
          let obj = JSON.parse(data);
          //check it worked
          if (!obj) throw "Failed to convert json string to object!"
          //output the server time
          if (!obj.time) throw "The server didn't tell us what time it was!";
          time.nodeValue = (new Date(obj.time*1e3)).toLocaleString();
          
        },function(e){
          output.nodeValue = "Something went wrong :(";
          console.error("Error while fetching data",e);
        });
    }
   });
 </script>
<?php
  }