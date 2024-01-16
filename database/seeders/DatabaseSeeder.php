<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Department;
use App\Models\EmployeeStatus;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // insert countries
        Country::insert(config('arrays.countries'));

        // insert base currencies
        //Currency::insert(config('arrays.currencies'));


        /////////////////////////////////
        // make 3 users
        User::factory(3)->create();


        /////////////////////////////////
        // make departments
        Department::factory(7)->create();

        /////////////////////////////////
        // make status
        EmployeeStatus::factory(7)->create();

        /////////////////////////////////
        // make multiple employees and
        // related tables
        $employees = Employee::factory(10)
            ->hasContacts(1)
            ->hasAwards(rand(0, 3))
            ->hasDesignations(rand(1, 5))
            ->hasEmploymentHistories(2)
            ->hasBankingInformation(1)
            ->hasEmergencyContacts(2)
            ->hasPersonalInformation(1)
            ->hasIdentificationDocuments(1)
            ->hasCertificateLicenses(2)
            ->hasEducationalInformation(3)
            ->hasTrainings(5)
            ->hasPerformanceRecords(2)
            ->hasLanguageSpokens(2)
            ->hasSkillAndInterests(5)
            ->hasPhotographs(2)
            ->hasAnnouncements(rand(0, 4))
            ->create();


        /////////////////////////////////
        // change details of the 1st user
        $user = User::find(1);
        $user->update([
            'name' => 'Chuks Anoshiri',
            'email' => 'chuks@ecleaps.com'
        ]);

        // Generate policies and permissions
        //Artisan::call('permissions:sync', ['--clean' => true]);
        //Artisan::call('permissions:sync', ['--oep' => true]);


        // Create the Super Admin role
        Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);

        // Assign the Super Admin role to our first user
        $user->assignRole('Super Admin');
    }
}
