/* Login Validation */
function checklogin(){
    var user = document.validate.username.value;
    var pass = document.validate.password.value;
    if (user == "") {
       alert("Tên Đăng Nhập không được để trống !");
       return false;
    } else if (pass == "") {
       alert("Mật Khẩu không được để trống !");
       return false;
    }
}
function checksignin(){
    if (document.layers || document.getElementById || document.all)
    return checklogin();
  else
    return true;
}

/* Signup Validation */
var testresults

function checkemail() {
  var str = document.validation.emailcheck.value
  var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i ;
  var username = document.validation.username.value;
  var pass = document.validation.password.value;
  var checkpass = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/i;
  var repass = document.validation.repassword.value;
  var checkusername = /^[A-Za-z][A-Za-z0-9_]{7,29}$/i;

  if (filter.test(str)){
    testresults = true;
    if (username == "") {
       alert("Tên Đăng Nhập không được để trống !");
       testresults = false;
    } else if (pass == "") {
       alert("Mật Khẩu không được để trống !");
       testresults = false;
    }else if(pass != repass){
       alert("Mật Khẩu Không Khớp !");
       testresults = false;
    } else{
      if(checkusername.test(username)){
        testresults = true;
        if(checkpass.test(pass)){
          testresults = true;
        }else {
          alert("Mật Khẩu phải có tối thiểu tám ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường,một số và một kí tự đặc biệt !");
          testresults = false;
        }
      }else{
        alert("Tên Đăng Nhập phải bắt đầu với 1 ký tự alphabet và độ dài tối thiểu là 8 ký tự!");
        testresults = false;
      }
      return (testresults);
    }
  }else {
    alert("Vui lòng nhập đúng email!");
    testresults = false;
  }
  return (testresults);
}

function checkbae() {
  if (document.layers || document.getElementById || document.all)
    return checkemail();
  else
    return true;
  
}

/* Modal Show */
function showModalSignIn() {
    return [document.getElementById('Signin').style.display = "flex", document.getElementById('Signup').style.display = "none"];
}
function showModalSignUp() {
    return [document.getElementById('Signup').style.display = "flex", document.getElementById('Signin').style.display = "none"];
}

function callback(){
  return[document.getElementById('Signup').style.display = "none", document.getElementById('Signin').style.display = "none"];
}

/* Delete Alert */
function xoaDonHang(){
    var conf= confirm ("Bạn có chắc chắn muốn xóa Đơn Hàng này không ?");
    return conf;
}

function xoaDiaChi(){
    var conf= confirm ("Bạn có chắc chắn muốn xóa thông tin thanh toán này không ?");
    return conf;
}

/* Validation in userinfo page */

var testinforesults;

function checkemailinfo() {
  var string = document.validationinfo.emailcheckinfo.value;
  var filterinfo = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i ;
  var newpass = document.validationinfo.newpassword.value;
  var checkpass = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,16}$/i;
  var renewpass = document.validationinfo.renewpassword.value;
  var passinfo = document.validationinfo.password.value;
  if (filterinfo.test(string)){
    testinforesults = true;
    if(passinfo != ""){
      testinforesults=false;
      if(newpass != ""){
        testinforesults = false;
        if(checkpass.test(newpass)){
          testinforesults = true;
          if(renewpass != newpass){
            alert("Mật Khẩu Không Khớp !");
            testinforesults = false;
          }else {
            testinforesults = true;
          }
        }else {
          alert("Mật Khẩu phải có tối thiểu tám ký tự, ít nhất một chữ cái viết hoa, một chữ cái viết thường,một số và một kí tự đặc biệt !");
          testinforesults = false;
        }
        return (testinforesults);
      }else{
        alert("Vui lòng nhập mật khẩu mới!");
        testinforesults=false;
      }
      return (testinforesults);
    }
    
  }else {
    alert("Vui lòng nhập đúng email!");
    testinforesults = false;
  }
  return (testinforesults);
}

function checkbaeinfo() {
  if (document.layers || document.getElementById || document.all)
    return checkemailinfo();
  else
    return true;
  
}

/* Check tinh nang */

function checkexits(){
  alert("Tính năng này hiện chưa có. Vui lòng thử lại sau!");
}


