
<div class="alert alert-success">
    New unique link was successfully generated!
</div>

<p>
    <strong>ID Page:</strong> {{ $slug }}
</p>

<a href="{{ route('pagea.show', ['link' => $slug]) }}" class="btn btn-primary">Go to Link Page</a>
