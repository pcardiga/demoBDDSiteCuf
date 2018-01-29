Feature: HomePage
In order to view CUF Homepage
As a visitor
I need to be able to interact with all homepage elements

  Background: Access homepage and Accept cookies
    Given I access CUFSaude homepage

  Scenario: Verify the presence of menus
    Given I am on the homepage
    Then I see menus
      | Menus               |
      | + SAÚDE             |
      | MARCAÇÕES           |
      | ÁREAS CLÍNICAS      |
      | CLIENTES            |
      | ACORDOS E PARCEIROS |
      | PROFISSIONAIS       |
      | CUF                 |

  Scenario: Verify options on "+ Saúde" link
    Given I am on the homepage
    When I click +Saúde Menu
    Then I should go to the following links if I click the Menu Option
      | Menu Option               | Links                                |
      | Doenças A-Z               | /mais-saude/doencas-a-z              |
      | +65                       | /mais-saude/mais65                   |
      | Alergias                  | /mais-saude/alergias                 |
      | Alimentação               | /mais-saude/alimentacao              |
      | Bebés e Crianças          | /mais-saude/bebes-e-criancas         |
      | Bem-Estar                 | /mais-saude/bem-estar                |
      | Cancro                    | /mais-saude/cancro                   |
      | Coração                   | /mais-saude/coracao                  |
      | Desporto                  | /mais-saude/desporto                 |
      | Doenças Crónicas          | /mais-saude/doencas-cronicas         |
      | Dor                       | /mais-saude/dor                      |
      | Gravidez                  | /mais-saude/gravidez                 |
      | Gripes e Constipações     | /mais-saude/gripes-e-constipacoes    |
      | Olhos                     | /mais-saude/olhos                    |
      | Ouvidos, Nariz e Garganta | /mais-saude/ouvidos-nariz-e-garganta |
      | Pele                      | /mais-saude/pele                     |
      | Saúde Mental              | /mais-saude/saude-mental             |
      | Ver todas as categorias   | /mais-saude                          |

  Scenario: Verify the presence of diferent areas in homepage
    Given I am on the homepage
    Then I see the areas
      | Areas               |
      | Banner              |
      | Marcações           |
      | Encontre um médico  |
      | Tempos de Espera    |
      | Artigos de Saúde    |
      | Histórias Marcantes |
      | Eventos             |

  Scenario: Find a doctor in "Encontre um Médico" área by doctors name
    Given I search for doctor by "Name" using "Abel Garcia Abejas"
    When I press search "Nome" button
    Then I should see the folliwing information about the doctor
      | Nome               | Especialidade             | Unidades CUF             | Idiomas Estrangeiros       |
      | Abel Garcia Abejas | Medicina Geral e Familiar | CUF Descobertas Hospital | Espanhol, Inglês, Italiano |

  Scenario: Find a doctor in "Encontre um Médico" área by disease
    Given I search for doctor by "Disease" using "Acne"
    When I press search "Disease" button
    Then I should see the following doctors in the first Page
      | Doctors                |
      | Alexandra Santa Marta  |
      | Alexandre João         |
      | Ana Isabel Gouveia     |
      | Ana Marques Brasileiro |
      | Ana Rita Travassos     |
      | Baptista Rodrigues     |
      | Carlos Ruiz Garcia     |
      | Cristina Martinez      |
      | Daniela Cunha          |
      | Goreti Catorze         |

  # Scenario: Find a doctor filling two search criterias
  #   Given I search for doctor by "Name" using "Abel Garcia Abejas"
  #   And I search for doctor by "Disease" using "Acne"
  #   When I press search "Disease" button
  #   Then I should see the following doctors in the first Page
  #     | Doctors                |
  #     | Alexandra Santa Marta  |
  #     | Alexandre João         |
  #     | Ana Isabel Gouveia     |
  #     | Ana Marques Brasileiro |
  #     | Ana Rita Travassos     |
  #     | Baptista Rodrigues     |
  #     | Carlos Ruiz Garcia     |
  #     | Cristina Martinez      |
  #     | Daniela Cunha          |
  #     | Goreti Catorze         |

