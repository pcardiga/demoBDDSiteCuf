<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/

class AcceptanceTester extends \Codeception\Actor
{
    public static $URL = "/";
    public static $cookieButton = 'body > div.tk-cookie-container.col-md-12.col-sm-12.col-xs-12 > div.col-md-2.col-sm-2.col-xs-2 > button';
    public static $menuArea = '#block-menuprincipalsaudecuf > div > div.collapse.navbar-collapse.js-navbar-collapse';

    public static $bannerArea = '#views_slideshow_cycle_div_banner_home_page-block_1_0 > div > div.views-field.views-field-field-image > div > a > div';
    public static $marcacoesArea = '#page > div.container-fluid > div > div.container > div > div > div';
    public static $encontreUmDoctorArea = '#block-finddoctor';
    public static $temposDeEsperaArea = '#block-views-block-artigos-saude-homepage-block-1 > div > div > div.BannerTempoEspera.TempoEsperaContainer';
    public static $artigosSaudeArea = '#block-views-block-artigos-saude-homepage-block-1 > div > div > div.container > div';
    public static $historiasMarcantesArea = '#views_slideshow_cycle_div_banner_historias_marcantes_saudecuf-block_1_0 > div > div.views-field.views-field-field-quote > div > a > div';
    public static $eventosArea = '#block-views-block-eventos-homepage-block-1 > div > div';

    use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */

    /**
     * @Given I accept site cookies
     */
    public function iAcceptSiteCookies()
    {
        $this->click(self::$cookieButton);
    }

    /**
     * @Given I am on the homepage
     */
    public function iAmOnTheHomepage()
    {
        $this->amOnPage(self::$URL);
    }
   
    /**
     * @Given I access CUFSaude homepage
     */
    public function iAccessCUFSaudeHomepage()
    {
        $this->amOnPage(self::$URL);
    }

    /**
     * @Then I see menus
     */
    public function iSeeMenus(\Behat\Gherkin\Node\TableNode $table)
    {
        foreach ($table as $row) {
            foreach ($row as $key => $value) {
                $this->see($value, self::$menuArea);
            }
        }
    }

    /**
     * @When I click +Saúde Menu
     */
    public function iClickSadeMenu()
    {
        $this->click(self::$menuArea);
    }

   /**
    * @Then I should go to the following links if I click the Menu Option
    */
    public function iShouldGoToTheFollowingLinksIfIClickTheMenuOption(\Behat\Gherkin\Node\TableNode $table)
    {
        $saudeMenu = '#block-menuprincipalsaudecuf > div > div.collapse.navbar-collapse.js-navbar-collapse > ul > li:nth-child(1) > a';

        foreach ($table as $row) {
            $this->amOnPage(self::$URL);
            $this->click($saudeMenu);
            $this->click($row['Menu Option']);
            $this->wait(1);
            $this->seeCurrentUrlEquals($row['Links']);
        }
    }


   /**
    * @Then I see the areas
    */
    public function iSeeTheAreas(\Behat\Gherkin\Node\TableNode $table)
    {
        foreach ($table as $row) {
            foreach ($row as $key => $value) {
                switch ($value) {
                    case 'Banner':
                        $this->seeElement(self::$bannerArea);
                        break;
                    case 'Marcações':
                        $this->seeElement(self::$marcacoesArea);
                        break;
                    case 'Encontre um médico':
                        $this->seeElement(self::$encontreUmDoctorArea);
                        break;
                    case 'Tempos de Espera':
                        $this->seeElement(self::$temposDeEsperaArea);
                        break;
                    case 'Artigos de Saúde':
                        $this->seeElement(self::$artigosSaudeArea);
                        break;
                    case 'Histórias Marcantes':
                        $this->seeElement(self::$historiasMarcantesArea);
                        break;
                    case 'Eventos':
                        $this->seeElement(self::$eventosArea);
                        break;
                }
            }
        }
    }

    /**
     * @Given I search for doctor by :arg1 using :arg2
    */
    public function iSearchForDoctorByUsing($arg1, $arg2)
    {
        $l_editboxName = '#edit-name';
        $l_editboxDisease = '#edit-disease';
        $l_editbox = '';
        switch ($arg1) {
            case 'Name':
                $l_editbox = $l_editboxName;
                break;
            case 'Disease':
                $l_editbox = $l_editboxDisease;
                break;
        }
        $this->fillField($l_editbox, $arg2);
    }

   /**
    * @When I press search :arg1 button
    */
    public function iPressSearchButton($arg1)
    {
        $l_ButtonPesquisaName = '#finddoctor > div:nth-child(1) > div:nth-child(1) > div > a > i';
        $l_ButtonPesquisaDisease = '#finddoctor > div:nth-child(1) > div:nth-child(2) > div > a > i';
        $l_ButtonPesquisa = '';
        switch ($arg1) {
            case 'Nome':
                $l_ButtonPesquisa = $l_ButtonPesquisaName;
                break;
            case 'Disease':
                $l_ButtonPesquisa = $l_ButtonPesquisaDisease;
                break;
        }
        $this->click($l_ButtonPesquisa);
    }

   /**
    * @Then I should see the folliwing information about the doctor
    */
    public function iShouldSeeTheFolliwingInformationAboutTheDoctor(\Behat\Gherkin\Node\TableNode $table)
    {
        $nome_field = '#content > section > div > div.views-element-container > main > div:nth-child(1) > div:nth-child(3) > div > article > div > div.row.tk-Medico_MiniPerfil > div:nth-child(2) > div:nth-child(1) > a';
        $especialidade_field = '#content > section > div > div.views-element-container > main > div:nth-child(1) > div:nth-child(3) > div > article > div > div.row.tk-Medico_MiniPerfil > div:nth-child(2) > div:nth-child(3)';
        $unidadesCuf_field = '#content > section > div > div.views-element-container > main > div:nth-child(1) > div:nth-child(3) > div > article > div > div.row.tk-Medico_MiniPerfil > div:nth-child(2) > div:nth-child(7)';
        $idiomasEstrangeiros_field = '#content > section > div > div.views-element-container > main > div:nth-child(1) > div:nth-child(3) > div > article > div > div.row.tk-Medico_MiniPerfil > div:nth-child(2) > div:nth-child(9)';

        $this->waitForElement('#tk-search-doctor-results');
        foreach ($table as $row) {
            foreach ($row as $key => $value) {
                switch ($key) {
                    case 'Nome':
                        $this->see($value, $nome_field);
                        break;
                    case 'Especialidade':
                        $this->see($value, $especialidade_field);
                        break;
                    case 'Unidades CUF':
                        $this->see($value, $unidadesCuf_field);
                        break;
                    case 'Idiomas Estrangeiros':
                        $this->see($value, $idiomasEstrangeiros_field);
                        break;
                }
            }
        }
    }

   /**
    * @Then I should see the following doctors in the first Page
    */
    public function iShouldSeeTheFollowingDoctorsInTheFirstPage(\Behat\Gherkin\Node\TableNode $table)
    {
        $this->waitForElement('#tk-search-doctor-results');
        foreach ($table as $row) {
            foreach ($row as $key => $value) {
                $this->see($value);
            }
        }
    }
}
