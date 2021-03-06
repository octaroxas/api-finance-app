<?php

namespace App\Enums;

enum TransactionType: string
{
    case INCOME = 'income';
    case EXPENSE = 'expense';

    public function display(): string
    {
        return match ($this) {
            self::INCOME => 'Rendimento',
            self::EXPENSE => 'Despesa'
        };
    }
}
