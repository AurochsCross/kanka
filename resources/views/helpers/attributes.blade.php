<p>
    {!! __('helpers.attributes.description', [
'mention' => '<code>[entity:id]</code>',
'attribute' => '<code>{' . __('helpers.attributes.level') . '}</code>',
]) !!}
</p>
<p>
    {!! __('helpers.attributes.math', [
'example' => '<code>{' . __('helpers.attributes.level') . '}*{Con}</code>',
'floor' => '<code>floor({' . __('helpers.attributes.level') . '}/3)</code>',
'ceil' => '<code>ceil(({Con}*{' . __('helpers.attributes.level') . '})/2)</code>',
]) !!}
</p>

<p>
    {!! __('helpers.attributes.range', [
'example' => '<code>Level[range:1,10]</code>',
'reference' => '<code>HP[range:0,{MaxHP}]</code>']) !!}
</p>

<hr />
<p>
    {!! __('helpers.attributes.random', [
'dash' => '<code>-</code>',
'comma' => '<code>,</code>',
]) !!}
</p>

<p>{!! __('helpers.attributes.random_examples', [
    'number' => '<code>1-100</code>',
    'list' => '<code>London, Berlin, Rome, Zürich</code>',
]) !!}</p>

<hr />

<p>{!! __('helpers.attributes.name', [
    'name' => '<code>{name}</code>'
]) !!}</p>

<hr />
<p>
    {!! __('helpers.attributes.pinned', ['icon' => '<i class="fa-solid fa-star"></i>']) !!}
</p>
<p>
    {!! __('helpers.attributes.private', ['icon' => '<i class="fa-solid fa-lock"></i>']) !!}
</p>
