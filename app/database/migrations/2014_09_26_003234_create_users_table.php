<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('users', function($t){
                   $t -> increments('id');
                   
                   $t -> string('user_name') -> unique();
                   $t -> string('email') -> unique(); 
                   $t -> string('first_name');
                   $t -> string('password_hash');
                   $t -> string('icon');
                   $t -> boolean('is_active');
                   $t -> date('registration_date');
                   $t -> timestamp('created_at');
                   $t -> timestamp('updated_at');
                });
                
                Schema::create('resetrequests', function($t){
                    $t -> increments('id');
                    
                    $t -> integer('user_id');
                    $t -> string('token');
                    $t -> date('date');
                    $t -> boolean('completed');
                    $t -> timestamp('created_at');
                    $t -> timestamp('updated_at');                  
                });
                
                Schema::create('securityquestions', function($t){
                   $t -> increments('id'); 
                   
                   $t -> integer('user_id');
                   $t -> integer('question_id');
                   $t -> integer('question_source_id');
                   $t -> string('answer');
                   $t -> timestamp('created_at');
                   $t -> timestamp('updated_at');
                   });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
                Schema::drop('resetrequests');
                Schema::drop('securityquestions');
	}

}
