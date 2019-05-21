<?php

// voornaam: A-z{2,30}
// Achternaam: A-z{2,30}
// postcode: [0-9]{4} [A-Z]{2}



Class User {

    /**
     * The users data aray
     * @var array
     */
    private $userData = [];

    /**
     * Entry function
     * @param  string $voornaam
     * @param  string $achternaam
     * @param  string $straat
     * @return array  User data
     */
    public function convert($voornaam, $tussenvoegsel, $achternaam, $straat)
    {
        $this->uppercaseFirst($voornaam, 'voornaam');
        $this->userData['tussenvoegsel'] = $tussenvoegsel;
        $this->uppercaseFirst($achternaam, 'achternaam');
        $this->uppercaseFirstAll($straat, 'straat');


        return $this->userData;
    }

    /**
     * Convert to uppercase first
     * @param  string $text
     * @param  string $key
     * @return void
     */
    private function uppercaseFirst($text, $key)
    {
        $this->userData[$key] = ucfirst($text);
    }

    /**
     * Convert to uppercase each word
     * @param  string $text
     * @param  string $key
     * @return void
     */
    private function uppercaseFirstAll($text, $key)
    {
        $this->userData[$key] = ucwords($text);
    }

}

// initialiseer class
$user = new User;

// defineer variabelen
$voornaam = 'piet';
$tussenvoegsel = 'van der';
$achternaam = 'paulusma';
$straat = 'de gierpijp';
$huisnummer = '25';
$postcode = '1076ew';
$plaats = 'amsterdam';

// voer een actie uit op de class, en print die
print_r($user->convert($voornaam, $tussenvoegsel, $achternaam, $straat));
