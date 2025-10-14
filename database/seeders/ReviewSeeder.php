<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::insert([
            [
                'name' => 'Ahmed Ali',
                'phone' => '01012345678',
                'email' => 'ahmed@example.com',
                'subject' => 'Great Service',
                'message' => 'Really impressed with the service and support.',
                'imagepath' => 'asser/img/testimonial-1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mona Hassan',
                'phone' => '01087654321',
                'email' => 'mona@example.com',
                'subject' => 'Amazing Experience',
                'message' => 'The team was professional and friendly. Highly recommended!',
                'imagepath' => 'asser/img/testimonial-2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Khaled Youssef',
                'phone' => '01111222333',
                'email' => 'khaled@example.com',
                'subject' => 'Excellent Work',
                'message' => 'They delivered on time and with high quality. Thank you!',
                'imagepath' => 'asser/img/testimonial-3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sara Ibrahim',
                'phone' => '01234567890',
                'email' => 'sara@example.com',
                'subject' => 'Wonderful Support',
                'message' => 'Customer support was very responsive and helpful.',
                'imagepath' => 'asser/img/testimonial-4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Omar Fathy',
                'phone' => '01599988877',
                'email' => 'omar@example.com',
                'subject' => 'Top Quality',
                'message' => 'I am very satisfied with the results, will work with them again.',
                'imagepath' => 'asser/img/testimonial-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
