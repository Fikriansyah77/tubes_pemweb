<?php

namespace App\Interfaces;

interface transactionRepositoryInterface
{
    public function gettransactionDataFromSession();
    
    public function savetransactionDataToSession($data);
    
    public function savetransaction($data);
    
    public function gettransactionByCode($code);
    
    public function gettransactionByCodeEmailPhone($code, $email, $phone);  
    
    
}