<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Usamos Eloquent de Spatie directamente ya que está disponible
        $permission = \Spatie\Permission\Models\Permission::firstOrCreate([
            'name' => 'pagos.validar',
            'description' => 'Validar pagos globales'
        ]);

        $role = \Spatie\Permission\Models\Role::where('name', 'Administrador')->first();
        if ($role) {
            $role->givePermissionTo($permission);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $permission = \Spatie\Permission\Models\Permission::where('name', 'pagos.validar')->first();
        if ($permission) {
            $permission->delete();
        }
    }
};
