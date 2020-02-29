<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('courses');
        Storage::deleteDirectory('users');

        Storage::makeDirectory('courses');
        Storage::makeDirectory('users');

        factory(\App\Models\Role::class,1)->create(['name' => 'admin']);
        factory(\App\Models\Role::class,1)->create(['name' => 'teacher']);
        factory(\App\Models\Role::class,1)->create(['name' => 'student']);

        factory(\App\Models\User::class,1)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Models\Role::ADMIN
        ])->each(function(\App\Models\User $u){
            factory(\App\Models\Student::class,1)->create(['user_id' => $u->id]);
        });

        factory(\App\Models\User::class,2)->create()
            ->each(function(\App\Models\User $u){
                factory(\App\Models\Student::class,1)->create(['user_id' => $u->id]);
            });

        factory(\App\Models\User::class,1)->create()
            ->each(function(\App\Models\User $u){
                factory(\App\Models\Student::class,1)->create(['user_id' => $u->id]);
                factory(\App\Models\Teacher::class,1)->create(['user_id' => $u->id]);
            });

        factory(\App\Models\Level::class,1)->create(['name' => 'Beginner']);
        factory(\App\Models\Level::class,1)->create(['name' => 'Intermediate']);
        factory(\App\Models\Level::class,1)->create(['name' => 'Advanced']);
        factory(\App\Models\Category::class,5)->create();

        factory(\App\Models\Course::class,3)
                ->create()
                ->each(function(\App\Models\Course $c){
                     $c->goals()->saveMany(factory(\App\Models\Goal::class,2)->create());
                     $c->requirements()->saveMany(factory(\App\Models\Requirement::class,2)->create());
                });

    }
}
