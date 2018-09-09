<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	// Using factory
    	$user = factory(App\User::class, 10)->create()->each(function($user){
    			$user->photos()->save(
    				App\Photo::create([
			    		'file' => 'default.jpeg',
			    		'imageable_id' => $user->id,
			    		'imageable_type' => 'user_photo'
			    	])
    			);
    		}

    	);

    	
 
    }
}
