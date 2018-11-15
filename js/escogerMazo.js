//Guarda el gen
var numero=5;
//Funcion capturar gen.
function capturar(){
  for(i=0;i<4;i++){
      var valor=document.getElementsByClassName('formulario')[i].checked;
      if(valor==true)
      {
        numero=i;
      }

  }

  if(numero==0)
  {
    location.href ="http://www.pagina1.com";
  }else if(numero==1)
  {
    location.href ="../registroLogin.php";
  }
  else if(numero==2)
  {
    location.href ="../registroLogin.php";
  }else if(numero==3)
  {
    location.href ="../registroLogin.php";
  }else if(numero==4)
  {
    location.href ="../registroLogin.php";
  }else if(numero==5)
  {
    alert("No escogiste ningun Gen");
  }

}


var num = ["1.png", "2.png"];
num2=document.getElementById("id");
var r=num2.src;
for (var i = 0; i < 2; i++)
{
aux=i;
}
if (aux==0)
{
num2.src="../../img/cdk/defensores/5.png";
}
else if (aux==1)
{
num2.src="../../img/cdk/defensores/6.png";
}
