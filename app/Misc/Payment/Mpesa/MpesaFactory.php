<?php


namespace App\Misc\Payment\Mpesa;


use App\Misc\Payment\Mpesa\Transaction\C2BRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;

class MpesaFactory
{
    /**
     * @param string $type
     * @return C2BRepository
     * @throws \ErrorException
     */
    public function getTransactor($type = 'c2b')
    {
        switch ($type) {
            case 'c2b':
                return new C2BRepository();
                break;
            default:
                throw new \ErrorException('Invalid ');
        }
    }
}
