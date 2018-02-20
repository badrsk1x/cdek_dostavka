<?php
namespace Controllers\DeliveryController;

use Models\Delivery\Delivery;

class DeliveryController
{

    public $CityFrom;
    public $CityTo;
    public $CityFromName;
    public $CityToName;
    public $TariffId;
    public $weight;
    public $volume;
    private $authLogin;
    private $authPassword;

    public function __construct($request = null)
    {
        $this->CityFrom = $request['city-from'];
        $this->CityTo = $request['city-to'];
        $this->CityFromName = $request['city-from-name'];
        $this->CityToName = $request['city-to-name'] ;
        $this->authLogin = AuthLogin;
        $this->authPassword = AuthPassword;
        $this->TariffId = TariffId;
        $this->weight = StandartWeight;
        $this->volume = StandartVolume;
    }


    public function index()
    {

        $inner = new Delivery()  ;
        $inner->setAuth($this->authLogin, $this->authPassword);
        $inner->setSenderCityId($this->CityFrom);
        $inner->setReceiverCityId($this->CityTo);
        $inner->setTariffId($this->TariffId);
        $inner->addGoodsItemByVolume($this->weight,$this->volume);
        $inner->calculate();

        $result = $inner->getResult();
        $result['result']['city-from'] = $this->CityFrom;
        $result['result']['city-to'] = $this->CityTo;
        $result['result']['city-from-name'] = $this->CityFromName;
        $result['result']['city-to-name'] = $this->CityToName;

        require_once('Views/Delivery/index.php');
    }


}
