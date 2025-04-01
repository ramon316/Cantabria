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
        $RoleAdministrador = Role::create(['name' => 'Administrador']);
        $RolePlaneacion = Role::create(['name' => 'Planeacion']);
        $RoleVentas = Role::create(['name' => 'Ventas']);
        $RoleFlorista = Role::create(['name' => 'Florista']);
        $RoleBanquete = Role::create(['name' => 'Banquete']);


        /* De esta manera estamos creando permisos */
        Permission::create(['name' => 'home.index','description'=>'Ver calendario'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas, $RoleFlorista, $RoleBanquete]);

        /* Eventos */
        Permission::create(['name' => 'eventos.index','description'=> 'Ver eventos'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas, $RoleFlorista, $RoleBanquete]);
        Permission::create(['name' => 'eventos.create','description'=>'Crear eventos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'eventos.store','description'=>'Almacenar evento'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'eventos.edit','description'=>'Modificar eventos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'eventos.destroy','description'=>'Eliminar eventos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'eventos.show','description'=>'Visualizar eventos'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas, $RoleFlorista, $RoleBanquete]);
        Permission::create(['name' => 'eventos.pago','description'=>'Recibir pago de evento'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'eventos.contrato','description'=>'Generar contratos de eventos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'eventos.list','description'=>'Lista de eventos'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas, $RoleFlorista, $RoleBanquete]);
        Permission::create(['name' => 'eventos.layout','description'=>'Generar layout de eventos'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas]);


        /* Clientes */
        Permission::create(['name' => 'clientes.index','description'=>'Lista de clientes'])->syncRoles([$RoleAdministrador, $RoleVentas]);
        Permission::create(['name' => 'clientes.create','description'=>'Crear clientes'])->syncRoles([$RoleAdministrador, $RoleVentas]);
        Permission::create(['name' => 'clientes.store','description'=>'Guardar clientes'])->syncRoles([$RoleAdministrador, $RoleVentas]);
        Permission::create(['name' => 'clientes.edit','description'=>'Editar clientes'])->syncRoles([$RoleAdministrador, $RoleVentas]);
        Permission::create(['name' => 'clientes.destroy','description'=>'Eliminar clientes'])->syncRoles([$RoleAdministrador, $RoleVentas]);
        Permission::create(['name' => 'clientes.update','description'=>'Actualizar clientes'])->syncRoles([$RoleAdministrador, $RoleVentas]);

        /* Usuarios */
        Permission::create(['name' => 'usuarios.index','description'=>'Lista de usuarios'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'usuarios.store','description'=>'Guardar usuarios'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'usuarios.update','description'=>'Actualizar usuarios'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'usuarios.create','description'=>'Crear usuarios'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'usuarios.edit','description'=>'Editar usuarios'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'usuarios.destroy','description'=>'Eliminar usuarios'])->syncRoles([$RoleAdministrador]);

        /* Roles */
        Permission::create(['name'  =>  'roles.index','description'=>'Visualizar permisos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'  =>  'roles.create','description'=>'Crear permisos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'  =>  'roles.show','description'=>'Visualizar permisos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'  =>  'roles.edit','description'=>'Modificar permisos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'  =>  'roles.store','description'=>'Guardar permisos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'  =>  'roles.update','description'=>'Actualizar permisos'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'  =>  'roles.destroy','description'=>'Eliminar permisos'])->syncRoles([$RoleAdministrador]);

        /* Perfiles */
        Permission::create(['name' => 'perfils.index','description'=>'Ver perfiles'])->syncRoles([$RoleAdministrador, $RoleFlorista, $RolePlaneacion, $RoleVentas ]);
        Permission::create(['name' => 'perfils.edit','description'=>'Editar perfil'])->syncRoles([$RoleAdministrador, $RoleFlorista, $RolePlaneacion, $RoleVentas ]);
        Permission::create(['name' => 'perfils.update','description'=>'Actualizar perfil'])->syncRoles([$RoleAdministrador, $RoleFlorista, $RolePlaneacion, $RoleVentas ]);

        /* Cotizaciones */
        Permission::create(['name' => 'cotizacion.index','description'=>'Lista de cotizaciones'])->syncRoles([$RoleAdministrador, $RoleVentas]);
        Permission::create(['name' => 'cotizacion.store','description'=>'Guardar Cotizaciones'])->syncRoles([$RoleAdministrador, $RoleVentas ]);
        Permission::create(['name' => 'cotizacion.create','description'=>'Crear cotización'])->syncRoles([$RoleAdministrador, $RoleVentas ]);
        Permission::create(['name' => 'cotizacion.show','description'=>'Visualizar cotización'])->syncRoles([$RoleAdministrador, $RoleVentas    ]);
        Permission::create(['name' => 'cotizacion.destroy','description'=>'Eliminar cotización'])->syncRoles([$RoleAdministrador, $RoleVentas  ]);
        Permission::create(['name' => 'cotizacion.cotizacion','description'=>'Generar cotización PDF'])->syncRoles([$RoleAdministrador, $RoleVentas   ]);

        /* Cotizacion-servicio */
        Permission::create(['name' => 'cotizacionservicio.destroy','description'   =>  'Eliminar servicios de cotizaciones'])->syncRoles([$RoleAdministrador, $RoleVentas ]);
        Permission::create(['name' => 'cotizacionservicio.create','description'   =>  'Agregar servicios a la cotización'])->syncRoles([$RoleAdministrador, $RoleVentas ]);
        Permission::create(['name' => 'cotizacionservicio.store','description'   =>  'Guardar el servicio de la cotización'])->syncRoles([$RoleAdministrador, $RoleVentas ]);

        /* Pagos */
        Permission::create(['name' => 'pagos.index','description'=>'Capturar pagos'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas]);
        Permission::create(['name' => 'pagos.store','description'=>'Guardar pagos'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas]);

        /* manteleria */
        Permission::create(['name' => 'manteleria.create','description'=>'Capturar mantelería'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);

        /* Base Floral */
        Permission::create(['name' => 'basefloral.create','description'=>'Capturar bases florales'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleFlorista]);

        /* Servicios */
        Permission::create(['name' => 'servicios.index','description'=>'Visualizar servicios'])->syncRoles([$RoleAdministrador ]);
        Permission::create(['name'  => 'servicios.create', 'description' => 'Crear nuevo servicio'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'servicios.store','description'=>'Guardar servicios'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'servicios.edit','description'=>'Editar servicios'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name' => 'servicios.update','description'=>'Actualizar servicios'])->syncRoles([$RoleAdministrador]);

        /* evento - servicio */
        Permission::create(['name' => 'eventoservicios.create','description'=>'Agregar servicio a eventos'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name' => 'eventoservicios.destroy','description'=>'Eliminar servicios de los eventos'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name' => 'eventoservicios.store','description'=>'Asignar servicios a los eventos'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);

        /* Cuentas */
        Permission::create(['name'  =>  'cuentas.index','description'=>'Ver cuentas'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'  =>  'cuentas.store','description'=>'Crear cuenta'])->syncRoles([$RoleAdministrador]);

        /* Banquete */
        Permission::create(['name'=>'banquetes.create', 'description'=>'Detalle del banquete'])->syncRoles([$RoleAdministrador, $RoleBanquete]);
        Permission::create(['name'=>'banquetes.formato', 'description'=>'Formato del banquete'])->syncRoles([$RoleAdministrador, $RoleBanquete]);

        /* Inventarios tablecloth*/
        Permission::create(['name'=>'inventory.tablecloth', 'description'=>'Visualizar manteles'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'inventory.tableclothcreate', 'description'=>'Crear un nuevo mantel'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'inventory.tableclothedit', 'description'=>'Editar manteleria'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'inventory.tableclothstore', 'description'=>'Almacenar manteles'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'inventory.tableclothupdate', 'description'=>'Modificar manteles'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'inventory.tableclothshow', 'description'=>'Visualizar manteles'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);

        /* Inventario tableclothbases */
        Permission::create(['name'=>'tableclothbase.index', 'description'=>'Visualizar bases de manteles'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'tableclothbase.create', 'description'=>'Crear una nueva base de mantel'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'tableclothbase.edit', 'description'=>'Editar base de manteleria'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'tableclothbase.store', 'description'=>'Almacenar base de manteles'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'tableclothbase.update', 'description'=>'Modificar base de manteles'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'tableclothbase.show', 'description'=>'Visualizar base de manteles'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);

        /* Inventory floralbases */
        Permission::create(['name'=>'floralbase.index', 'description'=>'Visualizar bases florales'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleFlorista]);
        Permission::create(['name'=>'floralbase.create', 'description'=>'Crear una nueva base floral'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleFlorista]);
        Permission::create(['name'=>'floralbase.edit', 'description'=>'Editar base de flores'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleFlorista]);
        Permission::create(['name'=>'floralbase.store', 'description'=>'Almacenar base de flores'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleFlorista]);
        Permission::create(['name'=>'floralbase.update', 'description'=>'Modificar base de flores'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleFlorista]);
        Permission::create(['name'=>'floralbase.show', 'description'=>'Visualizar base de flores'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleFlorista]);

        /* Chairs */
        Permission::create(['name'=>'chairs.index', 'description'=>'Visualizar sillas'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'chairs.create', 'description'=>'Crear una nueva silla'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'chairs.edit', 'description'=>'Editar silla'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'chairs.store', 'description'=>'Almacenar silla'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'chairs.update', 'description'=>'Modificar silla'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'chairs.show', 'description'=>'Visualizar silla'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);

        /* Others */
        Permission::create(['name'=>'others.index', 'description'=>'Visualizar otros'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'others.create', 'description'=>'Crear otro'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'others.edit', 'description'=>'Editar otro'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'others.store', 'description'=>'Almacenar otro'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'others.update', 'description'=>'Modificar otro'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);
        Permission::create(['name'=>'others.show', 'description'=>'Visualizar otro'])->syncRoles([$RoleAdministrador, $RolePlaneacion]);

        /* Discounts */
        Permission::create(['name'=>'discounts.create', 'description'=>'Crear descuento'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'=>'discounts.store', 'description'=>'Almacenar descuento'])->syncRoles([$RoleAdministrador]);
        Permission::create(['name'=>'discounts.destroy', 'description'=>'Eliminar descuento'])->syncRoles([$RoleAdministrador]);

        /* Reports */
        Permission::create(['name'=>'reports.index', 'description'=>'Visualizar reportes'])->syncRoles([$RoleAdministrador]);

        /* Meets */
        Permission::create(['name'=>'meets.index', 'description'=>'Visualizar meet'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas, $RoleFlorista]);
        Permission::create(['name'=>'meets.create', 'description'=>'Crear meet'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas, $RoleFlorista]);
        Permission::create(['name'=>'meets.store', 'description'=>'Almacenar meet'])->syncRoles([$RoleAdministrador, $RolePlaneacion,$RoleVentas, $RoleFlorista]);
        Permission::create(['name'=>'meets.show', 'description'=>'Visualizar meet'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas, $RoleFlorista]);
        Permission::create(['name'=>'meets.update', 'description'=>'Modificar meet'])->syncRoles([$RoleAdministrador, $RolePlaneacion, $RoleVentas, $RoleFlorista]);

        /* Logactivity */
        Permission::create(['name'=>'logactivity.index', 'description'=>'Visualizar log de actividad'])->syncRoles([$RoleAdministrador]);

    }
}
