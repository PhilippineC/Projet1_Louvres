

/* ******************** DATEPICKER ********************************* */
var disableddatesFerie = ["5-1-2016","11-1-2016", "12-25-2016", "5-28-2016"];
var disableddatesComplet = $('.disableddatesComplet').text(); // On récupère les dates complet

//on enlève les guillements
disableddatesComplet = disableddatesComplet.substr(1);
disableddatesComplet = disableddatesComplet.substr(0,disableddatesComplet.length-1);
//on crée un tableau
disableddatesComplet = disableddatesComplet.split(',');

for (var i = 0; i <disableddatesComplet.length; i++) {
    disableddatesComplet[i] = disableddatesComplet[i].substr(1);//on enlève les guillements de chq coté
    disableddatesComplet[i] = disableddatesComplet[i].substr(0,disableddatesComplet[i].length-1);

    if (disableddatesComplet[i].substr(3,1) == 0) {// on enlève les éventuelles 0 dans le mois
        var disableddatesCompletSansMois = disableddatesComplet[i].substr(0,3) + disableddatesComplet[i].substring(4) ;
        disableddatesComplet[i] = disableddatesCompletSansMois;
    }

    if (disableddatesComplet[i].substr(0,1) == 0) {// on enlève les éventuelles 0 dans le jour
        disableddatesComplet[i] = disableddatesComplet[i].substr(1,12);
    }
}

var disabledDates = (typeof disableddatesComplet === 'undefined') ? disableddatesFerie : disableddatesFerie.concat(disableddatesComplet);

/* ***** Fonction qui renvoie les jours indisponibles (mardi et dimanche) et disponible ****** */

function DisableSpecificDates(date) {
    var m = date.getMonth();
    var d = date.getDate();
    var y = date.getFullYear();
    var day = date.getDay();

    var currentDate = (m+1) + '-' + d + '-' + y ;

    for (var i = 0; i < disabledDates.length; i++) {
        if ($.inArray(currentDate, disabledDates) != -1 ) {
            return [false];
        }
    }
    if ((day == 2) || (day == 0)) {
        return [false] ;
    } else {
        return [true] ;
    }
}
/* ************** Configuration en français du Datepicker ******************* */
$(function() {
    $.datepicker.regional['fr'] = {
        closeText: 'Fermer',
        prevText: 'Précédent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        weekHeader: 'Sem.',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        minDate: 0,
        maxDate : 365,
        beforeShowDay: DisableSpecificDates,
        onSelect: function (date_select) {
            $("#date_selectionnee").replaceWith('<p id="date_selectionnee"> Vous avez selectionné le ' + date_select + '.</p>');
            $("#jour_visite").text(date_select);
            $('#form_type_billet').show('slow');
            $('#info_visiteur').show('slow');
            /*récupérer l'heure du jour si la réservation se fait le jour même*/
            var today = new Date();
            if ((parseInt(today.getDate()) == date_select.substring(0,2)) &&
                ((parseInt(today.getMonth())+1) == date_select.substring(3,5)) &&
                (parseInt(today.getFullYear()) == date_select.substring(6,10)) &&
                (today.getHours() > 13 )) {
                $('.Journée').hide('slow');
                $('input[class^="Demi"]').prop('checked', true);
                $('#type_billet').text(' à partir de 14h');
                $('#demi-tarif').text(' (demi-tarif) ');
            }
            else {
                $('input[class^="Journ"]').prop('checked', true);
                $('.Journée').show('slow');
                $('#type_billet').text(' pour la journée');
            }
        }
    };
    $.datepicker.setDefaults($.datepicker.regional['fr']);
    $("#commande_dateVisite").datepicker().attr("readonly", "readonly");
});

/* ******************** DEROULEMENT DE LE SUITE DE LA COMMANDE ********************** */
/* ************************* Déclaration des constantes **************** */
var TARIFS = {
    enfant: 8,
    normal: 16,
    senior: 12,
    reduit: 10,
    famille : 35
};
var TEXT = {
    gratuit : 'gratuit pour les - de 4 ans',
    enfant : 'tarif enfant (de 4 à 12 ans) : ' + TARIFS.enfant.toLocaleString("fr-FR", {style: "currency", currency: "EUR"}),
    normal : 'tarif normal : ' + TARIFS.normal.toLocaleString("fr-FR", {style: "currency", currency: "EUR"}),
    senior : 'tarif sénior (à partir de 60 ans) : ' + TARIFS.senior.toLocaleString("fr-FR", {style: "currency", currency: "EUR"}),
    reduit : 'tarif réduit : ' + TARIFS.reduit.toLocaleString("fr-FR", {style: "currency", currency: "EUR"}) + ' (une pièce justificative vous sera demandée à l\'entrée.)',
    famille : 'tarif famille (2 adultes et 2 enfants portant le même nom de famille) : ' + TARIFS.famille.toLocaleString("fr-FR", {style: "currency", currency: "EUR"})
};
var NB_INPUTS = 4; // nb d'inputs par formulaire (prenom, nom, date_naisance et tarif reduit)
var commande_en_cours = new Commande();
/* ************************* Déclaration des fonctions **************** */
// Fonction qui remplit le champs texte 'type de billet' du récap de la commande
function TypeBillet() {
    if ($(':radio.Journée:checked').val()) {
        $('#type_billet').text(' pour la journée');
        $('#demi-tarif').text('');
        commande_en_cours.type = 'journee';
    }

    if ($(':radio[class^="Demi"]:checked').val()) {
        $('#type_billet').text(' à partir de 14h');
        $('#demi-tarif').text(' (demi-tarif) ');
        commande_en_cours.type = 'demi-journee';
    }
}

//Fonction qui valide une date de naissance
function ValidateDate(dtValue) {
    var date = new Date(dtValue.split("/").reverse().join("/"));
    if (date.getFullYear() > (new Date().getFullYear())) {
        return false;
    }
    if (date.getFullYear() < (new Date().getFullYear() - 110)) {
        return false;
    }
    var dtRegex = new RegExp(/^(0{1}[1-9]|[12][0-9]|3[01])[\/\-](0{1}[1-9]|1[012])[\/\-]\d{4}$/);
    return dtRegex.test(dtValue);
}

// Fonction qui calcule le tarif en fonction de la date saisi
function CalculTarif(date) {
    date = date.split("/").reverse().join("/");
    var tarif;
    var ageNormal = 12, ageEnfant = 4, ageSenior = 60, ageOld = 110;
    var dateNormal, dateEnfant, dateSenior, dateOld, today = new Date(), dateEnr = new Date(date);
    dateNormal = new Date(today.getFullYear() - ageNormal, today.getMonth(), today.getDate());
    dateEnfant = new Date(today.getFullYear() - ageEnfant, today.getMonth(), today.getDate());
    dateSenior = new Date(today.getFullYear() - ageSenior, today.getMonth(), today.getDate());
    dateOld = new Date(today.getFullYear() - ageOld, today.getMonth(), today.getDate());
    if ((dateEnr > dateEnfant) && (dateEnr <= today)) {
        tarif ='gratuit';
    }
    else if (dateEnr <= dateOld) {
        return false;
    }
    else if (dateEnr <= dateSenior) {
        tarif ='sénior';

    }
    else if (dateEnr <= dateNormal) {
        tarif ='normal';
    }
    else if (dateEnr <= dateEnfant) {
        tarif ='enfant';
    }
    else {
        return false;
    }
    var result = tarif;
    return result;
}

function VerifFormulaire() {
    $('.error').hide();
    var inputsElts = $('.billets input');
    inputsElts.on('input change', function () {
        // on traite les 3 types d'input : text, date_naissance et tarif_reduit
        // D'abord la date de naissance qui détermine le tarif
        if (this.id.endsWith('dateNaissance')) {
            if (ValidateDate($(this).val())) {
                if ($(this).parent().parent().find($('#billet_reduit')).is(':checked') == false) {
                    $(this).next().hide();
                    $(this).next().next().hide();
                    if (!(CalculTarif($(this).val()))) {
                        $(this).next().show();
                        $(this).next().next().show();
                        $('#verif').show();
                        $('#prix_total').hide();
                    }
                }
            }
            else {
                $(this).next().show();
                $(this).next().next().show();
            }
        }
        else if (this.id.endsWith('nom')) {// Pour les autres champs nom et prénom
            if ($(this).val().length < 2) { // Si la taille du texte est inférieure à 2 caractères
                $(this).next().show(); // On affiche le message d'erreur
            }
            else { // on le cache
                $(this).next().hide();
            }
        }
        // Si tous les champs sont remplis correctement, on peut afficher le détail et le tarif
        FormulaireRempli(inputsElts);
    });
}


/*Fonction pour valider les champs du formulaire une fois qu'il est complétement rempli*/
/* et calculer les tarifs spéciaux (réduit, famille)*/
function FormulaireRempli(inputsElts) {
    var tabTarifs = new Array();
    var nbForm = inputsElts.length/NB_INPUTS;
    var inc = 0, Billets = {}, inputsVal = new Array();
    inputsElts.each(function (e) {
        if (this.id.endsWith('reduit')) {
            inputsVal[e] = this.checked;
            inc++;
        }
        else {
            inputsVal[e] = $(this).val();
        }
        if (this.id.endsWith('dateNaissance')) {
            if (ValidateDate($(this).val())) {
                inc++;
            }
        }
        else {
            if ($(this).val().length > 1) {
                inc++;
            }
        }
    });
    if ((inc ==  inputsElts.length) && (inputsElts.length != 0)) {
        // Tous les champs sont remplis, on crée les objets
        for (var i = 0; i < nbForm; i++) { //index, prenom, nom, date_naissance, tarif_reduit
            Billets[i] = new Billet(i,inputsVal[i*NB_INPUTS], inputsVal[i*NB_INPUTS+1], inputsVal[i*NB_INPUTS+2], inputsVal[i*NB_INPUTS+3]);
        }
        // On calcule le tarif famille
        var normal = 0, enfant = 0;
        var decrEnf = 2, decrNorm = 2;
        for (var i = 0; i<nbForm; i++) {
            for (var j = 0; j < nbForm; j++) {
                if (i !== j) {
                    if (Billets[i].nom == Billets[j].nom) {
                        Billets[i].memeNom++;
                    }
                }
            }
            if (Billets[i].memeNom > 3) {
                switch (Billets[i].tarif) {
                    case 'normal' :
                        normal++;
                        break;
                    case 'enfant' :
                        enfant++;
                        break;
                }
            }
        }
        if ((normal > 1) && (enfant > 1)) {
            for (i = 0; i<nbForm; i++) {
                if (Billets[i].memeNom > 3) {
                    if ((Billets[i].tarif == 'enfant') && (decrEnf > 0)) {
                        Billets[i].tarif = 'Famille';
                        Billets[i].famille = true;
                        decrEnf --;
                    }
                    if ((Billets[i].tarif == 'normal') && (decrNorm > 0)){
                        Billets[i].tarif = 'Famille';
                        Billets[i].famille = true;
                        decrNorm --;
                    }
                }
            }
        }
        for (i = 0; i<nbForm; i++) {
            if (Billets[i].famille) {
                Billets[i].text = TEXT.famille;
            }
            else if ((Billets[i].reduit) && (!(Billets[i].famille))) {
                Billets[i].text = TEXT.reduit;
            }
            tabTarifs[i] = Billets[i].text;
        }
        tabTarifs.sort();
        if (tabTarifs.indexOf(TEXT.famille) != -1) {
            tabTarifs.splice(tabTarifs.indexOf(TEXT.famille), 3);
        }

        $('#verif').hide();
        $('#commande_valider').show();
        $('#prix_total').show();
        $('#details_billets p').remove();

        //On affiche le prix total de la commande
        $('#prix').text(CalculPrixCommande(tabTarifs).toLocaleString("fr-FR", {style: "currency", currency: "EUR"}));
        return true;
    }
    else {
        $('#verif').show();
        $('#prix_total').hide();
        $('#commande_valider').hide();
        $('#details_billets p').remove();
        return false;
    }
}

// fonction qui calcule le prix de la commande en fonction d'un tableau des tarifs
function CalculPrixCommande(tabTarifs) {
    var prixTotal = 0;
    for (var nom in tabTarifs) {
        $('#details_billets').append('<p>1 Billet ' + tabTarifs[nom] + '</p>');
        switch (tabTarifs[nom]) {
            case (TEXT.gratuit): { break;}
            case (TEXT.enfant) : {
                prixTotal += TARIFS.enfant;
                break;
            }
            case (TEXT.normal) : {
                prixTotal += TARIFS.normal;
                break;
            }
            case (TEXT.senior) : {
                prixTotal += TARIFS.senior;
                break;
            }
            case (TEXT.reduit) : {
                prixTotal += TARIFS.reduit;
                break;
            }
            case (TEXT.famille) : {
                prixTotal += TARIFS.famille;
                break;
            }
        }
    }
    if (commande_en_cours.type == 'demi-journee') {
        prixTotal = prixTotal/2;
    }
    return prixTotal;
}
/* ************************* Déclaration des objets **************** */
// Objet Billet
function Billet(index, nom, prenom, dateNaissance, reduit) {
    this.index = index;
    this.nom = nom;
    this.prenom = prenom;
    this.dateNaissance = dateNaissance;
    this.reduit = reduit;
    this.tarif = CalculTarif(this.dateNaissance);
    this.memeNom = 1;
    this.famille = false;
    this.texte = function (tarif) {
        var texteRetour;
        switch (tarif) {
            case ('gratuit'):
            {
                texteRetour = TEXT.gratuit;
                break;
            }
            case ('enfant') :
            {
                texteRetour = TEXT.enfant;
                break;
            }
            case ('normal') :
            {
                texteRetour = TEXT.normal;
                break;
            }
            case ('sénior') :
            {
                texteRetour = TEXT.senior;
                break;
            }
            case ('réduit') :
            {
                texteRetour = TEXT.reduit;
                break;
            }
            case ('famille') :
            {
                texteRetour = TEXT.famille;
                break;
            }
        }
        return texteRetour;
    };
    this.text = this.texte(this.tarif);
}

function Commande() {
    this.type = null;
}

$(function() {
/* *********************PARTIE JQUERY MANIPULATION DU DOM *************** */

// Au chargement de la page, on cache les messages d'erreur et les blocs qui apparaitront au fur et à mesure de la commande
    $('.max7billets').hide();
    $('#form_type_billet').hide();
    $('#commande_valider').hide();
    $('#info_visiteur').hide();
    $('#prix_total').hide();

    /* Selection du type de billet (journée, demi-journée) */
    $(':radio').change(function () {
        TypeBillet();
        VerifFormulaire();
        FormulaireRempli($('.billets input'));
    });
});

/* ******************** GERER LES FORMULAIRE AVEC COLLECTIONTYPE DE SYMFONY ********************** */

$(function() {
    var $container = $('div.billets');
    // On ajoute un lien pour ajouter un nouveau billet
    var $addLink = $('<a href="#" class="billet_link"><span class="glyphicon glyphicon-plus"></span>  Ajouter un billet</a>');
    $container.append($addLink);
    // On ajoute un message pour dire qu'on ne peut pas commander plus de 7 billet par commande
    var $avertissement = $('<div><span class="max7billets">Vous ne pouvez pas commander plus de 7 billets par commande.</span></div>');
    $('.billet_link').after($avertissement);
    $('.max7billets').hide();

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $addLink.click(function (e) {
        if (index == 7) {
            $('.max7billets').fadeIn(1500, 'linear').fadeOut(1200, 'swing');
            return false;
        }
        else {
            addBillet($container);
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            VerifFormulaire();
            FormulaireRempli($('.billets input'));
            return false;
        }
    });

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container.find(':input').length;

    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un.
    if (index == 0) {
        addBillet($container);
    } else {
        // Pour chaque billet déjà existant, on ajoute un lien de suppression
        $container.children('div').each(function () {
            addDeleteLink($(this));
        });
    }

    // La fonction qui ajoute un formulaire billet
    function addBillet($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var $prototype = $($container.attr('data-prototype').replace(/__name__label__/g, 'Billet n°' + (index+1))
            .replace(/__name__/g, index));
        // On ajoute au prototype un lien pour pouvoir supprimer le billet
        addDeleteLink($prototype);
        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);

        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        index++;
    }

    // La fonction qui ajoute un lien de suppression d'un billet
    function addDeleteLink($prototype) {
        // Création du lien
        $deleteLink = $('<a href="#" class="billet_link col-xs-offset-7 col-sm-offset-9 col-md-offset-7 col-lg-offset-6">Supprimer ce billet</a>');
        // Ajout du lien
        $prototype.append($deleteLink);
        // Ajout du listener sur le clic du lien
        $deleteLink.click(function(e) {
            $prototype.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            index--;
            VerifFormulaire();
            FormulaireRempli($('.billets input'));
            /* ****   */
            return false;
        });
    }
    VerifFormulaire();
});
