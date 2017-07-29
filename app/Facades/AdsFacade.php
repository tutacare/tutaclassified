<?php
/**
 * Created by Irfan Mahfudz Guntur <mytuta.com>
 * Ads Facade
 */
 namespace App\Facades;

 use Illuminate\Support\Facades\Facade;

 class AdsFacade extends Facade
 {

 	/**
 	* Get the registered name of the component.
 	*
 	* @return string
 	*/
 	protected static function getFacadeAccessor()
 	{
 		return 'ads';
 	}

 }
