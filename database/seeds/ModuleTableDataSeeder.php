<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModuleTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = array('Academic'=>1,'Academic Misc'=>11,'Hostel'=>2,'Hostel Misc'=>22,'Transport'=>3,'Transport Misc'=>33);
        foreach($data as $key=>$value){
        Module::create([
	            'module' => $key,
	            'ModuleID' => $value
	            ]);
    }
        
    }
}
