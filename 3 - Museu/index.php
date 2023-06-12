<html>
  <head>
   <style>
      h1 {
        text-align: center;
        line-height: 1;
        height: 100px;
        color: white;
      }

      input,
      button {
        display: block;
        margin: 0 auto;
		font-size: 20px;
        color: white;
        background-color: maroon;
      }

	  
      body {
        background-color: #DC143C;
      }
	  
	

    </style>
    <h1>Sistema do Museu</h1>
  </head>
  <body>
    <button onclick="window.location.href = 'inserirautor.php'">Inserir Autor</button>
    <button onclick="window.location.href = 'registrarsalao.php'">Registrar Salão</button>
	<button onclick="window.location.href = 'cadastrarobra.php'">Cadastrar Obra</button>
    <button onclick="window.location.href = 'cadastrarfuncionario.php'">Cadastrar Funcionário</button>
    <button onclick="window.location.href = 'registrarmateriaprima.php'">Registrar Matéria-Prima</button>
    <button onclick="window.location.href = 'requeremanutencao.php'">Requerir Manutenção</button>		
    <button onclick="window.location.href = 'demitefuncionario.php'">Demitir Funcionário</button>
    <button onclick="window.location.href = 'removerobra.php'">Remover Obra</button>
	<button onclick="window.location.href = 'listarobras.php'">Listar Obras</button>
	<button onclick="window.location.href = 'listarfuncionarios.php'">Listar Funcionários</button>
	<button onclick="window.location.href = 'listamanutencoes.php'">Listar Manutenções</button>
</body>
</html>
