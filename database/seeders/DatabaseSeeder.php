<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\EquipoRepuesto;
use App\Models\OrdenTrabajo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Repuesto;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /*$equipo=new Equipo();
        $equipo->idSecc="2";
        $equipo->idSubSecc="1";
        $equipo->codEquipo="Mot001-001";
        $equipo->marca="Siemens";
        $equipo->modelo="y3rt-25";
        $equipo->det1="50HP";
        $equipo->det2="1500rpm";
        $equipo->det3="";
        $equipo->det4="";
        $equipo->det5="";
        $equipo->histEquipo="1";
        $equipo->creador="Daniel";
        $equipo->save();*/
        User::factory(10)->create();
        Equipo::factory(50)->create();
        Repuesto::factory(50)->create();
        OrdenTrabajo::factory(50)->create();
       // EquipoRepuesto::factory(50)->create();

    }
}
