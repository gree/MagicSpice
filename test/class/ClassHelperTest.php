<?php

namespace MagicSpice;

use MagicSpice\Dummy\Birthday;
use MagicSpice\Dummy\Event;
use MagicSpice\Dummy\LoosePerson;
use MagicSpice\Dummy\Person;
use MagicSpice\Dummy\SettablePerson;
use MagicSpice\Dummy\StrictPerson;

class ClassHelperTest extends \PHPUnit_Framework_TestCase
{
    public function testPerson()
    {
        $person = new Person(['name' => 'john', 'age' => 18]);
        $this->assertSame('john', $person->getName());
        $this->assertSame(18, $person->getAge());
    }

    public function testSettablePerson()
    {
        $person = new SettablePerson(['name' => 'john', 'age' => 18]);
        $this->assertSame('john', $person->getName());
        $this->assertSame(18, $person->getAge());
        $this->assertSame(null, $person->getAddress());

        $person->setName('jane');
        $this->assertSame('jane', $person->getName());
        $this->assertSame(18, $person->getAge());
        $this->assertSame(null, $person->getAddress());

        $person->setAge(16);
        $this->assertSame('jane', $person->getName());
        $this->assertSame(16, $person->getAge());
        $this->assertSame(null, $person->getAddress());

        $person->setAddress('San Francisco, CA');
        $this->assertSame('jane', $person->getName());
        $this->assertSame(16, $person->getAge());
        $this->assertSame('San Francisco, CA', $person->getAddress());
    }

    public function testStrictPerson()
    {
        $person = new StrictPerson(['name' => 'Christopher', 'age' => 13]);
        $this->assertSame('Christophe', $person->getName());
        $this->assertSame(13, $person->getAge());

        $person = new StrictPerson(['name' => 'Christiana', 'age' => 15]);
        $this->assertSame('Christiana', $person->getName());
        $this->assertSame(15, $person->getAge());
    }

    public function testLoosePerson()
    {
        $person = new LoosePerson(['name' => 120, 'age' => '18', 'address' => 'San Francisco, CA']);
        $this->assertSame('120', $person->getName());
        $this->assertSame(18, $person->getAge());
        $this->assertSame('San Francisco, CA', $person->getAddress());
    }

    public function testBirthday()
    {
        $birthday = new Birthday(['year' => 1985, 'month' => 10, 'day' => 15]);
        $this->assertSame(1985, $birthday->getYear());
        $this->assertSame(10, $birthday->getMonth());
        $this->assertSame(15, $birthday->getDay());

        $birthday = new Birthday(['year' => 2000, 'month' => 2, 'day' => 30]);
        $this->assertSame(2000, $birthday->getYear());
        $this->assertSame(2, $birthday->getMonth());
        $this->assertSame(29, $birthday->getDay());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage eighteen can not convert to int.
     */
    public function testFailLoosePerson()
    {
        new LoosePerson(['name' => 120, 'age' => 'eighteen', 'address' => 'San Francisco, CA']);
    }

    public function testEvent()
    {
        $date = new \DateTime();
        $event = new Event(['name' => 'party!', 'date' => $date]);
        $this->assertSame('party!', $event->getName());
        $this->assertSame($date, $event->getDate());
    }
}
