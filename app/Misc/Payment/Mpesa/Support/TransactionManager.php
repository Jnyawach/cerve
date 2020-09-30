<?php


namespace App\Misc\Payment\Mpesa\Support;

use App\Misc\Payment\Mpesa\MpesaFactory;
use App\Misc\Payment\Mpesa\Transaction\TransactionRepository;
use Illuminate\Http\Request;

class TransactionManager
{
    private $type;
    private $transaction;
    private $loggable;
    private $request;

    /**
     * @param mixed $type
     * @return TransactionManager
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param mixed $request
     * @return TransactionManager
     */
    public function init(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @return $this
     * @throws \ErrorException
     */
    public function createLog()
    {
        $transactor = (new MpesaFactory)->getTransactor($this->type);
        $this->loggable = $transactor->saveTransaction($this->request);
        return $this;
    }

    /**
     * @return TransactionManager
     */
    public function createTransaction()
    {
        $this->transaction = (new TransactionRepository)
            ->save($this->loggable->getTransactionReference(), $this->loggable->getTransactionAmount());

        return $this;
    }

    public function finish()
    {
        $this->transaction->loggable()
            ->associate($this->loggable)
            ->save();
    }
}
