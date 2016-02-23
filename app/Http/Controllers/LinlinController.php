<?php
namespace App\Http\Controllers;
use Ytulip\Ycurl\Kits;

/**
 * Class LinlinController
 * @package App\Http\Controllers
 */
class LinlinController extends Controller{
    public function getHaveWeMeet(){
        $theDateFirstMeet = '2015-10-01';
        $theDateConfession = '2016-02-12';
        $theDateEngagement = '2016-02-15';

        $daysFromFirstMeet = Kits::daysToNow($theDateFirstMeet);
        $daysFromConfession = Kits::daysToNow($theDateConfession);
        $daysFromEngagement = Kits::daysToNow($theDateEngagement);

        var_dump($daysFromFirstMeet);
        var_dump($daysFromConfession);
        var_dump($daysFromEngagement);
    }
}