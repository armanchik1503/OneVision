<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

/**
 * Class MicroserviceProvider
 */
class MicroserviceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $config   = $this->getConfig();
        $services = data_get($config, 'services');
        $timeout  = data_get($config, 'http_timeout');


        foreach ($services as $service) {
            if ($this->app->environment() === 'testing') {
                $this->app->singleton(data_get($service, 'abstract'), data_get($service, 'mock'));
            } else {
                $this->app->singleton(data_get($service, 'abstract'), function () use ($timeout, $service) {
                    $concrete = data_get($service, 'concrete');

                    return new $concrete(
                        Http::timeout($timeout),
                        data_get($service, 'host')
                    );
                });
            }
        }
    }

    /**
     * @return array
     */
    private function getConfig(): array
    {
        return config('microservices');
    }
}
