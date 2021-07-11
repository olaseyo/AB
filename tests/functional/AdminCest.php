<?php
use Faker\Factory;
class AdminFunctionalCest
{
    public function _before(FunctionalTester $I)
    {
    }
    public function getFakers(){
        return Factory::create();
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


    public function canUserCantLogin(FunctionalTester $I)
    {   
        $I->amGoingTo('submit user form with invalid values');
        $I->amOnPage('/');
        $I->fillField('username', 'AkamigaNoShanks');
        $I->fillField('password', 'admin');
        $I->click('login_btn');
        $I->seeInSource('Login Failed. Please Check your credentials and try again');
    }

    public function canSeeCreateUser(FunctionalTester $I)
    {
        $I->amOnPage('/User/Create');
        $I->seeInCurrentUrl('/User/Create');
    }
    
 

    public function canEditUser(FunctionalTester $I)
    {
        $faker = new Faker\Generator();
        $this->getFakers()->addProvider(new Faker\Provider\en_US\Person($faker));
        $this->getFakers()->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
        $I->amOnPage('/User/getRecord/');
        $record = $I->grabTextFrom('.data');
        $I->amOnPage('/User/Edit/'.base64_encode($record));
        $I->fillField('username',$this->getFakers()->firstName);
        $I->fillField('fullname',$this->getFakers()->name);
        $I->fillField('email',$this->getFakers()->email);
        $I->fillField('contact',$this->getFakers()->phoneNumber);
        $I->selectOption('status', 'Active');
        $I->selectOption('is_admin', '0');
        $I->fillField('id', '7');
        $I->click('Submit');
        $I->seeInCurrentUrl('/User/Index');
        $I->amOnPage('/user/index');
        $I->seeInSource('Users List');
    }

    public function canViewUser(FunctionalTester $I)
    {
        $I->amOnPage('/User/Index');
        $I->seeInCurrentUrl('/User/Index');
        $I->seeInSource('Users List');
    }
    
}
