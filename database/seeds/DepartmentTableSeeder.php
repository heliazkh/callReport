<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'title' => 'Books',
                'children' => [
                    [
                        'title' => 'Comic Book',
                        'children' => [
                            ['title' => 'Marvel Comic Book'],
                            ['title' => 'DC Comic Book'],
                            ['title' => 'Action comics'],
                        ],
                    ],
                ],
            ],
        ];
        foreach($departments as $department)
        {
            \App\Department::create($department);
        }
    }
}
