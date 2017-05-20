Feature: Installation
  In order to use the component
  As an administrator
  I need to be able to install the component

  Scenario: Installing component on latest Joomla
    Given there is a fresh instance of "latest Joomla" with database "MySQL 5.5"
    When I install the extension "pkg_all_relations_project"
    Then I should see "Test Project with Relations" in the "Components" menu
