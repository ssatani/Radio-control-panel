// Assign handlers immediately after making the request,
// and remember the jqxhr object for this request
var FRAGMENT_RANKING=null;
var IDESCUCHA=0;
var URL="";
var JSONRANKING=null;
var CARGAMUSICA=false;
function getranking(webfragment, idescucha, url) {
    FRAGMENT_RANKING=webfragment;
    IDESCUCHA=idescucha;
    URL=url;

    //var geocodingAPI = "https://estasdefiesta.com/pcontrol/graph/graph_rankingtest.php?idescucha=" + String(idescucha);
    //var geocodingAPI ="http://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&sensor=true";
    var radioAPI = "http://localhost:81/radiokorys/graph/graph_rankingtest.php?idescucha=" + String(idescucha);
    $.getJSON(radioAPI, function (json) {
        JSONRANKING=json;
        setRanking();

    });
}

function setRanking(){
    $(FRAGMENT_RANKING).empty();
    for (i in JSONRANKING.ranking) {
            //console.log("ranking->"+json.ranking[i].ranking_idranking);
            var ranking_parametros = {
                "programacion_idprogramacion": JSONRANKING.ranking[i].programacion_idprogramacion,
                "programacion_titulo": JSONRANKING.ranking[i].programacion_titulo,
                "ranking_idranking": JSONRANKING.ranking[i].ranking_idranking,
                "ranking_titulo": JSONRANKING.ranking[i].ranking_titulo,
                "ranking_descripcion": JSONRANKING.ranking[i].ranking_descripcion,
                "ranking_fecha": JSONRANKING.ranking[i].ranking_fecha,
                "top": JSONRANKING.ranking[i].top,
                "votos": JSONRANKING.ranking[i].votos,
                "url": URL,
                "numero": i
            };
            $.ajax({
                data: ranking_parametros, //datos que se envian a traves de ajax
                url: 'ranking-item.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function () {
                    //$("#div1").load("demo_test.txt #p1");
                    //$(webfragment).append("Procesando, espere por favor...");
                },
                success: function (ranking_response) {
                    
                    $(FRAGMENT_RANKING).append(ranking_response);

                    
                    /*$(webfragment + "#ranking" + json.ranking[i].ranking_idranking).ready(function () {
                        console.log("m->" + json.ranking[i].ranking_idranking);
                    });*/

                }
            });


        }
}

function setMusicas(ranking){
    var i=ranking;
    var content=FRAGMENT_RANKING+JSONRANKING.ranking[i].ranking_idranking;
    $(content).empty();
    for (j in JSONRANKING.ranking[i].musica) {
        //$(webfragment+"#ranking"+json.ranking[i].ranking_idranking).append("<ul>test</ul>");
        var musica_parametros = {
            "idmusica": JSONRANKING.ranking[i].musica[j].idmusica,
            "titulo": JSONRANKING.ranking[i].musica[j].titulo,
            "fecha": JSONRANKING.ranking[i].musica[j].fecha,
            "idartista": JSONRANKING.ranking[i].musica[j].idartista,
            "artista": JSONRANKING.ranking[i].musica[j].artista,
            "conteo": JSONRANKING.ranking[i].musica[j].conteo,
            "voto": JSONRANKING.ranking[i].musica[j].voto,
            "votos": JSONRANKING.ranking[i].votos,
            "url": URL
        };
        
        $.ajax({
            data: musica_parametros, //datos que se envian a traves de ajax
            url: 'musica-item.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                //$("#div1").load("demo_test.txt #p1");
                //$(webfragment).append("Procesando, espere por favor...");
            },
            success: function (musica_response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                //console.log('loading to->',json.ranking[i].ranking_idranking);
                
                $(content).append(musica_response);
                //$(webfragment+"#ranking"+json.ranking[i].ranking_idranking).append(musica_response);
            }
        });
    }
}
        
    
