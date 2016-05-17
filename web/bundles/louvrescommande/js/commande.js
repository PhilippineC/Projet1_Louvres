
/* ******************** DATEPICKER ********************************* */

// Développer une fonction qui ira chercher dans la BDD les jours complet pour les retourner AJAX ?//
var disableddates = ["5-1-2016","11-1-2016", "12-25-2016"];
function DisableSpecificDates(date) {

    var m = date.getMonth();
    var d = date.getDate();
    var y = date.getFullYear();
    var day = date.getDay();

    var currentdate = (m+1) + '-' + d + '-' + y ;

    for (var i = 0; i < disableddates.length; i++) {
        if ($.inArray(currentdate, disableddates) != -1 ) {
            return [false];
        }
    }
    if (day == 2) {
        return [false] ;
    } else {
        return [true] ;
    }
}

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
            $('#nbr_billet').show('slow');
            /*récupérer l'heure du jour si la réservation se fait le jour même*/
            var today = new Date();
            if ((parseInt(today.getDate()) == date_select.substring(0,2)) &&
                ((parseInt(today.getMonth())+1) == date_select.substring(3,5)) &&
                (parseInt(today.getFullYear()) == date_select.substring(6,10)) &&
                (today.getHours() > 13 )) {
                $('.Journée').hide('slow');
            //    $('.Demi-journée').attr('checked', true);
                $('input[class^="Demi"]').attr('checked', true);
            }
            else {
                $('.Journée').attr('checked', true);
                $('.Journée').show('slow');
            }
        }
    }
    $.datepicker.setDefaults($.datepicker.regional['fr']);
    $("#commande_dateVisite").datepicker();
});

/* ******************** DEROULEMENT LE SUITE DE LA COMMANDE ********************** */

$(function() {

    /* ************************* Déclaration des objets **************** */
    // Objet Billet
    function Billet(index, nom, prenom, date_naissance, reduit) {
        this.index = index;
        this.nom = nom;
        this.prenom = prenom;
        this.date_naissance = date_naissance;
        this.reduit = reduit;
        this.tarif = CalculTarif(this.date_naissance);
        this.meme_nom = 1;
        this.famille = false;
        this.texte = function (tarif) {
            var texte_retour;
            switch (tarif) {
                case ('gratuit'):
                {
                    texte_retour = TEXT.gratuit;
                    break;
                }
                case ('enfant') :
                {
                    texte_retour = TEXT.enfant;
                    break;
                }
                case ('normal') :
                {
                    texte_retour = TEXT.normal;
                    break;
                }
                case ('sénior') :
                {
                    texte_retour = TEXT.senior;
                    break;
                }
                case ('réduit') :
                {
                    texte_retour = TEXT.reduit;
                    break;
                }
                case ('famille') :
                {
                    texte_retour = TEXT.famille;
                    break;
                }
            }
            return texte_retour;
        }
        this.text = this.texte(this.tarif);
    }

    // Objet Commande
    function Commande(Billets, type) {
        this.billets = Billets;
        this.type = type;
    }

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
        enfant : 'tarif enfant (de 4 à 12 ans) : ' + TARIFS.enfant + '€',
        normal : 'tarif normal : ' + TARIFS.normal + '€',
        senior : 'tarif sénior (à partir de 60 ans) : ' + TARIFS.senior + '€',
        reduit : 'tarif réduit : ' + TARIFS.reduit + '€ (une pièce justificative vous sera demandé à l\'entrée.)',
        famille : 'tarif famille (2 adultes et 2 enfants portant le même nom de famille) : ' + TARIFS.famille + '€'
    };
    var NB_INPUTS = 4; // nb d'inputs par formulaire (prenom, nom, date_naisance et tarif)

    /* ************************* Déclaration des fonctions **************** */
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
        var age_normal = 12, age_enfant = 4, age_senior = 60, age_old = 110;
        var date_normal, date_enfant, date_senior, date_old, today = new Date(), date_enr = new Date(date);
        date_normal = new Date(today.getFullYear() - age_normal, today.getMonth(), today.getDate());
        date_enfant = new Date(today.getFullYear() - age_enfant, today.getMonth(), today.getDate());
        date_senior = new Date(today.getFullYear() - age_senior, today.getMonth(), today.getDate());
        date_old = new Date(today.getFullYear() - age_old, today.getMonth(), today.getDate());
        if ((date_enr > date_enfant) && (date_enr <= today)) {
            tarif ='gratuit';
        }
        else if (date_enr <= date_old) {
            return false;
        }
        else if (date_enr <= date_senior) {
            tarif ='sénior';

        }
        else if (date_enr <= date_normal) {
            tarif ='normal';
        }
        else if (date_enr <= date_enfant) {
            tarif ='enfant';
        }
        else {
            return false;
        }
        var result = tarif;
        return result;
    }

    /*Fonction pour valider les champs du formulaire une fois qu'il est complétement rempli*/
    /* et calculer les tarifs spéciaux (réduit, famille)*/
    function FormulaireRempli(inputs) {
        var tabTarifs = new Array();
        var nb_form = inputs.length/NB_INPUTS;
        console.log(nb_form);
        var inc = 0, Billets = {}, inputs_val = new Array(), commande;
        inputs.each(function (e) {
            if (this.id == 'billet_reduit') {
                inputs_val[e] = this.checked;
                inc++;
            }
            else {
                inputs_val[e] = $(this).val();
            }
            if (this.id == 'billet_dateNaissance') {
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
        console.log(inc + 'inputs : ' + inputs.length);
        console.log(inputs_val);
        if (inc ==  inputs.length) {
            // Tous les champs sont remplis, on crée les objets
            for (var i = 0; i < nb_form; i++) { //index, prenom, nom, date_naissance, tarif_reduit
                Billets[i] = new Billet(i,inputs_val[i*NB_INPUTS], inputs_val[i*NB_INPUTS+1], inputs_val[i*NB_INPUTS+2], inputs_val[i*NB_INPUTS+3]);
            }
            // On calcule le tarif famille
            var normal = 0, enfant = 0, x = 0;
            var decr_enf = 2, decr_norm = 2;
            for (var i = 0; i<nb_form; i++) {
                for (var j = 0; j < nb_form; j++) {
                    if (i !== j) {
                        if (Billets[i].nom == Billets[j].nom) {
                            Billets[i].meme_nom++;
                        }
                    }
                }
                if (Billets[i].meme_nom > 3) {
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
                for (i = 0; i<nb_form; i++) {
                    if (Billets[i].meme_nom > 3) {
                        if ((Billets[i].tarif == 'enfant') && (decr_enf > 0)) {
                            Billets[i].tarif = 'Famille';
                            Billets[i].famille = true;
                            decr_enf --;
                        }
                        if ((Billets[i].tarif == 'normal') && (decr_norm > 0)){
                            Billets[i].tarif = 'Famille';
                            Billets[i].famille = true;
                            decr_norm --;
                        }
                    }
                }
            }
            for (i = 0; i<nb_form; i++) {
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
            $('#btn-valider').show();
            $('#detail_commande').show();
            $('#details_billets p').remove();

            //On affiche le prix total de la commande
            $('#prix').text(CalculPrixCommande(tabTarifs) + ' €');
            return true;
        }
        else {
            $('#verif').show();
            $('#detail_commande').hide();
            $('#btn-valider').hide();
            $('#details_billets p').remove();
            return false;
        }
    }

    // fonction qui calcule le prix de la commande en fonction d'un tableau des tarifs
    function CalculPrixCommande(tabTarifs) {
        var prix_total = 0;
        for (var nom in tabTarifs) {
            $('#details_billets').append('<p>1 Billet ' + tabTarifs[nom] + '</p>');
            switch (tabTarifs[nom]) {
                case (TEXT.gratuit): { break;}
                case (TEXT.enfant) : {
                    prix_total += TARIFS.enfant;
                    break;
                }
                case (TEXT.normal) : {
                    prix_total += TARIFS.normal;
                    break;
                }
                case (TEXT.senior) : {
                    prix_total += TARIFS.senior;
                    break;
                }
                case (TEXT.reduit) : {
                    prix_total += TARIFS.reduit;
                    break;
                }
                case (TEXT.famille) : {
                    prix_total += TARIFS.famille;
                    break;
                }
            }
        }
        return prix_total;
    }

/* *********************PARTIE JQUERY MANIPULATION DU DOM *************** */

// Au chargement de la page, on cache les messages d'erreur
    $('.error').hide();
    $('#form_type_billet').hide();
    $('#nbr_billet').hide();
    $('#btn-valider').hide();
    $('#info_visiteur').hide();
    $('#detail_commande').hide();
    $('#formulaire_a_copier').hide();

    /* Selection du type de billet (journée, demi-journée) */
    $(':radio').change(function () {
        $('#nbr_billet').show('slow');

        if ($(':radio.Journée:checked').val()) {
            $('#type_billet').text(' pour la journée');
        }
        if ($(':radio[class^="Demi"]:checked').val()) {
            $('#type_billet').text(' à partir de 14h');
        }
    });
    var nb_old = 0;
    // Gestion des formulaires dès la selection du nombre de billets
    $('#commande_nbBillet').change(function () { // selection du nombre de billets
        $('#info_visiteur').show();
        $('#detail_commande').hide();
        $('#details_billets p').remove();
        // On garde en mémoire le nb de formulaires précedemment selectionné pour gérer le delta
        // On copie le formulaire à copier autant de fois qu'il y a de billets
        nb = $(this).val();
        $('#nombre_billets').text(nb);
        if (nb_old < nb) {
           for (var i = nb_old; i < nb; i++) { /* Afficher les encarts renseignements en fonction du nbr de billets selectionnés*/
                i = parseInt(i);
                $('#formulaire_a_copier legend').text('Billet n°' + (i + 1));
                $('#formulaire_a_copier').find('.pays').children().remove();
                $('#formulaire_a_copier').clone().attr('id', 'formulaire_' + (i + 1)).appendTo($('#billet')).show('slow');
            }
            FormulaireRempli($('#billet input'));
        }
        else if (nb < nb_old) {
            for (var i = nb; i < nb_old; i++) { /* Supprimer les encarts renseignements en trop*/
                i = parseInt(i);
                $('#formulaire_'+ (i + 1)).remove();
            }
            FormulaireRempli($('#billet input'));
         }
        nb_old = nb;
        $('.pays').flagStrap({
            inputName: "country",
            buttonSize: "btn-sm",
            buttonType: "btn-default",
            selectedCountry: "FR",
            scrollable: true
        }); // Initialisation du plugin pour la selection du pays

        // On vérifie les champs saisies par l'utilisateur
        var inputs = $('#billet input');
        console.log(inputs);
        inputs.on('change keyup', function () {
            // on traite les 3 types d'input : text, date_naissance et tarif_reduit
            // D'abord la date de naissance qui détermine le tarif
            if (this.id == 'billet_dateNaissance') {
                if (ValidateDate($(this).val())) {
                    if ($(this).parent().parent().find($('#billet_reduit')).is(':checked') == false) {
                 /*   if ($(this).parent().parent().next().children().children().is(':checked') == false) {*/
                        $(this).next().hide();
                        $(this).next().next().hide();
                        if (!(CalculTarif($(this).val()))) {
                            $(this).next().show();
                            $(this).next().next().show();
                            $('#verif').show();
                            $('#detail_commande').hide();
                        }
                    }
                }
                else {
                    $(this).next().show();
                    $(this).next().next().show();
                }
            }
            else if ((this.id == 'billet_nom') || (this.id == 'billet_prenom')) {// Pour les autres champs de type text
                if ($(this).val().length < 2) { // Si la taille du texte est inférieure à 2 caractères
                    $(this).next().show(); // On affiche le message d'erreur
                }
                else { // on le cache
                    $(this).next().hide();
                }
            }
            // Si tous les champs sont remplis correctement, on peut afficher le détail et le tarif
            FormulaireRempli(inputs);
        });

    });
 /*   $('#btn-reset').click(function() {
        console.log($('.pays select'));
        for (var i = 0; i < $('#billet form').length; i++) {

            $('#billet form')[i].reset();
        }

        $('.pays select').each(function () {
            console.log($('.pays select').val());
            $(this).value("FR");
            console.log($('.pays select').val());
        });
    });*/
});