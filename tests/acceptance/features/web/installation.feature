Feature: Installation
  In order to use the component
  As an administrator
  I need to be able to install the component

  Scenario: Installing component
    Given I am logged in as "administrator"
    When I install the extension "pkg_all_relations_project"
    Then I should see "Test Project with Relations" in the "Components" menu
