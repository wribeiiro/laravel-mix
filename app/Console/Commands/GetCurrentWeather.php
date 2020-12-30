<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherService;
use InvalidArgumentException;
use PHPUnit\Util\InvalidArgumentHelper;

class GetCurrentWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:current {location?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get current weather';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $argument = $this->argument('location');

        if ($argument === null) {
            throw new InvalidArgumentException("You must pass {location} argument");
        }

        $weather = new WeatherService($argument);

        dd($weather);
    }
}
