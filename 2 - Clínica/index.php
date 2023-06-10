<html>
  <head>
   <style>
      button {
        font-size: 20px;
        color: white;
        background-color: blue;
      }

      h1 {
        text-align: center;
        line-height: 1;
        height: 100px;
        color: lightgreen;
      }

      input,
      button {
        display: block;
        margin: 0 auto;
		font-size: 20px;
        color: white;
        background-color: olivedrab;
      }

	  
      body {
        background-color: #228B22;
      }
	  
	

    </style>
    <h1>Painel de Opções</h1>
  </head>
  <body>
    <button onclick="window.location.href = 'inserepaciente.php'">Insere Paciente</button>
    <button onclick="window.location.href = 'inseremedico.php'">Insere Médico</button>
	<button onclick="window.location.href = 'internapaciente.php'">Insere Formação Médica</button>
    <button onclick="window.location.href = 'internapaciente.php'">Interna Paciente</button>
    <button onclick="window.location.href = 'altapaciente.php'">Dar Alta em Paciente</button>
    <button onclick="window.location.href = 'listarmedicos.php'">Listar Médicos</button>
	<button onclick="window.location.href = 'listarpacientes.php'">Listar Pacientes</button>
	<button onclick="window.location.href = 'removemedico.php'">Remover Médico da Base de Dados</button>
	<button onclick="window.location.href = 'removepaciente.php'">Remover Paciente da Base de Dados</button>
	<button onclick="window.location.href = 'alterapaciente.php'">Alterar Informações de Paciente da Base de Dados</button>
</body>
</html>
