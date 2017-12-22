<?php

use App\User;
use App\Menu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Truncamos las tablas principales
      Role::truncate();
      User::truncate();

      //Creamos los roles predeterminados
      $superadminRole = Role::create(['name' => 'SuperAdmin']);
           $adminRole = Role::create(['name' => 'Admin']);
        $operatorRole = Role::create(['name' => 'Operator']);
            $userRole = Role::create(['name' => 'UserRole']);
         $monitorRole = Role::create(['name' => 'Monitor']);

      //Creamos los permisos predeterminados
         $viewdashboardpral = Permission::create(['name' => 'View dashboard pral']);
         $viewgeolocation = Permission::create(['name' => 'View geolocation']);
         $viewconsumption = Permission::create(['name' => 'View consumption']);
         $viewsurvey = Permission::create(['name' => 'View survey']);
         $vieweditconfiguration = Permission::create(['name' => 'Edit Configuration']);
         $viewconfiguration = Permission::create(['name' => 'View Configuration']);

      //Asignamos el permiso view dashboard pral al role SuperAdmin
         $role = Role::findByName('SuperAdmin');
         $role->givePermissionTo('View dashboard pral');
         $role->givePermissionTo('View geolocation');
         $role->givePermissionTo('View consumption');
         $role->givePermissionTo('View survey');
         $role->givePermissionTo('Edit Configuration');
         $role->givePermissionTo('View Configuration');

      //Creamos los usuarios super admin
      $super_admin_a = new User;
      $super_admin_a->name='Alonso de Jesus Cauich Viana';
      $super_admin_a->email='acauich@sitwifi.com';
      $super_admin_a->password= bcrypt('123456');
      $super_admin_a->save();
      $super_admin_a->assignRole($superadminRole);
      //
      $super_admin_b = new User;
      $super_admin_b->name='Jose Antonio Esquinca Bonilla';
      $super_admin_b->email='jesquinca@sitwifi.com';
      $super_admin_b->password= bcrypt('123456');
      $super_admin_b->save();
      $super_admin_b->assignRole($superadminRole);
      //
      $super_admin_c = new User;
      $super_admin_c->name='Angel Gabriel Ramirez Ruiz';
      $super_admin_c->email='gramirez@sitwifi.com';
      $super_admin_c->password= bcrypt('123456');
      $super_admin_c->save();
      $super_admin_c->assignRole($superadminRole);
      //Creamos los usuarios por default
      $user_default_a = new User;
      $user_default_a->name='Default Admin User';
      $user_default_a->email='admin@sitwifi.com';
      $user_default_a->password= bcrypt('123456');
      $user_default_a->save();
      $user_default_a->assignRole($adminRole);
      //
      $user_default_b = new User;
      $user_default_b->name='Default Operator User';
      $user_default_b->email='operator@sitwifi.com';
      $user_default_b->password= bcrypt('123456');
      $user_default_b->save();
      $user_default_b->assignRole($operatorRole);
      //
      $user_default_c = new User;
      $user_default_c->name='Default User';
      $user_default_c->email='user@sitwifi.com';
      $user_default_c->password= bcrypt('123456');
      $user_default_c->save();
      $user_default_c->assignRole($userRole);
      //
      $user_default_d = new User;
      $user_default_d->name='Default Monitor User';
      $user_default_d->email='monitor@sitwifi.com';
      $user_default_d->password= bcrypt('123456');
      $user_default_d->save();
      $user_default_d->assignRole($monitorRole);

      //Creamos los menus predeterminados
      $menuAdminA = new Menu;
      $menuAdminA->name='dashboard';
      $menuAdminA->display_name='Dashboard';
      $menuAdminA->description='Es la representación gráfica y visual de las principales métricas.';
      $menuAdminA->url='home';
      $menuAdminA->icons='fa fa-tachometer';
      $menuAdminA->save();
      //$assigned_menu_a = DB::table('menu_user')->insert(['user_id' => $super_admin_a->id,'menu_id' => $menuAdminA->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

      $menuAdminB = new Menu;
      $menuAdminB->name='geolocation';
      $menuAdminB->display_name='Geolocalización';
      $menuAdminB->description='Es la representación de la ubicación en tiempo real de su dispositivo electronico.';
      $menuAdminB->url='geolocation';
      $menuAdminB->icons='fa fa-map-marker';
      $menuAdminB->save();
      $assigned_menu_b = DB::table('menu_user')->insert(['user_id' => $super_admin_a->id ,'menu_id' => $menuAdminB->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
      $assigned_menu_b1 = DB::table('menu_user')->insert(['user_id' => $super_admin_b->id ,'menu_id' => $menuAdminB->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
      $assigned_menu_b2 = DB::table('menu_user')->insert(['user_id' => $super_admin_c->id ,'menu_id' => $menuAdminB->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

      $menuAdminC = new Menu;
      $menuAdminC->name='data_consumption';
      $menuAdminC->display_name='Consumo de datos';
      $menuAdminC->description='Es la representación visual de los consumos obtenidos en un periodo de tiempo.';
      $menuAdminC->url='data_consumption';
      $menuAdminC->icons='fa fa-exchange';
      $menuAdminC->save();
      $assigned_menu_c = DB::table('menu_user')->insert(['user_id' => $super_admin_a->id,'menu_id' => $menuAdminC->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
      $assigned_menu_c1 = DB::table('menu_user')->insert(['user_id' => $super_admin_b->id,'menu_id' => $menuAdminC->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
      $assigned_menu_c2 = DB::table('menu_user')->insert(['user_id' => $super_admin_c->id,'menu_id' => $menuAdminC->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

      $menuAdminD = new Menu;
      $menuAdminD->name='survey';
      $menuAdminD->display_name='Encuesta';
      $menuAdminD->description='Es la representación gráfica y visual de los datos obtenidos de los usuarios.';
      $menuAdminD->url='survey';
      $menuAdminD->icons='fa fa-folder';
      $menuAdminD->save();
      $assigned_menu_d = DB::table('menu_user')->insert(['user_id' => $super_admin_a->id,'menu_id' => $menuAdminD->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
      $assigned_menu_d1 = DB::table('menu_user')->insert(['user_id' => $super_admin_b->id,'menu_id' => $menuAdminD->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

      $menuAdminE = new Menu;
      $menuAdminE->name='profile';
      $menuAdminE->display_name='Perfil';
      $menuAdminE->description='Es el conjunto de información que contiene su configuración.';
      $menuAdminE->url='profile';
      $menuAdminE->icons='fa fa-user';
      $menuAdminE->save();
      // $assigned_menu_e = DB::table('menu_user')->insert(['user_id' => $super_admin_a->id,'menu_id' => $menuAdminE->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

      $menuAdminF = new Menu;
      $menuAdminF->name='Configuration';
      $menuAdminF->display_name='Configuración';
      $menuAdminF->description='Permite manipular la preferencias y establecer los valor predeterminados para cada usuario.';
      $menuAdminF->url='Configuration';
      $menuAdminF->icons='fa fa-cog';
      $menuAdminF->save();
      $assigned_menu_f = DB::table('menu_user')->insert(['user_id' => $super_admin_a->id,'menu_id' => $menuAdminF->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
      $assigned_menu_f1 = DB::table('menu_user')->insert(['user_id' => $super_admin_b->id,'menu_id' => $menuAdminF->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);


    }
}
