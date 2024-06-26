<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminActions
{
    public function created($model)
    {
        $this->logAction($model, 'created');
    }

    public function updated($model)
    {
        $this->logAction($model, 'updated');
    }

    public function deleted($model)
    {
        $this->logAction($model, 'deleted');
    }

    private function logAction($model, $action)
    {
        $Name = Auth::user() ? Auth::user()->name : 'Error: Nereģistrēts lietotājs! (Šitā nedrīkst būt)';

        Log::channel('admin_actions')->info("Admin action", [
            "Admin {$Name} {$action} a {$model->getTable()} with id:{$model->id}"
        ]);
    }
}
