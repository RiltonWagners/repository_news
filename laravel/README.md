
## As notícias estão no arquivo data/news.csv.

## Banco de dados - PostgreSQL

	Tabelas: users e news
	Foi importado o arquivo csv contendo as notícias para a tabela news.
	
###### Foram criadas duas Triggers na tabela news para registrar o timestamp das operações Update e Insert (Necessário para ser considerado na sincronização com o Elasticsearch) 

	CREATE FUNCTION updated_at()
	RETURNS TRIGGER AS $$
	BEGIN
		NEW.updated_at = now();
		RETURN NEW;
	END;
	$$ LANGUAGE 'plpgsql';


	CREATE TRIGGER "updated_at_update" 
	BEFORE UPDATE OF "id", "created_at", "updated_at", "title", "date", "url", "source", "contents" ON "news"
	FOR EACH ROW
	EXECUTE PROCEDURE updated_at();



	CREATE FUNCTION created_at()
	RETURNS TRIGGER AS $$
	BEGIN
		NEW.created_at = now();
		NEW.updated_at = now();
		RETURN NEW;
	END;
	$$ LANGUAGE 'plpgsql';


	CREATE TRIGGER "created_at_insert" 
	BEFORE INSERT ON "news"
	FOR EACH ROW
	EXECUTE PROCEDURE created_at();


## Instancias do Elasticsearch
elasticsearch-8.3.3

	Índice: news2
	http://localhost:9200/news2
	
	Inicializar: elasticsearch-8.3.3\bin> elasticsearch
	
	
kibana-8.3.3

	http://localhost:5601
	Inicializar: kibana-8.3.3\bin> kibana


logstash-8.3.3

	As sincronização das notícias acontece com Postgre e o Elasticsearch utilizando o logstash (logstash.conf).
	Colocar o arquivo: Jar/postgresql-42.4.2.jar na pasta logstash-8.3.3\logstash-core\lib\jars
	
	Inicializar: \logstash-8.3.3\bin>logstash -f logstash.conf
	


## Laravel

	Lista/Pesquisa notícias
	http://localhost:8000/news



# API
## Endpoints Notícias (News - Elasticsearch)

	localhost:9200/news/_search

## Endpoints Notícias (News - Postgree)

Lista todas as notícias

	GET	http://localhost:8000/api/news


Cadastra notícia

	POST	http://localhost:8000/api/news/
	Request Headers
		Accept		application/json
		Content-Type	application/json

	Body
		form-data
			KEY	title
			KEY	date
			KEY	url
			KEY	source
			KEY	contents


Lista notícia por id

	GET	http://localhost:8000/api/news/$id


Atualiza notícia por id

	PUT	http://localhost:8000/api/news

	Request Headers
		Accept		application/json
		Content-Type	application/json
	
	Body
		data-raw 
		{
			"title": "example 1",
			"date": "17/08/2022  12:00:00",
			"url": "http://jornaldotocantins.com.br/editorias/vida-urbana/judici%C3%A1rio-1.1694946/a-pobreza-nas-elei%C3%A7%C3%B5es-1.2505828",
			"source": "example 2",
			"contents": "example 3"
		}


Remove notícia por id

	DELETE	http://localhost:8000/api/news/$id


## Endpoints Usuário (User - Postgree)

Lista todos os usuários

	GET	http://localhost:8000/api/user


Cadastra usuário

	POST	http://localhost:8000/api/user/
	Request Headers
		Accept			application/json
		Content-Type	application/json

	Body
		form-data
			KEY	name
			KEY	email
			KEY	password


Lista usuário por id

	GET	http://localhost:8000/api/user/$id


Atualiza usuário por id

	PUT	http://localhost:8000/api/user/$id

	Request Headers
		Accept			application/json
		Content-Type	application/json
	
	Body
		data-raw 
		{
			"name": "Rilton",
			"email": "riltonwagners@gmail.com",
			"password": "5f4dcc3b5aa765d61d8327deb882cf99" //password
		}


Remove usuário por id

	DELETE	http://localhost:8000/api/user/$id
