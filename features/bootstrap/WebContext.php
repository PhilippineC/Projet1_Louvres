<?php

use \Behat\MinkExtension\Context\MinkContext;

class WebContext extends MinkContext {

    /**
     * @When I wait for :arg1 seconds
     */
    public function iWaitForSeconds($arg1)
    {
        $this->getSession()->wait($arg1*1000);
    }

    /**
     * @When I select a selectable day in datepicker
     */
    public function iSelectASelectableDayInDatepicker()
    {
        $el = $this->getSession()->getPage()->find('css', '#commande_dateVisite');
        $el->mouseOver();
        $el->click();

        $date = $this->getSession()->getPage()->find('css', 'a.ui-state-default');
        $date->click();
    }

}