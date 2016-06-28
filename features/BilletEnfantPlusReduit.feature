Feature: EnfantPlusReduitScenarii

  @javascript
  Scenario: TestBilletsEnfantPlusReduit
    Given I am on the homepage
    When I select a selectable day in datepicker
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