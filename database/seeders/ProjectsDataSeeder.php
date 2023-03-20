<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate();
        $targets = [
            ["file" => "csv/projects.csv", "table" => "projects", "key_columns" => ["name_en", "name_jp_1", "name_jp_2", "project_code"]],
        ];
        foreach ($targets as $target) {
            if(\DB::table($target['table'])->count() > 0) {
                echo $target['file']. " already done \n";
                continue;
            }
            echo $target['file']." START \n";
            $file = new \SplFileObject(database_path($target['file']));
            $file->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
            );
            $headers = [];

            foreach ($file as $i => $line) {
            if ($i === 0) {
                $headers = $line;
                continue;
            }

            // ['name' => 'taro'] のようにヘッダ行とデータ行を結合
            $values = array_combine($headers, $line);

            $search = [];
            foreach ($target['key_columns'] as $key_column) {
                $search[$key_column] = $values[$key_column];
            }
            // 'name' で検索し、レコードが無ければ作成、有れば更新
            \DB::table($target['table'])->updateOrInsert(
                $search,
                Arr::except($values, $target['key_columns'])
            );
            }
        }
    }
}
