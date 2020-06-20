 <?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Role::where('name','Superadmin')->exists())
        {

        }else{
         Role::create(['name' => 'superadmin']);
        }
    
        if( DB::table('users')->where('email','admin@superadmin.com')->exists())
        {
            
        }else{
            DB::table('users')->insert([
                'name' => 'Superadmin',
                'email' => 'admin@superadmin.com',
                'password' => Hash::make('password'),   
            ]);    
        }
      
        $admin = User::where('name','Superadmin')->first();
        $role= Role::where('name','superadmin')->first();
        $admin->assignRole($role);
    
    }
}
