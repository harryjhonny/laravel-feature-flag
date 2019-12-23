<?php

namespace Harryjhonny\FeatureFlags\Commands;

use Illuminate\Console\Command;
use Harryjhonny\FeatureFlags\Facades\Features;

class SwitchOnFeature extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feature:on {feature}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Switches a specified feature flag on';

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
     * @return mixed
     * @throws \ErrorException
     */
    public function handle()
    {
        $feature = $this->argument('feature');

        if (is_null($feature) || is_array($feature)) {
            throw new \ErrorException('Feature argument must be a string');
        }

        Features::turnOn($feature);

        $this->line(
            sprintf(
                'Feature `%s` has been turned on',
                $feature
            )
        );
    }
}
