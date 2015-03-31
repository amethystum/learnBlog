<h1>New MyArticles</h1>
{{ Form::open() }}
  <p>
    {{ Form::text('title') }}
  </p>
  <p>
    {{ Form::text('text') }}
  </p>
  <p>
    {{ Form::submit('submit') }}
  </p>
{{ Form::close() }
