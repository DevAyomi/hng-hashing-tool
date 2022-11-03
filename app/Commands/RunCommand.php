<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use function Termwind\{render};
use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;

class RunCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'run {name=Artisan}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'A command to convert csv files to json and back to csv';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $realName = $this->ask("Hello Commrade, What is your name???");
        $name = $this->ask('path to your file Example: "C:\Users\USER\Desktop\gear.csv"');

        $file_array = explode(".", $name);
        $extension = end($file_array);
        
        if($extension !== 'csv'){
            render("Commrade, the file you inputed is not a csv file");
        }

        $file_array = explode(".", $name);
        $file_name = $file_array[0];
        $column_name = array();
        $final_data = array();
        $file_data = file_get_contents($name);
        $data_array = array_map("str_getcsv", explode("\n", $file_data));
        $labels = array_shift($data_array);
        foreach($labels as $label)
        {
           $column_name[] = $label;
        }
        $count = count($data_array) - 1;
        for($j = 0; $j < $count; $j++)
        {
          $data = array_combine($column_name, $data_array[$j]);
          $final_data[$j] = $data;
        }

        $format = array(
           'format' => "CHIP-0007",     
        );
        array_unshift($final_data, $format);
        $jsonData = json_encode($final_data);
        $hash = hash('sha256', $jsonData);
        $backToArray = json_decode($jsonData, true);
        unset($backToArray[0]);

        $count = count($backToArray);
        for($j = 0; $j < $count; $j++)
        {
           $backToArray[$j]['hash'] = $hash;
        }

        $cookedData = json_encode($backToArray);
        $jsonFileName = $file_name.'New'.'.csv';
        $fcsv = fopen($jsonFileName, 'w');
        $array = json_decode($cookedData, true);

        $header = false;
        foreach ($array as $line) { 
            if (empty($header)) {
                $header = array_keys($line);
                fputcsv($fcsv, $header);
                $header = array_flip($header);      
            }
            
            $line_array = array();
            
            foreach($line as $value) {
                array_push($line_array, $value);
            }

            fputcsv($fcsv, $line_array);
        }

        //close CSV file after write
        fclose($fcsv);

        //file_put_contents($jsonFileName, $cookedData);

        header('Content-type: text/plain; charset=UTF-8');


        if(isset($cookedData)){
            render($realName.' '."Congratulations!!! Check the same folder your csv file is located for your new nft coverted file.... Note: 'NEW' will be added no the end of the new file");
        }
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
