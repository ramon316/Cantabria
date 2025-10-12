<?php

namespace App\Traits;

use App\cotizacion;
use Illuminate\Support\Str;

/* Se encarga de los procesos de nuestra cotización */

trait CotizacionTrait
{
   public $dia;

   public function costoCotizacion(cotizacion $cotizacion)
   {
      /**Obtenemos todos los servicios de este evento */
      $servicios = $this->allServicesTrait($cotizacion);
      /**Validamos si cuenta con alguno de los servicios propios */
      $costoCotizacion = 0;
      foreach ($servicios as $servicio) {
         /* Aqui obtenemos el costo del evento
         El costo multiplicada por la cantidad*/
         if ($servicio->pivot->regalo == 0) {
            $costoCotizacion = $servicio->pivot->costo  * $servicio->pivot->cantidad + $costoCotizacion;
         }
      }

      // Restar descuento si existe
      if ($cotizacion->discount) {
         $costoCotizacion = $costoCotizacion - $cotizacion->discount->amount;
      }

      return $costoCotizacion;
   }

   public function diaCotizacion(cotizacion $cotizacion)
   {
      $fechacotizacion = cotizacion::select()->whereId($cotizacion->id)->first();
      $fechacotizacion = date('w', strtotime($fechacotizacion->start));
      /* Validamos si es alguno de los días */


      if ($fechacotizacion <= 4 or $fechacotizacion == 7) {
         $this->dia = 0;
      } else {
         $this->dia = 1;
      }
      return $this->dia;
   }

   public function añoCotizacion(cotizacion $cotizacion)
   {
      /* Obtenemos el año del cotizacion */
      $fechacotizacion = cotizacion::select()->whereId($cotizacion->id)->first();
      $fechacotizacion = date('Y', strtotime($fechacotizacion->start));
      return $fechacotizacion;
   }

   public function decoracionExistTrait(cotizacion $cotizacion)
   {
      $decorationService = $cotizacion->servicio->first(function ($servicios) {
         return strpos(strtolower($servicios->nombre), 'decoración') !== false;
      });
      return $decorationService;
   }

   public function rentaExistTrait(cotizacion $cotizacion)
   {
      $servicios = $cotizacion->servicio()->get();
      $rentaService = $cotizacion->servicio->first(function ($servicio) {
         return strpos(strtolower($servicio->nombre), 'renta') !== false;
      });
      return $rentaService;

   }

   public function serviciosTrait(cotizacion $cotizacion)
   {
      $allServices = $cotizacion->servicio;
      $decorationService = $this->decoracionExistTrait($cotizacion);

      /* dd($decorationService); */

      /* obtenemos  los serviccios sin decoración y renta */
      /* Si existe tenemos que encontrar todos los servicios pero si no entonces los obtenemos  */
      if (is_null($decorationService)) {
         $servicios = $cotizacion->servicio()->where('id', '!=', $this->rentaExistTrait($cotizacion)->id)->
         where('regalo', '!=', '1')->get();
      } else {
         $servicios = $cotizacion->servicio()->
                  where('id', '!=', $this->decoracionExistTrait($cotizacion)->id)->
                  where('id', '!=', $this->rentaExistTrait($cotizacion)->id)->
                  where('regalo', '!=', '1')->
                  get();
      }
      return $servicios;
   }

   public function servicesCortesyTrait(cotizacion $cotizacion){

      $serviceCortesy = $cotizacion->servicio()->where('regalo', '1')->get();
      return $serviceCortesy;
   }

   public function allServicesTrait(cotizacion $cotizacion)
   {
      $allServices = $cotizacion->servicio;
      return $allServices;
   }
}
