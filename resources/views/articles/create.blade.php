@include('notifications')

<h1>New MyArticles</h1>
{!! Form::open(array('url' => 'articles')) !!}
  <p>
    {!! Form::text('title') !!}
  </p>
  <p>
    {!! Form::text('text') !!}
  </p>
  <p>
    {!! Form::submit('submit') !!}
  </p>
{!! Form::close() !!}
{!! link_to_route('articles.index', 'Back') !!}


