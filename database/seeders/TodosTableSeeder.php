<?php
// database/seeders/TodosTableSeeder.php

// database/seeders/TodosTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtenha todos os usuários existentes
        $users = User::all();

        // Adicione cinco tarefas predefinidas para cada usuário lembrando.
        //Crie o usuario primeiro, e depois rode eo php artisan db:seed --class=TodosTabelSeeder
        $users->each(function ($user) {
            Todo::factory(5)->create(['user_id' => $user->id]);
        });
}
}
