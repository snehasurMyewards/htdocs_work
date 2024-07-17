<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportCommand extends Command
{
    // The name and signature of the console command.
    protected $signature = 'make:export {name}';

    // The console command description.
    protected $description = 'Create a new export class';

    // Execute the console command.
    public function handle()
    {
        $name = $this->argument('name');

        // Here you can add logic to generate an export class.
        // For simplicity, let's just create a basic export class file.

        $classContent = "<?php\n\nnamespace App\Exports;\n\nuse Maatwebsite\Excel\Concerns\FromCollection;\n\nclass $name implements FromCollection\n{\n    public function collection()\n    {\n        return collect([]);\n    }\n}\n";

        $filePath = app_path("Exports/{$name}.php");

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }

        file_put_contents($filePath, $classContent);

        $this->info("Export class {$name} created successfully at {$filePath}");
    }
}
