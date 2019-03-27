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


