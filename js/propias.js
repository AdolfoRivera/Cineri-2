/*function RellenarSelect(){
    var obj = document.getElementById("origen");
    var clon = obj.cloneNode("origen");
    document.getElementById("destino").appendChild(clon);
}*/

function Mostrar(){
    var id = document.getElementById("seleccion").value;
    window.location.href ="http://localhost/cineri/panel.php?id="+id;
}

function Eliminar(){
    var dl = document.getElementById("elimina").value;
    document.rego.id1.value = dl;
    //window.location.href ="http://localhost/cineri/panel.php?dl="+dl;
}

function obtenerID(){
    var dl = document.getElementById("selec").value;
    document.reg.id1.value = dl;
}

function contar1(){
    var cad1 = document.getElementById("hora").value;
    var hora = document.getElementById("c1");
    var con=0;
    console.log(cad1);
    for(var i=0;i<cad1.length;i++){
        if(cad1[i]==","){
            con+=1;
            hora.innerHTML="<label id='c1'>Hay "+ con +" comas</label>";
        }
    }
}

function contar2(){
    var cad2 = document.getElementById("sala").value;
    var sala = document.getElementById("c2");
    var con =0;
    for(var i=0;i<cad2.length;i++){
        if(cad2[i]==","){
            con+=1;
            sala.innerHTML="<label id='c1'>Hay "+ con +" comas</label>";
        }
    }
}