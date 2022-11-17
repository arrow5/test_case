<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CurrencySeeder extends Seeder
{
    protected $list = [
        [
            "name" => "Украинская гривна",
            "short_name" => "грн.",
            "name_iso" => "UAH",
            "code_iso" => "980",
            "symbol_iso" => "₴",
            "active" => false,
            "name1" => "Гривна",
            "name2" => "Гривны",
            "name3" => "Гривен",
        ],
        [
            "name" => "Доллар США",
            "short_name" => "доллар",
            "name_iso" => "USD",
            "code_iso" => "840",
            "symbol_iso" => "$",
            "active" => false,
            "name1" => "Доллар",
            "name2" => "Доллара",
            "name3" => "Долларов",
        ],
        [
            "name" => "Евро",
            "short_name" => "евро",
            "name_iso" => "EUR",
            "code_iso" => "978",
            "symbol_iso" => "€",
            "active" => false,
            "name1" => "Евро",
            "name2" => "Евро",
            "name3" => "Евро",
        ],
        [
            "name" => "Фунт стерлингов",
            "short_name" => "фунт",
            "name_iso" => "GBP",
            "code_iso" => "826",
            "symbol_iso" => "£",
            "active" => false,
            "name1" => "Фунт",
            "name2" => "Фунт",
            "name3" => "Фунт",
        ],
        [
            "name" => "Швейцарский франк",
            "short_name" => "франк",
            "name_iso" => "CHF",
            "code_iso" => "756",
            "symbol_iso" => "₣",
            "active" => false,
            "name1" => "Франк",
            "name2" => "Франка",
            "name3" => "Франков",
        ],
        [
            "name" => "Юань",
            "short_name" => "юань",
            "name_iso" => "CNY",
            "code_iso" => "156",
            "symbol_iso" => "¥",
            "active" => false,
            "name1" => "Юань",
            "name2" => "Юаня",
            "name3" => "Юаней",
        ],
        [
            "name" => "Тенге",
            "short_name" => "тенге",
            "name_iso" => "KZT",
            "code_iso" => "398",
            "symbol_iso" => "〒",
            "active" => false,
            "name1" => "Тенге",
            "name2" => "Тенге",
            "name3" => "Тенге",
        ],

        [
            "name" => "Белорусский рубль",
            "short_name" => "бел.руб.",
            "name_iso" => "BYN",
            "code_iso" => "974",
            "symbol_iso" => "р.",
            "active" => false,
            "name1" => "рубль",
            "name2" => "Рубля",
            "name3" => "Рублей",
        ],
        [
            "name" => "Японская иена",
            "short_name" => "иена",
            "name_iso" => "JPY",
            "code_iso" => "392",
            "symbol_iso" => "¥",
            "active" => false,
            "name1" => "Иена",
            "name2" => "Иены",
            "name3" => "Иен",
        ],
        [
            "name" => "Киргизский сом",
            "short_name" => "сом",
            "name_iso" => "KGS",
            "code_iso" => "417",
            "symbol_iso" => "c",
            "active" => false,
            "name1" => "Сом",
            "name2" => "Сома",
            "name3" => "Сомов",
        ],
        [
            "name" => "Турецкая лира",
            "short_name" => "лира",
            "name_iso" => "TRY",
            "code_iso" => "949",
            "symbol_iso" => "₺",
            "active" => false,
            "name1" => "Лира",
            "name2" => "Лиры",
            "name3" => "Лир",
        ],
        [
            "name" => "Сингапурский доллар",
            "short_name" => "синг. доллар",
            "name_iso" => "SGD",
            "code_iso" => "702",
            "symbol_iso" => "S$",
            "active" => false,
            "name1" => "Доллар",
            "name2" => "Доллара",
            "name3" => "Долларов",
        ],
        [
            "name" => "Южнокорейская вона",
            "short_name" => "вона",
            "name_iso" => "KRW",
            "code_iso" => "410",
            "symbol_iso" => "₩",
            "active" => false,
            "name1" => "Вона",
            "name2" => "Воны",
            "name3" => "Вон",
        ],
        [
            "name" => "Узбекский сум",
            "short_name" => "сум",
            "name_iso" => "UZS",
            "code_iso" => "4217",
            "symbol_iso" => "сўм",
            "active" => false,
            "name1" => "Сум",
            "name2" => "Сума",
            "name3" => "Сумов",
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency = new Currency();
        foreach ($this->list as $item)
        {
            Currency::create(Arr::only($item,$currency->getFillable()));
        }
    }
}
