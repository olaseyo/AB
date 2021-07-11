<?php
use Faker\Factory;
class BusFunctionalCest
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
        $I->amOnPage('/Bus/Create');
        $I->seeInCurrentUrl('Bus/Create');
    }

    public function canCreate(FunctionalTester $I)
    {
        $faker = new Faker\Generator();
        $this->getFakers()->addProvider(new Faker\Provider\en_US\Person($faker));
        $this->getFakers()->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
        $I->amOnPage('/User/getRecord/');
        $record = $I->grabTextFrom('.data');
        $I->amOnPage('/Bus/Create');
        $cars=array('Toyota','Mazda','Innoson','Marcopolo');
        $class=array('Executive','Regular','First Class');
        $reg_no=array('LG 087 OO','AJ 001 GB','OY 123 OK','KG 145 AY');
        $car=$cars[array_rand($cars)];
        $I->fillField('name',$car);
        $I->fillField('class',$class[array_rand($class)]);
        $I->fillField('reg_no',$reg_no[array_rand($reg_no)]);
        $I->fillField('total_seat',rand(15,50));
        $I->fillField('user_id',$record);
        $I->click('Submit','.btn');
        $I->seeInCurrentUrl('Bus/store');
        $I->seeInSource('Bus created succefully');
    }

    public function canEdit(FunctionalTester $I)
    {
        $faker = new Faker\Generator();
        $this->getFakers()->addProvider(new Faker\Provider\en_US\Person($faker));
        $this->getFakers()->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
        $I->amOnPage('/User/getRecord/');
        $user = $I->grabTextFrom('.data');
        $I->amOnPage('/Bus/getRecord/');
        $record = $I->grabTextFrom('.data');
        $I->amOnPage('/Bus/Create');
        $cars=array('Toyota','Mazda','Innoson','Marcopolo');
        $class=array('Executive','Regular','First Class');
        $reg_no=array('LG 087 OO','AJ 001 GB','OY 123 OK','KG 145 AY');
        $I->amOnPage('/Bus/Edit/'.base64_encode($record));
        $I->fillField('name',$cars[array_rand($cars)]);
        $I->fillField('class',$class[array_rand($class)]);
        $I->fillField('reg_no',$reg_no[array_rand($reg_no)]);
        $I->fillField('total_seat',rand(15,50));
        $I->fillField('user_id',$user);
        $I->click('Submit');
        $I->seeInCurrentUrl('/Bus/update');
        $I->seeInSource('Bus update succefully');
    }

    public function canView(FunctionalTester $I)
    {
        $I->amOnPage('/Bus/Index');
        $I->seeInCurrentUrl('/Bus/Index');
        $I->seeInSource('Buses List');
    }

    public function canDelete(FunctionalTester $I)
    {
        $I->amOnPage('/Bus/getRecord/');
        $record = $I->grabTextFrom('.data');
        $I->amOnPage('/Bus/destroy/'.base64_encode($record));
        $I->seeInSource('Bus deleted succefully');
    }
    
}
