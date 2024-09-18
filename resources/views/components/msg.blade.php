<div {{$attributes->merge(['class'=>'alert alert-'.$validType])}} role="alert">
    @isset($title)
        <h4 {{$title->attributes->class(['alert-heading'])}}>{{$title}}</h4>
        <hr>
    @endisset
    @if ($slot->isEmpty())
        <p>Paragraph tag empty!</p>
    @else
        {{$slot}}
    @endif
</div>


{{-- <div {{$attributes->merge(['class'=>'alert alert-'.$validType])}} role="alert">
    {{$message}}
</div> --}}

{{-- <div class="alert alert-{{$validType}}" {{$attributes}}>
    {{$slot}}
</div> --}}