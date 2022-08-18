<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    

    <title>News!</title>
  </head>
  <body>


        <form class="form-inline" role="search" action="/news" method="GET">
            <div class="form-group col-md-8">
                <label for="search">Query_string:</label>
                <textarea class="form-control col-md-12 mb-4" id="search" name="search" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
        </form>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Data</th>
                    <th>Url</th>
                    <th>Fontes</th>
                    <th>Conteúdo</th>
                </tr>
            </thead>
            <tbody>
               @foreach($news as $_news)
                <tr>
                    <th>{{ $_news->id }}</th>
                    <td>{{ $_news->title }}</td>
                    <td>{{ $_news->date }}</td>
                    <td><a href="{{ $_news->url }}" target="_blank">{{ $_news->url }}</a></td>
                    <td>{{ $_news->source }}</td>
                    <td>{{ $_news->contents }}</td>
                </tr>
                @endforeach 
                            
            </tbody>
        </table>
        <div class="form-group col-md-12">
            {{ $news->links() }}
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>