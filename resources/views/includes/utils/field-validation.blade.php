@if($errors->has($field))
    <div class="invalid-feedback">
        {{ $errors->first($field) }}
    </div>
@else
<div class="invalid-feedback">
    {{ $message ?? '' }}
</div>
<div class="valid-feedback">
    Looks good!
</div>
@endif