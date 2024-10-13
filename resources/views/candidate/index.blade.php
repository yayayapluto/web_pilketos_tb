<x-alert />
<div>
    @forelse ($candidates as $c)
        <strong>{{$c->candidate_id}}</strong>
        <li>{{$c->image}}</li>
        <li>{{$c->name}}</li>
        <li>{{$c->description}}</li>
        <li>{{$c->external_link}}</li>
        <br>
    @empty
        <li>Kosong</li>
    @endforelse
</div>
