Feature: MultipleScenarii
  On teste d'abord les champs relatifs au billet -> vérification des messages d'erreur
  On teste ensuite plusieurs scénarios de commande.
  Et enfin on teste le champs email de la page confirmation

  Scenario: HomepageFirstView
    Given I am on the homepage
    Then I should see "Musée du Louvre"
    And I should see "Tarifs"
    And I should see "Veuillez d'abord selectionner une date"
    And I should see "Veuillez saisir tous les champs pour valider la commande"

  @javascript
  Scenario Outline: TestFormBilletFailed
    Given I am on the homepage
    When I select today in datepicker
    And I wait for 1 seconds
    And I fill in "<input>" with "<input_text>"
    Then I should see "<message>"
    And I should see "Veuillez saisir tous les champs pour valider la commande"

    Examples:
      | input            | input_text | message                     |
      | Nom              | D          |saisir au moins 2 caractères |
      | Prénom           | m          |saisir au moins 2 caractères |
      | Date de naissance| 3/4/1984   |date invalide                |
      | Date de naissance| 01/13/1950 |date invalide                |
      | Date de naissance| 40/03/1950 |date invalide                |
      | Date de naissance| 03/03/89   |date invalide                |
      | Date de naissance| 03/03/2020 |date invalide                |

  @javascript
  Scenario: TestBilletNormal
    Given I am on the homepage
    When I select today in datepicker
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    And I fill in "commande_billets_0_dateNaissance" with "13/10/1990"
    Then I should see "1 billet tarif normal"
    And I should see "16 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif normal"
    And I should see "16 €"
    When I fill in "Votre email" with "deterteer@gmail.com"
    And I select "stripe" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should not see "Merci de saisir une adresse email valide"

  @javascript
  Scenario: TestBilletsSeniorPlusEnfant
    Given I am on the homepage
    When I select today in datepicker
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_1_nom" with "Dupind"
    And I fill in "commande_billets_1_prenom" with "Ela"
    And I fill in "commande_billets_0_dateNaissance" with "03/04/1950"
    And I fill in "commande_billets_1_dateNaissance" with "03/04/2010"
    Then I should see "1 billet tarif enfant"
    And I should see "1 billet tarif sénior"
    And I should see "20 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif enfant"
    And I should see "tarif senior"
    And I should see "20 €"
    When I fill in "Votre email" with "blablablabla@yahoo.com"
    And I select "paypal" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should not see "Merci de saisir une adresse email valide"

  @javascript
  Scenario: TestBilletsEnfantPluReduit
    Given I am on the homepage
    When I select today in datepicker
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    Then I check "Tarif réduit"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_1_nom" with "Dupind"
    And I fill in "commande_billets_1_prenom" with "Ela"
    And I fill in "commande_billets_0_dateNaissance" with "03/04/1988"
    And I fill in "commande_billets_1_dateNaissance" with "03/04/2010"
    Then I should see "1 billet tarif réduit"
    And I should see "1 billet tarif enfant"
    And I should see "18 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif enfant"
    And I should see "tarif reduit"
    And I should see "18 €"
    When I fill in "Votre email" with "blablauy@matchy.de"
    And I select "paypal" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should not see "Merci de saisir une adresse email valide"

  @javascript
  Scenario: TestBilletFamille
    Given I am on the homepage
    When I select today in datepicker
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    And I fill in "commande_billets_0_dateNaissance" with "03/04/1988"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_1_nom" with "Dupont"
    And I fill in "commande_billets_1_prenom" with "Ela"
    And I fill in "commande_billets_1_dateNaissance" with "03/04/1984"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_2_nom" with "Dupont"
    And I fill in "commande_billets_2_prenom" with "Noel"
    And I fill in "commande_billets_2_dateNaissance" with "03/04/2010"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_3_nom" with "Dupont"
    And I fill in "commande_billets_3_prenom" with "Ola"
    And I fill in "commande_billets_3_dateNaissance" with "03/04/2011"
    Then I should see "1 billet tarif famille"
    And I should see "35 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif famille"
    And I should see "35 €"
    When I fill in "Votre email" with "billetfamille@louvre.fr"
    And I select "paypal" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should not see "Merci de saisir une adresse email valide"

  @javascript
  Scenario: TestBilletReduit
    Given I am on the homepage
    When I select today in datepicker
    And I select "demi-journee" from "commande[typeBillet]"
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    And I fill in "commande_billets_0_dateNaissance" with "03/04/1988"
    Then I check "Tarif réduit"
    Then I should see "1 billet tarif réduit"
    And I should see "10 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif reduit"
    And I should see "10 €"
    When I fill in "Votre email" with "billetreduit@yahoo.ca"
    And I select "stripe" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should not see "Merci de saisir une adresse email valide"

  @javascript
  Scenario: TestBilletReduitCheckAndUncheck
    Given I am on the homepage
    When I select today in datepicker
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    And I fill in "commande_billets_0_dateNaissance" with "03/04/1988"
    And I check "Tarif réduit"
    Then I should see "1 billet tarif réduit"
    And I should see "10 €"
    When I uncheck "Tarif réduit"
    Then I should see "1 billet tarif normal"
    And I should see "16 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif normal"
    And I should see "16 €"
    When I fill in "Votre email" with "billetnormal@yahoo.fr"
    And I select "stripe" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should not see "Merci de saisir une adresse email valide"

  @javascript
  Scenario: TestAddAndDeleteBillet
    Given I am on the homepage
    When I select today in datepicker
    And I select "demi-journee" from "commande[typeBillet]"
    Then I follow "Ajouter un billet"
    And I follow "Supprimer ce billet"
    And I fill in "commande_billets_1_nom" with "Dupont"
    And I fill in "commande_billets_1_prenom" with "Ela"
    And I fill in "commande_billets_1_dateNaissance" with "03/04/1950"
    Then I should see "1 billet tarif sénior"
    And I should see "12 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif senior"
    And I should see "12 €"
    When I fill in "Votre email" with "billetsenior@yahoo.fr"
    And I select "stripe" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should not see "Merci de saisir une adresse email valide"

  @javascript
  Scenario: TestBilletFamilleMemeSiReduitCoche
    Given I am on the homepage
    When I select today in datepicker
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    And I fill in "commande_billets_0_dateNaissance" with "03/04/1988"
    And I check "Tarif réduit"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_1_nom" with "Dupont"
    And I fill in "commande_billets_1_prenom" with "Ela"
    And I fill in "commande_billets_1_dateNaissance" with "03/04/1984"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_2_nom" with "Dupont"
    And I fill in "commande_billets_2_prenom" with "Noel"
    And I fill in "commande_billets_2_dateNaissance" with "03/04/2010"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_3_nom" with "Dupont"
    And I fill in "commande_billets_3_prenom" with "Ola"
    And I fill in "commande_billets_3_dateNaissance" with "03/04/2011"
    Then I should see "1 billet tarif famille"
    And I should see "35 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif famille"
    And I should see "35 €"
    When I fill in "Votre email" with "billetfamille@yahoo.com"
    And I select "stripe" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should not see "Merci de saisir une adresse email valide"

  @javascript
  Scenario: TestBilletsFamilletUnSeniorEmailFailed
    Given I am on the homepage
    When I select today in datepicker
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    And I fill in "commande_billets_0_dateNaissance" with "03/04/1988"
    And I check "Tarif réduit"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_1_nom" with "Dupont"
    And I fill in "commande_billets_1_prenom" with "Ela"
    And I fill in "commande_billets_1_dateNaissance" with "03/04/1984"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_2_nom" with "Dupont"
    And I fill in "commande_billets_2_prenom" with "Noel"
    And I fill in "commande_billets_2_dateNaissance" with "03/04/2010"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_3_nom" with "Dupont"
    And I fill in "commande_billets_3_prenom" with "Ola"
    And I fill in "commande_billets_3_dateNaissance" with "03/04/2011"
    And I follow "Ajouter un billet"
    And I fill in "commande_billets_4_nom" with "Dupont"
    And I fill in "commande_billets_4_prenom" with "Ole"
    And I fill in "commande_billets_4_dateNaissance" with "03/04/1949"
    Then I should see "1 billet tarif famille"
    And I should see "1 billet tarif sénior"
    And I should see "47 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif famille"
    And I should see "tarif senior"
    And I should see "47 €"
    When I fill in "Votre email" with "btest.fr"
    And I select "stripe" from "confirmation[moyenPaiement]"
    And I press "confirmation_valider"
    Then I should see "Merci de saisir une adresse email valide"

