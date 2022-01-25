function validate() {
  var username= document.getElementById("username").value;
  var password=document.getElementById("password").value;

  if(username=="admin" && password=="user")
  {
      window.open("https://robin920.github.io/pondlora/homepage.php");
      //var myWindow = window.open("./homepage.php", "_self");
      //myWindow.document.write("<p>I replaced the current window.</p>");
      alert("success");
     // window.location.href="homepage.php";
      //document.location.href="./homepage.php";
      //location.replace("./homepage.php");
      //open("http://localhost/Pond%20LpWAN/homepage.php");
      //return false;
  }
  else 
  {
      alert("Incorrect Credentials!! Try again");
  }
}
const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = (()=>{
loginForm.style.marginLeft = "-50%";
loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
loginForm.style.marginLeft = "0%";
loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
signupBtn.click();
return false;
});
