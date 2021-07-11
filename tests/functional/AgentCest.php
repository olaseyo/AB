<?php

class AgentFunctionalCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }
    public function loginPageWorks(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('Please Login to your Account');
    }

}
