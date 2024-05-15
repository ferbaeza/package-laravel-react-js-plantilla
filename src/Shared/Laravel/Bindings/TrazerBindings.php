<?php

namespace Baezeta\App\Shared\Laravel\Bindings;

use Illuminate\Contracts\Container\Container;
use Baezeta\App\Dashboard\Infrastructure\Bindings\DashboardBindings;

class TrazerBindings
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    
        protected function singletons(): array
        {
            return array_merge(
                DashboardBindings::register(),
            );
        }

    /**
     * Makes efectively the bindings
     *
     * @return void
     */
    final public function register(): void
    {
        foreach ($this->singletons() as $key => $value) {
            $this->container->singleton($key, $value);
        }
    }

}
