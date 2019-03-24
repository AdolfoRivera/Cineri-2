/*function RellenarSelect(){
    var obj = document.getElementById("origen");
    var clon = obj.cloneNode("origen");
    document.getElementById("destino").appendChild(clon);
}*/

function Mostrar(){
    var id = document.getElementById("seleccion").value;
    window.location.href ="http://localhost/cineri/panel.php?id="+id;
}


