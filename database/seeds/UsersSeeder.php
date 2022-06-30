<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Membuat role admin
      $adminRole = new Role();
      $adminRole->name = "admin";
      $adminRole->display_name = "Admin";
      $adminRole->save();
      // Membuat role member
      $memberRole = new Role();
      $memberRole->name = "member";
      $memberRole->display_name = "Member";
      $memberRole->save();
      // Membuat sample admin
      $admin = new User();
      $admin->name = 'Admin AppReport';
      $admin->email = 'admin@gmail.com';
      $admin->password = bcrypt('adminadmin');
      $admin->level  = 'admin';
      $admin->id_perusahaan = '00';
      $admin->save();
      $admin->attachRole($adminRole);
      // Membuat sample member
      $member = new User();
      $member->name = "Member PT. Kaleda";
      $member->email = 'member@gmail.com';
      $member->password = bcrypt('membermember');
      $member->level  = 'member';
      $member->id_perusahaan  = '2';
      $member->save();
      $member->attachRole($memberRole);
    }
}
