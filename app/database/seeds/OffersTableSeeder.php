<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use pro\gateways\ProjectGateway;
use pro\gateways\UserGateway;

class OffersTableSeeder extends Seeder {

	public function __construct(ProjectGateway $Projectgateway,UserGateway $UserGateway) {
		$this->Projectgateway = $Projectgateway;
		$this->UserGateway = $UserGateway;
	}

	public function run()
	{
		$faker = Faker::create();

		$projects = $this->Projectgateway->all(100)->toArray();
		$projects = array_fetch($projects['data'],'id');
		
		$users = $this->UserGateway->getUsersWhere([['type',1]])->toArray();
		$users = array_fetch($users,'id');

		foreach(range(1, 50) as $index)
		{
			if($faker->numberBetween(1,100)<5){
				Offer::create([
					'price' => $faker->randomFloat(2,0,1000000),
					'currency' => $faker->numberBetween(1,3),
					'project_id' => $faker->randomElement($projects),
					'message' => $faker->paragraph($faker->numberBetween(3,8)),
					'user_id' => $faker->randomElement($users),
					'status' => 3,
					'feedback' => $faker->paragraph($faker->numberBetween(1,5))
				]);
			} else {
				Offer::create([
					'price' => $faker->randomFloat(2,0,1000000),
					'currency' => $faker->numberBetween(1,3),
					'project_id' => $faker->randomElement($projects),
					'message' => $faker->paragraph($faker->numberBetween(3,8)),
					'user_id' => $faker->randomElement($users),
					'status' => $faker->randomElement([1,1,1,1,1,1,1,1,1,1,1,2,2,2])
				]);
			}
		}
	}

}