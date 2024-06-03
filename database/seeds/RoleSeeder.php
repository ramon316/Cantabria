<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Tightenco\Ziggy\Ziggy;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* De esta manera estamos creando Roles */
        $Role1 = Role::create(['name' => 'Administrador']);
        $Role2 = Role::create(['name' => 'Usuario']);

        /* De esta manera estamos creando permisos */
        Permission::create(['name' => 'home.index',
                            'description'=>'Ver calendario'])->syncRoles([$Role1, $Role2]);

        /* Evventos */
        Permission::create(['name' => 'eventos.index',
                                'description'=> 'Ver eventos'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'eventos.create',
                                'description'=>'Crear eventos'])->syncRoles([$Role1]);
        Permission::create(['name' => 'eventos.store',
                                'description'=>'Almacenar evento'])->syncRoles([$Role1]);
        Permission::create(['name' => 'eventos.edit',
                                'description'=>'Modificar eventos'])->syncRoles([$Role1]);
        Permission::create(['name' => 'eventos.destroy',
                                'description'=>'Eliminar eventos'])->syncRoles([$Role1]);
        Permission::create(['name' => 'eventos.show',
                                'description'=>'Visualizar eventos'])->syncRoles([$Role1]);
        Permission::create(['name' => 'eventos.pago',
                                'description'=>'Recibir pago de evento'])->syncRoles([$Role1]);
        Permission::create(['name' => 'eventos.contrato',
                                'description'=>'Generar contratos de eventos'])->syncRoles([$Role1]);


        /* Clientes */
        Permission::create(['name' => 'clientes.index',
                            'description'=>'Lista de clientes'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'clientes.create',
                            'description'=>'Crear clientes'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'clientes.store',
                            'description'=>'Guardar clientes'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'clientes.edit',
                            'description'=>'Editar clientes'])->syncRoles([$Role1]);
        Permission::create(['name' => 'clientes.destroy',
                            'description'=>'Eliminar clientes'])->syncRoles([$Role1]);
        Permission::create(['name' => 'clientes.update',
                            'description'=>'Actualizar clientes'])->syncRoles([$Role1]);

        /* Usuarios */
        Permission::create(['name' => 'usuarios.index',
                            'description'=>'Lista de usuarios'])->syncRoles([$Role1]);
        Permission::create(['name' => 'usuarios.store',
                            'description'=>'Guardar usuarios'])->syncRoles([$Role1]);
        Permission::create(['name' => 'usuarios.update',
                            'description'=>'Actualizar usuarios'])->syncRoles([$Role1]);
        Permission::create(['name' => 'usuarios.create',
                            'description'=>'Crear usuarios'])->syncRoles([$Role1]);
        Permission::create(['name' => 'usuarios.edit',
                            'description'=>'Editar usuarios'])->syncRoles([$Role1]);

        /* Perfiles */
        Permission::create(['name' => 'perfils.index',
                            'description'=>'Ver perfiles'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'perfils.edit',
                            'description'=>'Editar perfil'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'perfils.update',
                            'description'=>'Actualizar perfil'])->syncRoles([$Role1, $Role2]);

        /* Cotizaciones */
        Permission::create(['name' => 'cotizacion.index',
                            'description'=>'Lista de cotizaciones'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'cotizacion.store',
                            'description'=>'Guardar Cotizaciones'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'cotizacion.create',
                            'description'=>'Crear cotización'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'cotizacion.show',
                            'description'=>'Visualizar cotización'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'cotizacion.destroy',
                            'description'=>'Eliminar cotización'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'cotizacion.cotizacion',
                            'description'=>'Generar cotización PDF'])->syncRoles([$Role1, $Role2]);

        /* Cotizacion-servicio */
        Permission::create(['name' => 'cotizacionservicio.destroy',
                            'description'   =>  'Eliminar servicios de cotizaciones'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'cotizacionservicio.create',
                            'description'   =>  'Agregar servicios a la cotización'])->syncRoles([$Role1, $Role2]);
        Permission::create(['name' => 'cotizacionservicio.store',
                            'description'   =>  'Guardar el servicio de la cotización'])->syncRoles([$Role1, $Role2]);

        /* Pagos */
        Permission::create(['name' => 'pagos.index',
                            'description'=>'Capturar pagos'])->syncRoles([$Role1]);
        Permission::create(['name' => 'pagos.store',
                            'description'=>'Guardar pagos'])->syncRoles([$Role1]);

        /* manteleria */
        Permission::create(['name' => 'manteleria.create',
                            'description'=>'Capturar mantelería'])->syncRoles([$Role1]);

        /* Servicios */
        Permission::create(['name' => 'servicios.index',
                            'description'=>'Visualizar servicios'])->syncRoles([$Role1]);
        Permission::create(['name'  => 'servicios.create', 'description' => 'Crear nuevo servicio'])->syncRoles([$Role1]);
/*         Permission::create(['name' => 'alimentos.create',
                            'description'=>'Crear servicios de alimentos'])->syncRoles([$Role1]);
        Permission::create(['name' => 'decoracion.create',
                            'description'=>'Crear servicio de decoración'])->syncRoles([$Role1]);
        Permission::create(['name' => 'animacion.create',
                            'description'=>'Crear servicio de animación'])->syncRoles([$Role1]);
        Permission::create(['name' => 'otroservicio.create',
                            'description'=>'Crear otro servicio'])->syncRoles([$Role1]); */
        Permission::create(['name' => 'servicios.store',
                            'description'=>'Guardar servicios'])->syncRoles([$Role1]);

        /* evento - servicio */
        Permission::create(['name' => 'eventoservicios.create',
                            'description'=>'Agregar servicio a eventos'])->syncRoles([$Role1]);
        Permission::create(['name' => 'eventoservicios.destroy',
                            'description'=>'Eliminar servicios de los eventos'])->syncRoles([$Role1]);
        Permission::create(['name' => 'eventoservicios.store',
                            'description'=>'Asignar servicios a los eventos'])->syncRoles([$Role1]);
        /* Roles */
        Permission::create(['name'  =>  'roles.index',
                            'description'=>'Visualizar permisos'])->syncRoles([$Role1]);
        Permission::create(['name'  =>  'roles.create',
                            'description'=>'Crear permisos'])->syncRoles([$Role1]);
        Permission::create(['name'  =>  'roles.show',
                            'description'=>'Visualizar permisos'])->syncRoles([$Role1]);
        Permission::create(['name'  =>  'roles.edit',
                            'description'=>'Modificar permisos'])->syncRoles([$Role1]);
        Permission::create(['name'  =>  'roles.delete',
                            'description'=>'Eliminar permisos'])->syncRoles([$Role1]);

        /* Cuentas */
        Permission::create(['name'  =>  'cuentas.index',
                            'description'=>'Ver cuentas'])->syncRoles([$Role1]);
        Permission::create(['name'  =>  'cuentas.store',
                            'description'=>'Crear cuenta'])->syncRoles([$Role1]);

        /* Banquete */
        Permission::create(['name'=>'banquetes.create', 'description'=>'Detalle del banquete'])->syncRoles([$Role1]);

        /* Inventarios tablecloth*/
        Permission::create(['name'=>'inventory.tablecloth', 'description'=>'Visualizar manteles'])->syncRoles([$Role1]);
        Permission::create(['name'=>'inventory.tableclothcreate', 'description'=>'Crear un nuevo mantel'])->syncRoles([$Role1]);
        Permission::create(['name'=>'inventory.tableclothedit', 'description'=>'Editar manteleria'])->syncRoles([$Role1]);
        Permission::create(['name'=>'inventory.tableclothstore', 'description'=>'Almacenar manteles'])->syncRoles([$Role1]);
        Permission::create(['name'=>'inventory.tableclothupdate', 'description'=>'Modificar manteles'])->syncRoles([$Role1]);
        Permission::create(['name'=>'inventory.tableclothshow', 'description'=>'Visualizar manteles'])->syncRoles([$Role1]);

        /* Inventario tableclothbases */
        Permission::create(['name'=>'tableclothbase.index', 'description'=>'Visualizar bases de manteles'])->syncRoles([$Role1]);
        Permission::create(['name'=>'tableclothbase.create', 'description'=>'Crear una nueva base de mantel'])->syncRoles([$Role1]);
        Permission::create(['name'=>'tableclothbase.edit', 'description'=>'Editar base de manteleria'])->syncRoles([$Role1]);
        Permission::create(['name'=>'tableclothbase.store', 'description'=>'Almacenar base de manteles'])->syncRoles([$Role1]);
        Permission::create(['name'=>'tableclothbase.update', 'description'=>'Modificar base de manteles'])->syncRoles([$Role1]);
        Permission::create(['name'=>'tableclothbase.show', 'description'=>'Visualizar base de manteles'])->syncRoles([$Role1]);

        /* Inventory floralbases */
        Permission::create(['name'=>'floralbase.index', 'description'=>'Visualizar bases florales'])->syncRoles([$Role1]);
        Permission::create(['name'=>'floralbase.create', 'description'=>'Crear una nueva base floral'])->syncRoles([$Role1]);
        Permission::create(['name'=>'floralbase.edit', 'description'=>'Editar base de flores'])->syncRoles([$Role1]);
        Permission::create(['name'=>'floralbase.store', 'description'=>'Almacenar base de flores'])->syncRoles([$Role1]);
        Permission::create(['name'=>'floralbase.update', 'description'=>'Modificar base de flores'])->syncRoles([$Role1]);
        Permission::create(['name'=>'floralbase.show', 'description'=>'Visualizar base de flores'])->syncRoles([$Role1]);

        /* Reports */
        Permission::create(['name'=>'reports.index', 'description'=>'Visualizar reportes'])->syncRoles([$Role1]);

    }
}
