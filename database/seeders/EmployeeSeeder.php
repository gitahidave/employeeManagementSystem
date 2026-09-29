<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate existing records to avoid duplicate unique key errors on re-run
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Employee::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $employees = [
            [
                'first_name'   => 'John',
                'last_name'    => 'Doe',
                'email'        => 'john.doe@example.com',
                'phone_number' => '+254711223344',
                'gender'       => 'Male',
                'hire_date'    => '2022-01-15',
                'department'   => 'Engineering',
                'salary'       => 85000.00,
            ],
            [
                'first_name'   => 'Jane',
                'last_name'    => 'Smith',
                'email'        => 'jane.smith@example.com',
                'phone_number' => '+254722334455',
                'gender'       => 'Female',
                'hire_date'    => '2021-06-10',
                'department'   => 'Human Resources',
                'salary'       => 65000.00,
            ],
            [
                'first_name'   => 'Alex',
                'last_name'    => 'Johnson',
                'email'        => 'alex.johnson@example.com',
                'phone_number' => '+254733445566',
                'gender'       => 'Other',
                'hire_date'    => '2023-03-01',
                'department'   => 'Finance',
                'salary'       => 72000.00,
            ],
            [
                'first_name'   => 'Mary',
                'last_name'    => 'Wanjiku',
                'email'        => 'mary.wanjiku@example.com',
                'phone_number' => '+254744556677',
                'gender'       => 'Female',
                'hire_date'    => '2020-11-20',
                'department'   => 'Engineering',
                'salary'       => 95000.00,
            ],
            [
                'first_name'   => 'David',
                'last_name'    => 'Ochieng',
                'email'        => 'david.ochieng@example.com',
                'phone_number' => '+254755667788',
                'gender'       => 'Male',
                'hire_date'    => '2022-08-12',
                'department'   => 'Marketing',
                'salary'       => 58000.00,
            ],
            [
                'first_name'   => 'Grace',
                'last_name'    => 'Muthoni',
                'email'        => 'grace.muthoni@example.com',
                'phone_number' => '+254766778899',
                'gender'       => 'Female',
                'hire_date'    => '2019-04-05',
                'department'   => 'Finance',
                'salary'       => 88000.00,
            ],
            [
                'first_name'   => 'Brian',
                'last_name'    => 'Kipchumba',
                'email'        => 'brian.kipchumba@example.com',
                'phone_number' => '+254777889900',
                'gender'       => 'Male',
                'hire_date'    => '2023-01-10',
                'department'   => 'Operations',
                'salary'       => 50000.00,
            ],
            [
                'first_name'   => 'Sarah',
                'last_name'    => 'Hassan',
                'email'        => 'sarah.hassan@example.com',
                'phone_number' => '+254788990011',
                'gender'       => 'Female',
                'hire_date'    => '2021-09-18',
                'department'   => 'Marketing',
                'salary'       => 62000.00,
            ],
            [
                'first_name'   => 'Kevin',
                'last_name'    => 'Mwangi',
                'email'        => 'kevin.mwangi@example.com',
                'phone_number' => '+254799001122',
                'gender'       => 'Male',
                'hire_date'    => '2022-05-25',
                'department'   => 'Engineering',
                'salary'       => 78000.00,
            ],
            [
                'first_name'   => 'Lucy',
                'last_name'    => 'Achieng',
                'email'        => 'lucy.achieng@example.com',
                'phone_number' => '+254700112233',
                'gender'       => 'Female',
                'hire_date'    => '2020-02-14',
                'department'   => 'Human Resources',
                'salary'       => 67000.00,
            ],
            [
                'first_name'   => 'Peter',
                'last_name'    => 'Njoroge',
                'email'        => 'peter.njoroge@example.com',
                'phone_number' => '+254711335577',
                'gender'       => 'Male',
                'hire_date'    => '2023-07-01',
                'department'   => 'Operations',
                'salary'       => 53000.00,
            ],
            [
                'first_name'   => 'Faith',
                'last_name'    => 'Chebet',
                'email'        => 'faith.chebet@example.com',
                'phone_number' => '+254722446688',
                'gender'       => 'Female',
                'hire_date'    => '2021-12-01',
                'department'   => 'Finance',
                'salary'       => 79000.00,
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}