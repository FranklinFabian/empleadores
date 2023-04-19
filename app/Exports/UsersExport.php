<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('empleador as e')
            ->leftJoin('catalogo_ente_gestor as ceg','ceg.id', '=','e.id_ente_gestor')
            ->leftJoin('catalogo_departamento as cd','cd.id', '=','e.id_departamento')
            ->leftJoin('catalogo_departamento as cda','cda.id', '=','e.id_lugar_afiliacion')
            ->leftJoin('catalogo_estado_empleador as cee','cee.id', '=','e.id_estado')
            ->select(
                'e.id as id',
                'ceg.nombre as ente_gestor',
                'e.razon_social as razon_social',
                'e.numero_patronal as numero_patronal',
                'cd.nombre as departamento',
                'e.localidad as localidad',
                'e.zona as  zona',
                'e.calle as calle',
                'e.numero as numero',
                'e.telefono as telefono',
                'e.representante_legal as representante_legal',
                'e.fecha_inicio_actividades as fecha_inicio_actividades',
                'e.actividad_economica as actividad_economica',
                'e.numero_trabajadores as numero_trabajadores',
                'e.nit as nit',
                'cda.nombre as lugar_afiliacion',
                'e.fecha_afiliacion as fecha_afiliacion',
                'e.roe as roe',
                'cee.nombre as catalogo_estado_empleador',
                'e.created_at as created_at',
                'e.updated_at as updated_at',
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Ente Gestor',
            'Razon Social',
            'Numero Patronal',
            'Departamento',
            'Localidad',
            'Zona',
            'Calle',
            'Numero',
            'Telefono',
            'Representante Legal',
            'Fecha de Inicio de Actividades',
            'Actividad Economica',
            'Numero Trabajadores',
            'NIT',
            'Lugar Afiliacion',
            'Fecha Afiliacion',
            'ROE',
            'Estado',
            'Created At',
            'Updated At',
        ];
    }




}
