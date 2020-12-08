@component('mail::message')
Kreirana je nova čestitka s tekstom ispod:

# {{$content->header_text}}

{{$content->card_text}}

# {{$content->signature_text}}

@component('mail::button', ['url' => 'https://cestitke.online/api/cards/activate/'.$content->id])
Aktiviraj čestitku
@endcomponent

Ukoliko ne želite odobriti čestitku nikakva druga aktivnost nije potrebna.

Pozdrav,
{{ config('app.name') }}
@endcomponent
