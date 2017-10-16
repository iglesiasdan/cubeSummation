
<html>
  <head>
    <title>Cube Summation </title>
    
  </head>
  <body>
  <div class="form-group">
    <form method="get" action="{{action('CubeSummationController@create') }}">
    <div class="form-group">
      <label for="query" class="col-lg-2 control-label">Query</label>
      <div class="col-lg-10">
          <textarea type="text" class="form-control" id="query" name="query" placeholder="Ingrese query"></textarea>
      </div>
    </div>
    <input type="submit"></input>
    </form>  
    <div class="form-group">
    <h1>Query Results</h1>
    @if($results)
    <h1>{{ $results }}</h1>
@endif
    
    </div>
 </div>
  </body>
</html>
