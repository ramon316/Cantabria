<?php

namespace App\Http\Controllers;

use App\evento;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class reportController extends Controller
{
    
    
    public function index(){
        /* Obtenemos la fecha actual y la d eun año despues */
        $fechaactual = date('Y-m-d');
        $nuevafecha = strtotime ('+1 year' , strtotime($fechaactual)); //Se añade un año mas
        $nuevafecha = date ('Y-m-d',$nuevafecha);
        
        $title_count = [
            'chart_title' => 'Tipos de eventos',
            'report_type' => 'group_by_string',
            'model' => evento::class,
            'group_by_field' => 'title',
            'chart_type' => 'bar',

            /* Fechas de reporte */
            'filter_field'   => 'start',
            'range_date_start'  =>  $fechaactual,
            'range_date_end'  =>  $nuevafecha,
            'chart_color'   =>  '100, 70, 218'
        ];
        $chartTitle = new LaravelChart($title_count);

        $events_months = [
            'chart_title' => 'Eventos por mes ',
            'report_type' => 'group_by_date',
            'model' => evento::class,
            'group_by_field' => 'start',
            'chart_type' => 'bar',
            'group_by_period'   =>  "month",
            'filter_field' => 'start',
            'range_date_start'  =>  $fechaactual,
            'range_date_end'  =>  $nuevafecha,
            'chart_color'   =>  '255, 0, 0'
        ];
        
        $chartMonths = new LaravelChart($events_months);

        return view('reports.index')->
        with('chartTitle',$chartTitle)
        ->with('chartMonths', $chartMonths);
    }
}
