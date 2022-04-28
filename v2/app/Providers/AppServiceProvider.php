<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use DB;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
	
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //	 
			view()->composer('*', function ($view) 
			{
				
				$company=DB::table('organizations')->select('id','brand_logo','favicon_url','company_url','company_name')->where('id',\Session::get('companyID'))->first();
				
				if(isset($company)){
					$company=$company;
				
				}
				else{
					
				$company=DB::table('organizations')->select('id','brand_logo','favicon_url','company_url','company_name')->where('id',Auth::user()->organization_id??0)->first();

				if(isset($company)){
					$company=$company;
				}
				else{
					$company=DB::table('themeoptions')->select('header_logo as brand_logo','favicon as favicon_url')->first();
				}
					
					//dd($company);
				}				
				$view->with(['Session_Company_ID'=>\Session::get('companyID')??0,'brand_logo'=>$company->brand_logo??'','favicon_url'=>$company->favicon_url??'','company_name'=>$company->company_name??''] );  
			});  
		 
		 
    }
}
