Feature: BilletReduitScenarii

  @javascript
  Scenario: TestBilletReduit
    Given I am on the homepage
    When I select a selectable day in datepicker
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
  Scenario: TestBilletGratuit
    Given I am on the homepage
    When I select a selectable day in datepicker
    And I fill in "commande_billets_0_nom" with "Dupont"
    And I fill in "commande_billets_0_prenom" with "Marie"
    And I fill in "commande_billets_0_dateNaissance" with "03/04/2016"
    Then I should see "1 billet gratuit"
    And I should see "0 €"
    When I press "commande_valider"
    Then I should see "Confirmation de votre commande"
    And I should see "tarif gratuit"
    And I should see "0 €"