
@foreach ($cards_list as $card)
	"{{ $card->id }}","{{ $card->class }}","{{ $card->name }}","{{ $card->level }}","{{ $card->attribute }}","{{ $card->type }}","{{ $card->attack }}","{{ $card->defence }}","{{ $card->description }}"][
@endforeach