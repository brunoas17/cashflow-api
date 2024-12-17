<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\Cashflow;
use App\Models\Permission;
use Illuminate\Database\QueryException;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Log;

class CreateDefaultCashflow
{

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        try {

            $cashflow = Cashflow::create([
                'name' => "Meu fluxo de caixa",
                'description' => "Criado automaticamente.",
                'created_by' => $event->user->id
            ]);

            Permission::create([
                'user_id' => $event->user->id,
                'cashflow_id' => $cashflow->id,
                'level' => 'owner',
            ]);
        } catch(QueryException $e) {
            Log::error($e);

            throw new Exception("Ocorreu um erro inesperado");
        }
    }
}
