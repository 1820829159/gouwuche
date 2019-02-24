function load1(){
    let div2=document.getElementById("div2");
    let div3=document.getElementById("div3");
    div2.setAttribute("hidden","hidden");
    div3.setAttribute("hidden","hidden");
    let shang1=document.getElementById("shang1");
    shang1.style.color="white";
    shang1.style.background="#75B0DF"
}
function do1(){
    let div1=document.getElementById("div1");
    let div2=document.getElementById("div2");
    div2.removeAttribute("hidden");
    div1.setAttribute("hidden","hidden");
    let shang1=document.getElementById("shang1");
    let shang2=document.getElementById("shang2");
    shang2.style.color="white";
    shang2.style.background="#75B0DF";
    shang1.style.color="black";
    shang1.style.background="#F2F3F7";
}
function do2() {
    if(check()) {
        let div2 = document.getElementById("div2");
        let div3 = document.getElementById("div3");
        div2.setAttribute("hidden", "hidden");
        div3.removeAttribute("hidden");
        let shang2 = document.getElementById("shang2");
        let shang3 = document.getElementById("shang3");
        shang3.style.color = "white";
        shang3.style.background = "#75B0DF";
        shang2.style.color = "black";
        shang2.style.background = "#F2F3F7";
    }
}
function do3(){
window.location.href="zhuye.php"
}
function check() {
    let check = false;
    let tel = document.getElementById("tel").value;
    if (tel.length!=11) {
        document.getElementById("checktext3").innerHTML = " × 请输入11位电话号码";
        check = false;
    } else {
        document.getElementById("checktext3").innerHTML = " √";
        check = true;
    }
    let shen= document.getElementById("shenfenzheng").value;
    if (shen.length !=18) {
        document.getElementById("checktext2").innerHTML = " × 请输入18位身份证号码";
        check = false;
    } else {
        document.getElementById("checktext2").innerHTML = " √";
        check = true;
    }
    return check;
}