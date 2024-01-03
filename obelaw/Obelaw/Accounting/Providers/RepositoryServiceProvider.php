<?php

namespace Obelaw\Accounting\Providers;

use Obelaw\Accounting\Lib\Repositories\AccountRepositoryInterface;
use Obelaw\Accounting\Lib\Repositories\Eloquent\AccountRepository;
use Obelaw\Accounting\Lib\Repositories\Eloquent\EntryRepository;
use Obelaw\Accounting\Lib\Repositories\Eloquent\PriceListRepository;
use Obelaw\Accounting\Lib\Repositories\EntryRepositoryInterface;
use Obelaw\Accounting\Lib\Repositories\PriceListRepositoryInterface;
use Obelaw\Framework\Base\ServiceProviderBase;

/** 
 * Class RepositoryServiceProvider 
 * @package App\Providers 
 */
class RepositoryServiceProvider extends ServiceProviderBase
{
    /** 
     * Register services. 
     * 
     * @return void  
     */
    public function register()
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(EntryRepositoryInterface::class, EntryRepository::class);
        $this->app->bind(PriceListRepositoryInterface::class, PriceListRepository::class);
    }
}
