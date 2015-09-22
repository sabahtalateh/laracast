<?php

use Acme\CustomersRepository;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Events\Dispatcher;

class CustomerRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CustomersRepository
     */
    protected $customers;

    public function setUp()
    {
        $this->setUpDatabase();
        $this->migrateTables();

        $this->customers = new CustomersRepository;
    }

    /** @test */
    public function it_fetches_all_customers()
    {
        $result = $this->customers->all();

        $this->assertCount(2, $result);
    }

    /** @test */
    function it_fetches_all_customer_who_match_a_given_specification()
    {
        $results = $this->customers->whoMatch(new \Acme\CustomerIsGold);

        $this->assertCount(1, $results);
    }

    public function migrateTables()
    {
        DB::schema()->create('customers', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('plan');
            $table->timestamps();
        });

        \Acme\Customer::create(['name' => 'Joe', 'plan' => 'gold']);
        \Acme\Customer::create(['name' => 'Jane', 'plan' => 'silver']);
    }

    /**
     * @return DB
     */
    public function setUpDatabase()
    {
        $db = new DB;

        $db->addConnection([
            'driver'   => 'sqlite',
            'database' => ':memory:',
        ]);

        $db->setAsGlobal();
        $db->bootEloquent();
    }
}