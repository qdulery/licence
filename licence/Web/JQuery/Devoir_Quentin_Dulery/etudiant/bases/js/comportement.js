$(document).ready(init());

function init() {
  exo1();
  exo2();
  exo3();
}

/**
 * Exercice 1
 */
function exo1() {
  var liste = $("section#ex1 ul");
  var li = $("<li/>").text("jQuery").appendTo(liste);
  li.css('background-color', 'grey');
}

/**
 * Exercice 2
 */
function exo2() {
  $("button.valide").click(actionClick);
}

function actionClick() {
  var listeSportifs = $("ul.sportif li");
  var listeGolf = $("ul.listeGolf");
  var listeAutre = $("ul.listeAutre");

  listeSportifs.each(function(){
    var li;
    if ($(this).attr('class') == 'golf') {
      li = $("<li/>").text($(this).text());
      li.addClass($(this).attr('class'));
      li.appendTo(listeGolf); 
    }
    else {
      li = $("<li/>").text($(this).text());
      li.addClass($(this).attr('class'));
      li.appendTo(listeAutre);
    }
  })
}

/**
 * Exercice 3
 */
function exo3() {
  $("button.btnExo3").click(actionClickEx3);
}

function actionClickEx3() {
  var url = "exo3.php";
  envoiAjax(url).done(traitementSportifs);
}

function traitementSportifs(data) {
  var h3 = $("section#ex3 h3");
  var description = data.description;
  h3.text(description);

  var tableau = $("<table/>");
  $("section#ex3").append(tableau);

  var tr = $("<tr/>").appendTo(tableau);
  var th = $("<th/>").text("Nom").appendTo(tr);
  th = $("<th/>").text("Gain").appendTo(tr);
  th = $("<th/>").text("Sport").appendTo(tr);

  $.each(data.infos, function (key, value) {
    var nom = value.nom;
    var gain = value.gain;
    var sport = value.sport;

    tr = $("<tr/>").appendTo(tableau);
    var td = $("<td/>").text(nom).appendTo(tr);
    td = $("<td/>").text(gain).appendTo(tr);
    td = $("<td/>").text(sport).appendTo(tr);
  })
}

function envoiAjax(url){
  return $.ajax({
      url: url,
      type: "post",
      dataType: "JSON",
      data: {
        sportif: 2017
      }
  }).fail(function(){
      var erreur = $("section#ex3 h3"); // On récupère la liste
      var afficheErreur = $("<p/>").text("Erreur !").appendTo(erreur); // Ajout du texte au li et ajout du li à la liste
  });
}
