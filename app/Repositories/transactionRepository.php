<?php

namespace App\Repositories;

use App\Interfaces\transactionRepositoryInterface;
use App\Jobs\SendMailTransactionSuccessJob;
use App\Models\transaction;
use App\Models\transactionpassenger;
use App\Models\flightclass;
use App\Models\promocode;

class transactionRepository implements transactionRepositoryInterface
{
    public function gettransactionDataFromSession()
    {
        return session()->get('transaction');
    }

    public function savetransactionDataToSession($data)
    {
        $transaction = session ()->get('transaction', []);

        foreach ($data as $key => $value) {
            $transaction[$key] = $value;
        }

        session()->put('transaction', $transaction);
    }

    public function savetransaction($data)
    {
        $data['code'] = $this->generatetransactionCode();
        $data['number_of_passengers'] = $this->countPassengers($data['passengers']);

        //Hitung subtotal dan grandtotal awal
        $data['subtotal'] = $this->calculateSubtotal($data['flightclass_id'], $data['number_of_passengers']);
        $data['grandtotal'] = $data['subtotal'];

        //terapkan promo jika ada
        if (!empty($data['promocode_id'])) {
            $data = $this->applyPromoCode($data);
        } 

        //tamnahkan PPN
        $data['grandtotal'] = $this->addPPN($data['grandtotal']);

        //simpan transaksi dan penumpang
        $transaction = $this->createtransaction($data);
        $this->savePassengers($data['passengers'], $transaction->id);

        session()->forget('transaction');

        return $transaction;
    }

    private function generatetransactionCode()
    {
        return "BWAGARUDA" . rand(1000, 9999);
    }

    private function countPassengers($passengers)
    {
        return count($passengers);
    }

    private function calculateSubtotal($flightclass_id, $number_of_passengers)
    {
        $price = flightclass::findOrFail($flightclass_id)->price;
        return $price * $number_of_passengers;
    }

    private function applyPromoCode($data)
    {
        $promo = promocode::where('code', $data['promocode_id'])
            ->where('valid_until', '>=', now())
            ->where('is_used', false)
            ->first();

        if ($promo){
            if ($promo->discount_type === 'percentage') {
                $data['discount'] = $data['grandtotal'] * ($promo->discount / 100);
            } else {
                $data['discount'] = $promo->discount;
            }
            
            $data['grandtotal'] -= $data['discount'];
            $data['promocode_id'] = $promo->id;

            //tandai promo code sebagai sudah digunakan
            $promo->update(['is_used' => true]);
        } 

        return $data;
    }

    private function addPPN($grandtotal)
    {
        $ppn = $grandtotal * 0.11;
        return $grandtotal + $ppn;
    }

    private function createtransaction($data)
    {
        return transaction::create($data);
    }

    private function savePassengers($passengers, $transaction_id)
    {
        foreach ($passengers as $passenger) {
            $passenger['transaction_id'] = $transaction_id;
            transactionpassenger::create($passenger);
        }
    }


    public function gettransactionByCode($code)
    {
        return transaction::where('code', $code)->first();
    }

    public function gettransactionByCodeEmailPhone($code, $email, $phone)
    {
        return transaction::where('code', $code)->where('email', $email)->where('phone_number', $phone)->first();
    }
}       
