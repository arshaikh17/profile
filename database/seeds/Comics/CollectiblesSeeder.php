<?php

use Illuminate\Database\Seeder;

use App\Models\Comics\{
	Collectible,
	Character
};

class CollectiblesSeeder extends Seeder
{
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		$collectibles					 =	[
			[
				"name"					 =>	"Batman Incorporated Suit",
				"description"			 =>	"",
				"price"					 =>	"£377.43",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/9045511/batman-incorporated-suit_dc-comics_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/dc-comics-batman-incorporated-suit-prime-1-studio-904551?var=9045511",
				"height"				 =>	"19.29",
				"width"					 =>	"13.46",
				"depth"					 =>	"10.12",
				"order_id"				 =>	"AAD98645",
				"character_id"			 =>	Character::where("name", "=", "Batman")->first()->id ?: null,
				"scale_id"				 =>	5,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	2,
				"brand_id"				 =>	1,
			],
			[
				"name"					 =>	"Batman Beyond",
				"description"			 =>	"",
				"price"					 =>	"£500.16",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/3007211/batman-beyond_dc-comics_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/dc-comics-batman-beyond-sideshow-collectibles-300721",
				"height"				 =>	"21",
				"width"					 =>	"17",
				"depth"					 =>	"17",
				"order_id"				 =>	bin2hex(random_bytes(9)),
				"character_id"			 =>	Character::where("name", "=", "Batman")->first()->id ?: null,
				"scale_id"				 =>	4,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	1,
				"brand_id"				 =>	1,
			],
			[
				"name"					 =>	"Ninja Batman Deluxe Version",
				"description"			 =>	"",
				"price"					 =>	"£1,091.94",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/903394/ninja-batman-deluxe-version_dc-comics_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/dc-comics-ninja-batman-deluxe-version-prime-1-studio-903394",
				"height"				 =>	"37.87",
				"width"					 =>	"25.74",
				"depth"					 =>	"22",
				"order_id"				 =>	"AAD73491",
				"character_id"			 =>	Character::where("name", "=", "Batman")->first()->id ?: null,
				"scale_id"				 =>	3,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	2,
				"brand_id"				 =>	1,
			],
			[
				"name"					 =>	"Batman Hush",
				"description"			 =>	"",
				"price"					 =>	"£57.15",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/904612/batman-hush_dc-comics_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/dc-comics-batman-hush-kotobukiya-904612",
				"height"				 =>	"6.30",
				"width"					 =>	"9.00",
				"depth"					 =>	"10.00",
				"order_id"				 =>	"AAD26739",
				"character_id"			 =>	Character::where("name", "=", "Batman")->first()->id ?: null,
				"scale_id"				 =>	10,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	4,
				"brand_id"				 =>	1,
			],
			[
				"name"					 =>	"Batman Deluxe",
				"description"			 =>	"",
				"price"					 =>	"£130.29",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/904434/batman-deluxe_dc-comics_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/dc-comics-batman-deluxe-iron-studios-904434",
				"height"				 =>	"11",
				"width"					 =>	"8.2",
				"depth"					 =>	"6.6",
				"order_id"				 =>	"AAD00579",
				"character_id"			 =>	Character::where("name", "=", "Batman")->first()->id ?: null,
				"scale_id"				 =>	10,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	5,
				"brand_id"				 =>	1,
			],
			[
				"name"					 =>	"Super Powers Batman Variant",
				"description"			 =>	"",
				"price"					 =>	"£231.16",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/904048/super-powers-batman-variant_dc-comics_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/dc-comics-super-powers-batman-variant-tweeterhead-904048",
				"height"				 =>	"18",
				"width"					 =>	"17",
				"depth"					 =>	"17",
				"order_id"				 =>	"AAC99714",
				"character_id"			 =>	Character::where("name", "=", "Batman")->first()->id ?: null,
				"scale_id"				 =>	6,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	6,
				"brand_id"				 =>	1,
			],
			[
				"name"					 =>	"Batman (Dark Knight)",
				"description"			 =>	"",
				"price"					 =>	"£197.54",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/904784/batman-dark-knight_dc-comics_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/dc-comics-batman-dark-knight-tweeterhead-904784",
				"height"				 =>	"12.5",
				"width"					 =>	"15",
				"depth"					 =>	"15",
				"order_id"				 =>	"AAD24989",
				"character_id"			 =>	Character::where("name", "=", "Batman")->first()->id ?: null,
				"scale_id"				 =>	10,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	6,
				"brand_id"				 =>	1,
			],
			[
				"name"					 =>	"Scorpion",
				"description"			 =>	"",
				"price"					 =>	"£374.06",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/9038421/scorpion_mortal-kombat_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/mortal-kombat-scorpion-pop-culture-shock-903842?var=9038421",
				"height"				 =>	"21",
				"width"					 =>	"15",
				"depth"					 =>	"10.12",
				"order_id"				 =>	"AAD24989",
				"character_id"			 =>	Character::where("name", "=", "Sub-Zero")->first()->id ?: null,
				"scale_id"				 =>	4,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	7,
				"brand_id"				 =>	4,
			],
			[
				"name"					 =>	"Sub-Zero",
				"description"			 =>	"AAD68585",
				"price"					 =>	"£374.06",
				"image"					 =>	"https://www.sideshow.com/storage/product-images/902878/sub-zero_mortal-kombat_silo.png",
				"link"					 =>	"https://www.sideshow.com/collectibles/mortal-kombat-sub-zero-pop-culture-shock-902878",
				"height"				 =>	"21",
				"width"					 =>	"13.46",
				"depth"					 =>	"10.12",
				"order_id"				 =>	"AAD24989",
				"character_id"			 =>	Character::where("name", "=", "Scorpion")->first()->id ?: null,
				"scale_id"				 =>	4,
				"bought_from_id"		 =>	1,
				"manufacturer_id"		 =>	7,
				"brand_id"				 =>	4,
			],
		];
		
		foreach ($collectibles as $collectible) {
			
			Collectible::create($collectible);
			
		}
		
	}
	
}
