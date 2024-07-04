<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Lesson;
use App\Models\NotableLessons;
use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ahmet Kürşat',
            'studentNumber' => '2266011',
            'password' => Hash::make('password'),
            "role" => "student",
            "department" => "1",
            "email" => "student@gmail.com",
        ]);

        User::factory()->create([
            "name" => "Admin Ali",
            "studentNumber" => "admin",
            "password" => Hash::make("password"),
            "role" => "admin",
            "email" => "admin@gmail.com",

        ]);

        User::factory()->create([
            "name" => "Kadir Haltaş",
            "studentNumber" => "teacher",
            "password" => Hash::make("password"),
            "role" => "teacher",
            "department" => "1",
            "email" => "teacher@gmail.com",
        ]);

        Department::factory()->create([
            "name" => "Bilgisayar Programciligi",
            "lesson" => "1",
        ]);

        Department::factory()->create([
            "name" => "Grafik Tasarim",
            "lesson" => "2",
        ]);

        Department::factory()->create([
            "name" => "Elektronik ve Otomasyon",
            "lesson" => "3",
        ]);

        Lesson::factory()->create([
            "name" => "Programlama Temelleri",
            "teacher" => "3",
            "time" => "09:00",
            "weekday" => "1",
            "department" => "1"
        ]);

        Lesson::factory()->create([
            "name" => "Mobil Proglama",
            "teacher" => "3",
            "time" => "09:00",
            "weekday" => "4",
            "department" => "1"

        ]);

        Lesson::factory()->create([
            "name" => "Grafik Tasarim",
            "teacher" => "3",
            "time" => "10:00",
            "weekday" => "2",
            "department" => "1"
        ]);


        Lesson::factory()->create([
            "name" => "Grafik Tasarim",
            "teacher" => "3",
            "time" => "10:00",
            "weekday" => "5",
            "department" => "1"
        ]);

        Lesson::factory()->create([
            "name" => "Elektronik Devreler",
            "teacher" => "3",
            "time" => "13:00",
            "weekday" => "3",
            "department" => "1"

        ]);
        Lesson::factory()->create([
            "name" => "Elektronik Devreler",
            "teacher" => "3",
            "time" => "13:00",
            "weekday" => "1",
            "department" => "1"
        ]);


        Announcement::factory()->create([
            "text" => "Duyuru metni 1",
            "department" => "1",
            "teacher" => "3",
        ]);
        Announcement::factory()->create([
            "text" => "Duyuru metni 2",
            "department" => "1",
            "teacher" => "3",
        ]);
        Announcement::factory()->create([
            "text" => "Duyuru metni 3",
            "department" => "2",
            "teacher" => "3",
        ]);


    }
}
