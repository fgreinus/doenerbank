<?php

use Doenerbank\Models\Order;
use Doenerbank\Models\User;
use Doenerbank\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $fgreinus = User::create([
            'name' => "fgreinus",
            'email' => "florian.greinus@gmail.com",
            'is_admin' => true,
            'password' => bcrypt('test')
        ]);

        Order::create([
            'date' => '2015-02-26',
            'allocated_user' => $fgreinus->id,
            'is_closed' => false
        ]);

        Order::create([
            'date' => '2015-03-05',
            'allocated_user' => $fgreinus->id,
            'is_closed' => false
        ]);

        Article::create([
            'name' => 'Döner-Tasche hänchen',
            'price' => '3.50'
        ]);

        Article::create([
            'name' => 'Döner-Tasche lamm',
            'price' => '3.50'
        ]);

        Article::create([
            'name' => 'Lahmacun',
            'price' => '4.00'
        ]);
	}

}
