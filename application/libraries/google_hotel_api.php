<?php
require_once FCPATH . 'vendor\autoload.php';

use Google\Client as Google_Client;
use Google\Service\HotelAds\HotelRates as Hotel_Rate;

class Google_hotel_api
{
    private $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName('Google Hotel API');
        $this->client->setDeveloperKey('AIzaSyDs-0kCpaWs6MLA3beRKO690-NdIL_ubn0');
    }

    public function getPerNightPrices($hotelPlaceId, $checkInDate, $checkOutDate)
    {
        $service = new Hotel_Rate($this->client);
        $response = $service->get($hotelPlaceId, $checkInDate, $checkOutDate);
        $prices = $response->getRates();

        $nightlyPrices = [];
        foreach ($prices as $price) {
            $nightlyPrices[] = $price->getNightlyPrice();
        }

        return $nightlyPrices;
    }
}
