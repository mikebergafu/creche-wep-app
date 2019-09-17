<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class)->create(
            [
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('123456'),
                'fullname' => 'Jame K. Mensah',
                'position' => 'Chief Tech Officer',
                'username' => 'jmensah',
                'role' => 'super admin'
            ]);
        $user = factory(App\User::class)->create([
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'fullname' => 'Seth Agya',
                'position' => 'Admintration Officer',
                'username' => 'setha',
                'role' => 'admin'
            ]);
        $user = factory(App\User::class)->create([
                'email' => 'caretaker@gmail.com',
                'password' => bcrypt('123456'),
                'fullname' => 'Mabel Ugah',
                'position' => 'Chief Caretaker',
                'username' => 'mabelu',
                'role' => 'caretaker'
            ]);
        $user = factory(App\User::class)->create([
            'email' => 'taker@gmail.com',
            'password' => bcrypt('123456'),
            'fullname' => 'James Ugah',
            'position' => 'Chief Caretaker',
            'username' => 'jabelu',
            'role' => 'caretaker'
        ]);
        $user = factory(App\User::class)->create([
            'email' => 'parent@gmail.com',
            'password' => bcrypt('123456'),
            'fullname' => 'Alan Maker',
            'position' => '',
            'username' => 'aalan',
            'role' => 'parent'
        ]);
    }
}
