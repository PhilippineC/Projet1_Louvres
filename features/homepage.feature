Feature: TestHomePage
  On teste les champs relatifs au billet -> vérification des messages d'erreur

  Scenario: HomepageFirstView
    Given I am on the homepage
    Then I should see "Musée du Louvre"
    And I should see "Tarifs"
    And I should see "Veuillez d'abord selectionner une date"
    And I should see "Veuillez saisir tous les champs pour valider la commande"

  @javascript
  Scenario Outline: TestFormBilletFailed
    Given I am on the homepage
    When I select a selectable day in datepicker
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