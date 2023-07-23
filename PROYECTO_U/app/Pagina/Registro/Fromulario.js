
const in_pass = document.getElementById("pass");
const in_con = document.getElementById("pass2");

const padrediv = document.getElementById("crear");



var crearElemn = padrediv.querySelector("p");

if(!crearElemn)
{
    crearElemn = document.createElement("p");
    padrediv.appendChild(crearElemn)
}

in_con.addEventListener("blur", function(e){
    var value_pass = in_pass.value;
    var value_con = in_con.value;


  /*   var crearElemn = document.createElement("p"); */

    if(value_pass != value_con)
    {
        in_con.focus();
        crearElemn.textContent = "Las contraseñas no coinciden"

    }
    else
    {
        crearElemn.textContent = "Las contraseñas coinciden"
    }

   /*  padrediv.appendChild(crearElemn); */

})

