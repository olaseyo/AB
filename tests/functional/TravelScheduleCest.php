<?php
use Faker\Factory;
class TravelScheduleFunctionalCest
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
   
    public function canSeeCreate(FunctionalTester $I)
    {
        $I->amOnPage('/TravelSchedule/Create');
        $I->seeInCurrentUrl('TravelSchedule/Create');
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

        $I->amOnPage('/Driver/getRecord/');
        $driver_id = $I->grabTextFrom('.data');
        $I->amOnPage('/Bus/getRecord/');
        $bus_id = $I->grabTextFrom('.data');
        $I->amOnPage('/User/getRecord/');
        $user_id = $I->grabTextFrom('.data');
        $I->amOnPage('/TravelSchedule/Create');
        $starting_point=array('Lagos','Abuja','Ibadan','Akure');
        $destination=array('Calabar','Jos','Aba','Ikare');
        $departure_time=array('09:00:00','12:00:00','15:00:00','18:00:00');
        $I->selectOption('driver_id',$driver_id);
        $I->selectOption('bus_id',$bus_id);
        $I->fillField('starting_point',$starting_point[array_rand($starting_point)]);
        $I->fillField('destination',$destination[array_rand($destination)]);
        $I->fillField('departure_time',$departure_time[array_rand($departure_time)]);
        $I->fillField('estimated_arrival_time',$departure_time[array_rand($departure_time)]);
        $I->fillField('fare_amount',rand(10000,50000));
        $I->fillField('remark',$this->getFakers()->text);
        $I->fillField('user_id',$user_id);
        $I->click('Submit','.btn');
        $I->seeInCurrentUrl('TravelSchedule/Index');
        $I->seeInSource('Schedules List');
    }

   
    public function canView(FunctionalTester $I)
    {
        $I->amOnPage('/TravelSchedule/Index');
        $I->seeInCurrentUrl('/TravelSchedule/Index');
        $I->seeInSource('Schedules List');
    }


    public function canDelete(FunctionalTester $I)
    {
        $I->amOnPage('/TravelSchedule/getRecord/');
        $record = $I->grabTextFrom('.data');
        $I->amOnPage('/TravelSchedule/destroy/'.base64_encode($record).'/'.base64_encode(2).'/'.base64_encode(2));
        //$I->amOnPage('/TravelSchedule/index');
        $I->seeInSource('TravelSchedule deleted succefully');
    }
}

