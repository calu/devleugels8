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
        DB::table('users')->insert([
          'name' => 'administrator',
          'email' => 'admin@vleugels.be',
          'password' => bcrypt('vleugels'),
          'admin' => 1
        ]);
        
        factory(\App\Intake::class,15)->create();

        DB::table('mutualities')->insert([
          'naam' => 'Christelijke Mutualiteiten',
         ]);

        DB::table('mutualities')->insert([
          'naam' => 'Bond Moyson',
         ]);

        DB::table('rooms')->insert([
           'kamernummer' => 101,
           'aantal_bedden' => 1,
           'soort' => 1,
           'beschrijving' => 'Deze luxueuse kamer is er voor jou alleen. Je kan er genieten van een prachtig zicht op de omliggende weiden',
           'foto' => 'kamer101.jpg'
        ]);

        DB::table('rooms')->insert([
           'kamernummer' => 102,
           'aantal_bedden' => 3,
           'soort' => 2,
           'beschrijving' => 'In deze kamer kan je samen met je kamergenoot genieten van alle rust',
           'foto' => 'kamer102.jpg'
        ]);

        DB::table('rooms')->insert([
           'kamernummer' => 201,
           'aantal_bedden' => 2,
           'soort' => 2,
           'beschrijving' => 'Samen met je kamergenoot kan je heel activiteiten uitvoeren',
           'foto' => 'kamer201.jpeg'
        ]);

        DB::table('rooms')->insert([
           'kamernummer' => 202,
           'aantal_bedden' => 2,
           'soort' => 3,
           'beschrijving' => 'Geniet van je dag',
           'foto' => 'kamer202.jpeg'
        ]);

    }
}
