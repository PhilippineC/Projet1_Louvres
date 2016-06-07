Feature: TestConfirmationPage
  On teste le champs email de la page confirmation

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