function RellenarSelect(){
    var obj = document.getElementById("origen");
    var clon = obj.cloneNode("origen");
    document.getElementById("destino").appendChild(clon);
}

RellenarSelect();

