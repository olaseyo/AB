<?php
use Faker\Factory;
class DriverFunctionalCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }

    public function getFakers(){
        return Factory::create();
    }
    
    public function canSeeCreate(FunctionalTester $I)
    {
        $I->amOnPage('/Driver/Create');
        $I->seeInCurrentUrl('Driver/Create');
    }

    public function canCreate(FunctionalTester $I)
    {
        $faker = new Faker\Generator();
        $this->getFakers()->addProvider(new Faker\Provider\en_US\Person($faker));
        $this->getFakers()->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
        $I->amOnPage('/User/getRecord/');
        $record = $I->grabTextFrom('.data');
        $I->amOnPage('/Driver/Create');
        $I->fillField('fullname',$this->getFakers()->name);
        $I->fillField('contact',$this->getFakers()->phoneNumber);
        $I->fillField('user_id',$record);
        $I->click('Submit','.btn');
        $I->seeInCurrentUrl('Driver/store');
        $I->seeInSource('Driver created succefully');
    }

    public function canEdit(FunctionalTester $I)
    {
        $faker = new Faker\Generator();
        $this->getFakers()->addProvider(new Faker\Provider\en_US\Person($faker));
        $this->getFakers()->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
        $I->amOnPage('/User/getRecord/');
        $user = $I->grabTextFrom('.data');
        $I->amOnPage('/Driver/getRecord/');
        $record = $I->grabTextFrom('.data');
        $I->amOnPage('/Driver/Edit/'.base64_encode($record));
        $I->fillField('fullname',$this->getFakers()->name);
        $I->fillField('contact',$this->getFakers()->phoneNumber);
        $I->fillField('user_id',$user);
        $I->click('Submit');
        $I->seeInCurrentUrl('/Driver/update');
        $I->seeInSource('Driver update succefully');
    }

    public function canView(FunctionalTester $I)
    {
        $I->amOnPage('/Driver/Index');
        $I->seeInCurrentUrl('/Driver/Index');
        $I->seeInSource('Drivers List');
    }

    public function canDelete(FunctionalTester $I)
    {
        $I->amOnPage('/Driver/getRecord/');
        $record = $I->grabTextFrom('.data');
        $I->amOnPage('/Driver/destroy/'.base64_encode($record));
        $I->seeInSource('Driver deleted succefully');
    }
    
}
