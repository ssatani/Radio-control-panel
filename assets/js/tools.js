//////////////////////////////////////////////////
function Cancelar() {

    $("#frms").html("Radio en Linea");

}

function principal() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contenido").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "vista/principal.php", true);
    xhttp.send();
};
principal();

function programacion() {

    var parametros = {
        "": ""
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/programacion.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#contenido").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#contenido").html(response);
        }
    });


};

function notificacion() {
    var parametros = {
        "": ""
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/notificacion.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#contenido").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#contenido").html(response);
        }
    });
};

function usuarios() {
    var parametros = {
        "": ""
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/usuario.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#contenido").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#contenido").html(response);
        }
    });
};

function ranking() {
    var parametros = {
        "": ""
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/ranking.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#contenido").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#contenido").html(response);
        }
    });
};

function musica() {
    var parametros = {
        "": ""
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/musica.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#contenido").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#contenido").html(response);
        }
    });
};

function genero() {
    var parametros = {
        "": ""
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/genero.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#contenido").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#contenido").html(response);
        }
    });
};

function artista() {
    var parametros = {
        "": ""
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/artista.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#contenido").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#contenido").html(response);
        }
    });
};

function AgregarNotificacion() {


    var parametros = {
        "accion": "insertar"
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/notificacion.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
            var inputFile = document.getElementById('imagen');
            inputFile.addEventListener('change', mostrarImagen, false);
        }
    });
}

function AgregarProgramacion() {

    var parametros = {
        "accion": "insertar"
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/programacion.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
            var inputFile = document.getElementById('imagen');
            inputFile.addEventListener('change', mostrarImagen, false);
        }
    });

}

function AgregarUsuario() {
    var parametros = {
        "accion": "insertar"
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/usuario.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
            var inputFile = document.getElementById('imagen');
            inputFile.addEventListener('change', mostrarImagen, false);
        }
    });

}

function AgregarRanking() {
    var parametros = {
        "accion": "insertar"
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/ranking.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
            var inputFile = document.getElementById('imagen');
            inputFile.addEventListener('change', mostrarImagen, false);
        }
    });

}

function AgregarGenero() {
    var parametros = {
        "accion": "insertar"
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/genero.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Cargando Genero, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
        }
    });

}

function AgregarArtista() {
    var parametros = {
        "accion": "insertar"
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/artista.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Cargando Genero, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
            var inputFile = document.getElementById('imagen');
            inputFile.addEventListener('change', mostrarImagen, false);


        }
    });



}

function AgregarMusica() {
    var parametros = {
        "accion": "insertar"
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/musica.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Cargando Genero, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
            var inputFile = document.getElementById('imagen');
            inputFile.addEventListener('change', mostrarImagen, false);


        }
    });



}


///////////////////envios////////////////
function EnviarNotificacion() {
    var formData = new FormData(document.getElementById("frmnotificacion"));
    formData.append("dato", "valor");
    $.ajax({
        url: "controlador/notificacion.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#frms").html("Procesando insersion de notificacion.");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html("Insertado Correctamente.");
            $("#contenido").html(response);
        }
    });
}

function EnviarProgramacion() {
    var formData = new FormData(document.getElementById("frmprogramacion"));
    formData.append("dato", "valor");
    $.ajax({
        url: "controlador/programacion.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#frms").html("Procesando insersion de notificacion.");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html("Insertado Correctamente.");
            $("#contenido").html(response);
        }
    });
}

function EnviarRankings() {


    var formData = new FormData(document.getElementById("frmranking"));
    formData.append("dato", "valor");
    $.ajax({
        url: "controlador/ranking.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#frms").html("Procesando insersion de notificacion.");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html("Insertado Correctamente.");
            $("#contenido").html(response);
        }
    });

}

function EnviarUsuario() {


    var contrasena = document.getElementById('contrasena').value;
    var confirmarcontrasena = document.getElementById('confirmarcontrasena').value;
    if (contrasena == confirmarcontrasena) {
        var formData = new FormData(document.getElementById("frmusuario"));
        formData.append("dato", "valor");
        $.ajax({
            url: "controlador/usuario.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#frms").html("Procesando insersion de notificacion.");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#frms").html("Insertado Correctamente.");
                $("#contenido").html(response);
            }
        });
    } else {
        alert("Las contraseñas no son iguales");
    };
}

function EnviarGenero() {
    var formData = new FormData(document.getElementById("frmgenero"));
    formData.append("dato", "valor");
    $.ajax({
        url: "controlador/genero.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#frms").html("Procesando insersion de notificacion.");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html("Agregado Correctamente.");
            $("#contenido").html(response);
        }
    });
}

function EnviarArtista() {
    var formData = new FormData(document.getElementById("frmartista"));
    formData.append("dato", "valor");
    $.ajax({
        url: "controlador/artista.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#frms").html("Procesando insersion de notificacion.");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html("Insertado Correctamente.");
            $("#contenido").html(response);
        }
    });

}

function EnviarMusica() {
    var formData = new FormData(document.getElementById("frmmusica"));
    formData.append("dato", "valor");
    $.ajax({
        url: "controlador/musica.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#frms").html("Procesando insersion de notificacion.");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html("Insertado Correctamente.");
            $("#contenido").html(response);
        }
    });

}

function ActualizarProgramacion(idprogramacion, idusuario, titulo, descripcion, h_ini, duracion) {

    var parametros = {
        "accion": "actualizar",
        "idprogramacion": String(idprogramacion),
        "idusuario": String(idusuario),
        "titulo": String(titulo),
        "descripcion": String(descripcion),
        "h_ini": String(h_ini),
        "duracion": String(h_ini)

    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/programacion.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
        }
    });
}

function ActualizarUsuario(idusuario, idtipo, usuario, contrasena, nombre, apellidos, ci, telefono, correo, token) {

    var parametros = {
        "accion": "actualizar",
        "idusuario": String(idusuario),
        "idtipo": String(idtipo),
        "usuario": String(usuario),
        "contrasena": String(contrasena),
        "nombre": String(nombre),
        "apellidos": String(apellidos),
        "ci": String(ci),
        "telefono": String(telefono),
        "correo": String(correo),
        "token": String(token)
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/usuario.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
        }
    });
}

function ActualizarGenero(idgenero, genero) {

    var parametros = {
        "accion": "actualizar",
        "idgenero": String(idgenero),
        "nombre": String(genero)
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'vista/genero.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#frms").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#frms").html(response);
        }
    });
}

function EliminarUsuario(idusuario, token) {
    var mensaje = confirm("¿Eliminar Usuario?");
    //Detectamos si el usuario acepto el mensaje
    if (mensaje) {
        //alert("¡Programa Eliminado!");

        var parametros = {
            "accion": "eliminar",
            "idusuario": String(idusuario),
            "token": String(token)
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'controlador/usuario.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                $("#frms").html("Procesando, espere por favor...");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#frms").html("Usuario Eliminado");
                $("#contenido").html(response);
            }
        });
    }
    //Detectamos si el usuario denegó el mensaje
    else {
        $("#frms").html("Eliminacion Cancelada");
    }

}

function EliminarProgramacion(idprogramacion, token) {
    var mensaje = confirm("¿Eliminar Programacion?");
    //Detectamos si el usuario acepto el mensaje
    if (mensaje) {
        //alert("¡Programa Eliminado!");

        var parametros = {
            "accion": "eliminar",
            "idprogramacion": String(idprogramacion),
            "token": String(token)
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'controlador/programacion.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                $("#frms").html("Procesando, espere por favor...");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#frms").html("Programacion Eliminada");
                $("#contenido").html(response);
            }
        });
    }
    //Detectamos si el usuario denegó el mensaje
    else {}

}

function EliminarGenero(idgenero, genero) {
    var mensaje = confirm("¿Eliminar Genero?");
    //Detectamos si el usuario acepto el mensaje
    if (mensaje) {
        //alert("¡Programa Eliminado!");

        var parametros = {
            "accion": "eliminar",
            "idgenero": String(idgenero),
            "nombre": String(genero)
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'controlador/genero.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                //$("#frms").html("Procesando, espere por favor...");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                //$("#frms").html("Genero Eliminado");
                $("#contenido").html(response);
            }
        });
    }
    //Detectamos si el usuario denegó el mensaje
    else {}

}
function EliminarArtista(idartista, artista) {
    var mensaje = confirm("¿Eliminar Artista?");
    //Detectamos si el usuario acepto el mensaje
    if (mensaje) {
        //alert("¡Programa Eliminado!");

        var parametros = {
            "accion": "eliminar",
            "idartista": String(idartista),
            "artista": String(artista)
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'controlador/artista.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                //$("#frms").html("Procesando, espere por favor...");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                //$("#frms").html("Genero Eliminado");
                $("#contenido").html(response);
            }
        });
    }
    //Detectamos si el usuario denegó el mensaje
    else {}

}
function EliminarMusica(idmusica) {
    var mensaje = confirm("¿Eliminar Tema Musical?");
    //Detectamos si el usuario acepto el mensaje
    if (mensaje) {
        //alert("¡Programa Eliminado!");

        var parametros = {
            "accion": "eliminar",
            "idmusica": String(idmusica)
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'controlador/musica.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                //$("#frms").html("Procesando, espere por favor...");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                //$("#frms").html("Genero Eliminado");
                $("#contenido").html(response);
            }
        });
    }
    //Detectamos si el usuario denegó el mensaje
    else {}

}

function VerTemas(idranking) {

    var parametros = {
        "idranking": String(idranking),
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/ranking_musica.php', //archivo que recibe la peticion
        type: 'get', //método de envio
        beforeSend: function () {
            $("#contenido").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

            $("#contenido").html(response);

        }
    });


}


function GuardarRanking() {

    var idranking=document.getElementById('idranking').value;
    var token=document.getElementById('token').value;
    
    var dataString = $('#frmmusicasranking').serialize();
    var res = dataString.split("&");
    var size=0;
    var sizedel=0;
    var enviar="";
    var enviardel="";
    var resultado="";
    var resultadodel="";
    
    var parametros = {
        //"idranking": idranking,
        //"token": token
    };
    var resultadofinal="idranking="+idranking+"&token="+token;
    
    for (var i = 0; i < res.length; i++) {
        var datos = res[i].split("=");
        if(datos[1]==null){ 
        }else{
            if(datos[0]=="idmusica"){
                size++;
                enviar=enviar.concat("&m"+size+"="+datos[1]);
            }else{
               
            }
            
        }
    }
    
    
    var dataStringdel = $('#frmmusicasrankingdel').serialize();

    var resdel = dataStringdel.split("&");

    
    for (var i = 0; i < resdel.length; i++) {
        var datosdel = resdel[i].split("=");
        if(datosdel[1]==null){
            
        }else{
            if(datosdel[0]=="rankingmusica"){
                sizedel++;
                enviardel=enviardel.concat("&d"+sizedel+"="+datosdel[1]);
            }else{
               
            }
           
        }
    }
    
    
    resultado="tam="+size+""+enviar;
    
    if(sizedel>0){
        resultadodel="del="+sizedel+""+enviardel;
    }else{

    }
    
    resultadofinal=resultadofinal.concat("&"+resultado);
    if(resultadodel=="" ){
        
    }else{
        resultadofinal=resultadofinal.concat("&"+resultadodel);    
    }
    
    //alert(resultadofinal);

    $.ajax({
        data: '', //datos que se envian a traves de ajax
        url: 'controlador/ranking_musica.php?'+resultadofinal, //archivo que recibe la peticion
        type: 'GET', //método de envio
        beforeSend: function () {
            //$("#frms").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            //$("#frms").html(response);
           
        }
    });
    ranking();
     

}


function AgregarMusicaRanking(idmusica,titulo){
    //$("#listaranking").append("<li class='list-group-item list-group-item-info' id='idmusica"+idmusica+"'><input type='hidden' name='idmusica' id='idmusica' value='"+idmusica+"' >"+titulo+"<button type='button' class='btn btn-danger' id='idmusicabutton"+idmusica+"' onclick='Eliminar("+idmusica+")'>-Quitar</button></li>");
    
    $("#listaranking").append("<li class='list-group-item list-group-item-info' id='idmusica"+idmusica+"'>    <div class='media'><div class='media-body'><p>"+titulo+"</p></div><div class='media-right'><button type='button' class='btn btn-danger' id='idmusicabutton"+idmusica+"' onclick='QuitarMusicaRanking("+idmusica+")'>-quitar</button></div>    </div>    <input type='hidden' name='idmusica' id='idmusica' value='"+idmusica+"'></li>");
}

function QuitarMusicaRanking(idmusica){
    $("#idmusica"+idmusica).remove();
}

function QuitarMusicaRankingLista(idmusica,titulo){
    $("#idmusicaranking"+idmusica).remove();
    $("#listarankingdel").append("<li class='list-group-item list-group-item-success' id='idmusicaranking"+idmusica+"'><div class='media'><div class='media-body'><h4 class='media-heading'>"+titulo+"</h4></div></div><input type='hidden' name='rankingmusica' id='rankingmusica' value='"+idmusica+"'></li>")
}


function MusicaRanking(idranking){
    var parametros = {
            "r": idranking
        };
     $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'controlador/musica_ranking.php?', //archivo que recibe la peticion
        type: 'POST', //método de envio
        beforeSend: function () {
            $("#ranking"+idranking).html("Cargando Ranking");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#ranking"+idranking).html(response);
        }
    });
}
//////////////////////



function mostrarImagen(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function (event) {
        var img = document.getElementById('image');
        img.src = event.target.result;
    }
    reader.readAsDataURL(file);
}

/*
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {

    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
   


    $(this).on('drop', function () {
        alert("Dqw");
        return false;
    });
}*/
