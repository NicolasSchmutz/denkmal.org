<?php

class Denkmal_Paging_Message_VenueTest extends CMTest_TestCase {

    public function tearDown() {
        CMTest_TH::clearEnv();
    }

    public function testGetItems() {
        $venue1 = Denkmal_Model_Venue::create('Example 1', true, false);
        $venue2 = Denkmal_Model_Venue::create('Example 2', true, false);

        $message1 = Denkmal_Model_Message::create($venue1, 'client', 'Foo 1', null, new DateTime('2010-01-01'));
        $message2 = Denkmal_Model_Message::create($venue1, 'client', 'Foo 2', null, new DateTime('2010-01-02'));
        $message3 = Denkmal_Model_Message::create($venue2, 'client', 'Foo 3', null, new DateTime('2010-01-03'));

        $paging = new Denkmal_Paging_Message_Venue($venue1);
        $this->assertEquals(array($message2, $message1), $paging);

        $message4 = Denkmal_Model_Message::create($venue1, 'client', 'Foo 4');
        $paging = new Denkmal_Paging_Message_Venue($venue1);
        $this->assertEquals(array($message4, $message2, $message1), $paging);

        $message2->delete();
        $paging = new Denkmal_Paging_Message_Venue($venue1);
        $this->assertEquals(array($message4, $message1), $paging);
    }

    public function testGetItemsChangeVenue() {
        $venue1 = Denkmal_Model_Venue::create('Example 1', true, false);
        $venue2 = Denkmal_Model_Venue::create('Example 2', true, false);

        $message1 = Denkmal_Model_Message::create($venue1, 'client', 'Foo 1');

        $this->assertEquals(array($message1), new Denkmal_Paging_Message_Venue($venue1));
        $this->assertEquals(array(), new Denkmal_Paging_Message_Venue($venue2));

        $message1->setVenue($venue2);

        $this->assertEquals(array(), new Denkmal_Paging_Message_Venue($venue1));
        $this->assertEquals(array($message1), new Denkmal_Paging_Message_Venue($venue2));
    }
}
