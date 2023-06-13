Enunciado:<br>
Cada obra no museu possui um código, um título e um ano. Obras ou são pinturas ou são esculturas. <br>
No primeiro caso, são dados importantes o estilo (por exemplo, impressionista). No caso de esculturas, são importantes o peso e os materiais de que é feita (por exemplo, argila, madeira, etc). <br>
Uma obra pode estar exposta em um único salão, em uma determinada posição neste salão. <br>
Um salão, que geralmente abriga várias obras, é identificado por um número e está em um andar do museu. <br>
Certos dados a respeito dos autores de cada obra também são relevantes: código, nome e nacionalidade. <br>
Uma obra é produzida por apenas um autor, porém, pode existir mais de uma obra de um mesmo autor no museu. <br>
No museu trabalham funcionários, cada um possuindo um ID, CPF, um nome e um salário. <br>
Funcionários ou são guardas ou são restauradores de obras. <br>
No primeiro caso, mantêm-se dados sobre a hora de entrada e hora de saída. No caso de restauradores, qual a sua especialidade. <br>
Um guarda é responsável pela segurança de um único salão, que pode ser vigiado por vários guardas. <br>
Um restaurador pode estar realizando a manutenção de várias obras. <br>
Uma obra, caso esteja em manutenção, está nas mãos de apenas um restaurador. <br>
Para cada manutenção deve-se registrar a data de início e a data prevista de término do trabalho, uma descrição do serviço a ser feito e um custo previsto para realizar a manutenção. <br>
Uma manutenção pode estar utilizando uma ou mais matérias-primas. 
Uma matéria-prima possui um código, um nome e uma quantidade em estoque. Uma matéria-prima pode estar sendo utilizada em várias manutenções, em uma certa quantidade.<br>
<hr>
- Arquivos:
<hr>
index.php - Lista as operações possíveis.
<hr>
cadastrarfuncionario.php, cadastrarobra.php, inserirautor.php, registrasalao.php e registrarmateriaprima.php - Cadastram, respectivamente,
novos funcionários <br>, obras, autores, salões e matérias-primas a serem usadas em manutenções nas tabelas da base de dados.
<hr>
demitefuncionario.php, removerobra.php - Demite um funcionário excluindo-o da base de dados, e o segundo faz o mesmo com obra.
<hr>
listarfuncionarios.php, listarobras.php, listamanutencoes.php - Lista todos os funcionários e obras, respectivamente, e também exibe <br>
informações específicas clicando nos índices dos mesmos, por meio do uso dos arquivos (detalhes_funcionarios.php, detalhes_salao.php e <br>
detalhes_autor.php). E enfim, o último lista todas as manutenções realizadas exibindo as informações relevantes.
<hr>
requeremanutencao.php - Faz o pedido de manutenção, multiplicando o custo unitário da matéria-prima pela quantidade e guardando na tabela<br>
de manutencao, exibindo na aba Custo Previsto.
<hr>
