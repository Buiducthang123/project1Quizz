<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path("seeders/test1.csv");
        $file = fopen($csvFile, 'r');
        $header = fgetcsv($file); // Bỏ qua dòng tiêu đề trong file CSV

        while (($data = fgetcsv($file)) !== false) {
            Question::create([
                'test_id'=>1,
                'QuestionContent' => $data[0].'',
                'OptionA' => $data[1].'',
                'OptionB' => $data[2].'',
                'OptionC' => $data[3].'',
                'OptionD' => $data[4].'',
                'CorrectOption'=>$data[5].''
                // Chèn các trường khác tương ứng với dữ liệu trong file CSV
            ]);
        }

        fclose($file);
    }
}
