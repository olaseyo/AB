<?php
use Faker\Factory;
class BookingFunctionalCest
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
   
    public function canSeeBook(FunctionalTester $I)
    {
        $I->amOnPage('/Booking/Create');
        $I->seeInCurrentUrl('Booking/Create');
    }

   
    public function canView(FunctionalTester $I)
    {
        $I->amOnPage('/Booking/Index');
        $I->seeInCurrentUrl('/Booking/Index');
        $I->seeInSource('Bookings List');
    }

}

