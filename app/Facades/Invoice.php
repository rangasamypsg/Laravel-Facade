<?php

namespace App\Facades;

use Carbon\Carbon;

class Invoice {

    public function CompanyName() {
        return "ABC Private Limited";
    }

    public function CurrentDate() {
        return Carbon::now()->format('d-m-Y');
    }
}
