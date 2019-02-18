<?php

namespace App;

use Illuminate\Http\Request;
use App\Client;
use App\Room;
use App\Hotel;

class Helper
{
	/**
	 * Deze functie retourneert de klant waarvan je de
	 * gegevens moet geven (of null als je geen vindt)
	 *
	 * situatie 1 : je bent ingelogd als admin, dan moet je
	 *   in deze sessie de id van de klant ophalen en daarmee
	 *   de klantgegevens ophalen.
	 * situatie 2 : je bent ingelogd als klant en dus moet je
	 *   nu de gegevens van deze klant ophalen
	 * situatie 3 : je bent niet aangemeld (mag normaal niet voorkomen)
	 *   return null;
	 */
	public static function getUser()
	{
		if ( auth()->guest())
			return null;
		else
			if ( auth()->user()->isAdmin() )
			// is de admin - moet nu de guest info ophalen
			   if (request()->session() == null)
			   {
				   return null;
			   }
			   else
				if (request()->session()->has('client_id'))
				{
				  $klant_id = request()->session()->get('client_id');
				  $klant = \App\Client::findOrFail($klant_id)->get();
				  return $klant;
				}
				else { return null; }
			else
			{
				 // is de user -- moet die gegevens ophalen
				 // haal de client die hoort bij deze user
				 return auth()->user()->client()->get();
			}
	}
	
	/**
	 * testUser retourneert true als de aangemelde persoon
	 *   ofwel admin is
	 *   ofwel de klant is waarvan we de id doorsturen
	 */
	public static function testUser()
	{
		
		if ( auth()->user()->isAdmin() )
			return true;
		else{		
			$klant_id = -1;
            if (request()->session()->has('client_id'))
               $klant_id = request()->session()->get('client_id');

			if ($klant_id == -1)
				return false;
			else {
				// haal de user_id die past bij die klant
				$klant = \App\Client::findOrFail($klant_id);
				$user_id = $klant->user_id;
				return $user_id == auth()->user()->id;
			}
		}
	}
	
	/**
	 * calcFreeRoom berekent de vrije kamers (d.i. de kamers
	 * waar minstens 1 bed vrij is).
	 *
	 * Voorlopig houden we geen rekening met de klant en dus
	 * niet met  het soort kamer waarvoor de klant in aanmerking
	 * komt.
	 *
	 * We maken een array van alle kamers, met hun aantal vrije bedden
	 *   $free = [ 'roomnummer', 'free_beds']
	 * We overlopen de overnachtingen en verminderen de overeenkomstige
	 * bedden tussen de opgegeven data
	 *
	 * verwijder de rijen uit $free waar free_beds == 0
	 *
	 * return $free ( deze zal de kamernummers, met nog vrije bedden bevatten)
	 */
	 public function calcFreeRooms(Request $request)
	 {
		 
		 // Haal de Kamer info op (Kamer) en stop het in een array
		 $kamers = Room::all();
		 $free = [];
		 foreach( $kamers as $kamer)
		 {
			 $free += [ $kamer->kamernummer => $kamer->aantal_bedden];
		 }
		 
/*		 echo "Alle kamers<br />";
		 print_r($free);
		 echo "<br />";
 */
		 // overloop de overnachtingen. In de periode opgegeven in de
		 // Request haal je het kamernummer en verminder de waarde
		 // met 1 in de overeenkomstige free
		 //   haal all overnachtingen
		 $overnachtingen = Hotel::all();
		 //   als er geen overnachtingen zijn, dan is $free onmiddellijk goed
		 if (sizeof($overnachtingen) > 0)
		 {
			 // nu moet je alles overlopen
			 foreach ( $overnachtingen as $overnachting)
			 {
				$kamernummer = $overnachting->kamernummer;
//			 echo " In kamer ".$kamernummer." zijn er nu nog ".$free[$kamernummer]." bedden vrij. <br />"; 
				$free[$kamernummer]--;
			 }
			 
			 // overloop nu free en verwijder alle kamers met aantal_bedden <= 0
			 foreach ($free as $key=>$item)
			 {
//				  echo "item = ".$item."<br />";
				 if ($item <= 0) unset($free[$key]);
				
			 };
//			 dd($free);
		 }
		 
		 return $free;
	 }
}
