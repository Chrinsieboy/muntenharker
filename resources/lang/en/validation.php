<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'De :attribute moet geaccepteerd worden.',
    'accepted_if' => 'De :attribute moet geaccepteerd zijn als :other ook :value is.',
    'active_url' => 'De :attribute is niet een geldige URL.',
    'after' => 'De :attribute moet een datum zijn na :date.',
    'after_or_equal' => 'De :attribute moet een datum gelijk of na :date zijn.',
    'alpha' => 'De :attribute mag alleen letters zijn.',
    'alpha_dash' => 'De :attribute mag alleen letters, numners, strepen and lage strepen bevatten.',
    'alpha_num' => 'De :attribute mag alleen letters and nummers bevatten.',
    'array' => 'De :attribute moet een lijst zijn.',
    'before' => 'De :attribute moet een datum vóór :date zijn.',
    'before_or_equal' => 'De :attribute moet een datum vóór of gelijk aan :date zijn.',
    'between' => [
        'numeric' => 'De :attribute moet tussen :min en :max zijn.',
        'file' => 'De :attribute moet tussen :min en :max kb (kilobytes) zijn.',
        'string' => 'De :attribute moet tussen :min en :max karakters zijn.',
        'array' => 'De :attribute moet tussen :min en :max items zijn.',
    ],
    'boolean' => 'De :attribute moet waar of niet waar zijn.',
    'confirmed' => 'De :attribute bevestiging is niet gelijk.',
    'current_password' => 'Het wachtwoord is onjuist.',
    'date' => 'De :attribute is niet een geldige datum.',
    'date_equals' => 'De :attribute moet een datum gelijk aan :date zijn.',
    'date_format' => 'De :attribute gaat niet gelijk aan het formaat :format.',
    'declined' => 'De :attribute moet afgewezen zijn.',
    'declined_if' => 'De :attribute moet afgewezen zijn wanneer :other , :value is.',
    'different' => 'De :attribute en :other moeten anders zijn.',
    'digits' => 'De :attribute moet :digits nummers zijn.',
    'digits_between' => 'De :attribute moet tussen :min en :max nummers zijn.',
    'dimensions' => 'De :attribute heeft ongeldige afbeelding dimensies.',
    'distinct' => 'De :attribute veld heeft dezelfde waarden.',
    'email' => 'De :attribute moet een geldige email adres zijn.',
    'ends_with' => 'De :attribute moet eindigen met 1 van de volgende: :values.',
    'enum' => 'De geselecteerde :attribute is onjuist.',
    'exists' => 'De geselecteerde :attribute is onjuist.',
    'file' => 'De :attribute moet een bestand zijn.',
    'filled' => 'De :attribute veld moet ingevuld zijn.',
    'gt' => [
        'numeric' => 'De :attribute  moet groter dan :value zijn.',
        'file' => 'De :attribute  moet groter dan :value kb (kilobytes) zijn.',
        'string' => 'De :attribute  moet groter dan :value karakters zijn.',
        'array' => 'De :attribute moet groter dan :value items zijn.',
    ],
    'gte' => [
        'numeric' => 'De :attribute moet groter of gelijk aan to :value.',
        'file' => 'De :attribute moet groter of gelijk aan :value kb (kilobytes) zijn.',
        'string' => 'De :attribute moet groter of gelijk aan :value karakters zijn.',
        'array' => 'De :attribute moet :value items of meer zijn.',
    ],
    'image' => 'De :attribute moet een afbeelding zijn.',
    'in' => 'De geselecteerde :attribute is onjuist.',
    'in_array' => 'De :attribute veld bestaat niet in :other.',
    'integer' => 'De :attribute moet een nummer zijn.',
    'ip' => 'De :attribute moet een juiste IP adres zijn.',
    'ipv4' => 'De :attribute moet een juiste IPv4 adres zijn.',
    'ipv6' => 'De :attribute moet een juiste IPv6 adres zijn.',
    'mac_address' => 'De :attribute moet een juiste MAC adres zijn.',
    'json' => 'De :attribute moet een juiste JSON waarde zijn.',
    'lt' => [
        'numeric' => 'The :attribute moet minder dan :value zijn.',
        'file' => 'The :attribute moet minder dan :value kb (kilobytes) zijn.',
        'string' => 'The :attribute moet minder dan :value karakters zijn.',
        'array' => 'The :attribute moet minder dan :value items zijn.',
    ],
    'lte' => [
        'numeric' => 'De :attribute moet lager of gelijk zijn aan :value.',
        'file' => 'De :attribute moet lager of gelijk zijn aan :value kb (kilobytes).',
        'string' => 'De :attribute moet lager of gelijk zijn aan :value karakters.',
        'array' => 'De :attribute mag niet meer dan :value items zijn.',
    ],
    'max' => [
        'numeric' => 'De :attribute mag niet meer dan :max zijn.',
        'file' => 'De :attribute mag niet meer dan :max kb (kilobytes) zijn.',
        'string' => 'De :attribute mag niet meer dan :max karakters bevatten.',
        'array' => 'De :attribute mag niet meer dan :max items bevatten.',
    ],
    'mimes' => 'De :attribute moet een bestand zijn van: :values.',
    'mimetypes' => 'De :attribute moet een bestand zijn van: :values.',
    'min' => [
        'numeric' => 'De :attribute moet tenminste :min zijn.',
        'file' => 'De :attribute moet tenminste :min kb (kilobytes) zijn.',
        'string' => 'De :attribute moet tenminste :min karakters bevatten.',
        'array' => 'De :attribute moet tenminste :min items bevatten.',
    ],
    'multiple_of' => 'De :attribute moet de meerderheid zijn van :value.',
    'not_in' => 'Het geselecteerde :attribute is onjuist.',
    'not_regex' => 'De :attribute formaat is onjuist.',
    'numeric' => 'De :attribute moet een nummer zijn.',
    'password' => 'Het wachtwoord is onjuist.',
    'present' => 'De :attribute veld moet aanwezig zijn.',
    'prohibited' => 'De :attribute veld is verboden.',
    'prohibited_if' => 'De :attribute veld is verboden wanneer :other ook :value is.',
    'prohibited_unless' => 'De :attribute veld is verboden behalve als :other in :values is.',
    'prohibits' => 'De :attribute veld verbied :other aanwezig te zijn.',
    'regex' => 'De :attribute formaat is onjuist.',
    'required' => 'De :attribute veld is verplicht.',
    'required_if' => 'De :attribute veld is verplicht wanneer :other ook :value is.',
    'required_unless' => 'De :attribute veld is verplicht behalve als :other is in :values.',
    'required_with' => 'De :attribute veld is verplicht wanneer :values aanwezig zijn.',
    'required_with_all' => 'De :attribute veld is verplicht wanneer :values aanwezig zijn.',
    'required_without' => 'De :attribute veld is verplicht wanneer :values niet aanwezig zijn.',
    'required_without_all' => 'De :attribute veld is verplicht wanneer :values aanwezig zijn.',
    'same' => 'De :attribute en :other moeten hetzelfde zijn.',
    'size' => [
        'numeric' => ':attribute moet een :size zijn.',
        'file' => ':attribute moet :size kb (kilobytes) zijn.',
        'string' => ':attribute moet een lengte van :size karakters hebben.',
        'array' => ':attribute moet :size dingen bevatten.',
    ],
    'starts_with' => ':attribute moet starten met een van de onderstaande: :values.',
    'string' => ':attribute moet een woord zijn.',
    'timezone' => ':attribute moet een geldige tijzone zijn.',
    'unique' => ':attribute is al in gebruik.',
    'uploaded' => ':attribute heeft gefaald met uploaden.',
    'url' => ':attribute moet een geldige URL zijn.',
    'uuid' => ':attribute moet een geldige UUID zijn.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
