Enunciado<hr>
<br>
Usuários do serviço de
streaming RuralFlix serão cadastrados na base de dados, devendo ser
registrados seu e-mail principal (login), senha de acesso, nome, telefone, CPF,
endereço de cobrança e número de cartão de crédito para pagamento mensal.
A cada mês, a cobrança da mensalidade será emitida automaticamente,
debitada do cartão de crédito do usuário registrado no cadastro, e confirmada
ao usuário por e-mail. Caso não seja possível realizar a cobrança (por exemplo,
por bloqueio do cartão, etc) o usuário será avisado por e-mail e a mensalidade
ficará pendente. Com duas mensalidades pendentes, o usuário perderá o
acesso ao serviço RuralFlix. Ao acessar o serviço, o usuário poderá consultar o
catálogo de vídeos. Vídeos podem ser de três categorias: filmes, séries e
documentários. Sobre filmes, armazena-se o título, ano de produção, e
duração em minutos. Sobre cada episódio de séries, são registrados dados
sobre título, ano de produção, duração em minutos, temporada e número do
episódio. Para cada episódio, é armazenada também a identificação do
próximo episódio da mesma série, caso exista. Sobre documentários,
armazena-se o título, ano de produção, duração em minutos e nome da
produtora. Cada usuário poderá avaliar o vídeo que assistiu, dando a ele uma
DocuSign Envelope ID: 5DEA38A6-8088-4E84-8955-DFF0DED20D4F
nota entre 0 e 10. Apenas uma nota poderá ser dada por vídeo. Uma lista de
diretores e atores será também mantida, e associada ao catálogo de vídeos,
de modo que o usuário possa procurar por vídeos em que tenha atuado algum
ator ou atriz de sua preferência. Sobre cada ator, será armazenado seu nome,
data e local de nascimento.
<br>
<hr>Solução<hr>
<br>
Inicialmente, tenhos a entidade Usuário, aonde cada um possui a chave
primária identificadora CPF, bem como os atibutos nome, senha, login,
número do cartão, telefone, e o endereço de cobrança, que pode ser
atributo composto, é fragmentado em cinco campos, rua, bairro, cidade,
número e CEP.
Em seguida, temos a entidade Mensalidade, que é fraca e representa os
pagamentos a serem feitos pelos usuários por mês para continuar a ter
acesso ao RuralFlix, pois é dependente da entidade Usuário para a sua
existência, possuindo como atributos a chave primária identificadora
IDMensalidade, data_mes, referente ao mês da cobrança da mensalidade,
data_ano, referente ao ano, e o valor_pagamento, referente ao valor a ser
pago na mensalidade. As entidades Mensalidade e Usuário possuem um
relacionamento entre si chamado ‘Pagamento’, aonde um usuário possui
uma mensalidade, por mês, a pagar, e uma mensalidade pode ser paga por
diversos usuários, conferindo uma cardinalidade (1,1) -> (0,n).
Além disso, o sistema possui a entidade Videos, que representa os
conteúdos que o usuário pode acessar no RuralFlix, e que possui três
especializações exclusivas totais: episódios de séries, filmes e
documentários. Todos os vídeos possuem atributos como a chave primária
identificadora IDVideo, o título, ano em que foi lançada e duração, que são
os minutos de exibição da mesma. A especialização Episódio de Séries detém
os atributos Temporada e NumEpisodio (número do episódio), além de um
auto-relacionamento chamado ‘ProximoEpisodio’, no qual simboliza o
seguimento para o próximo episódio de uma determinada série. A
DocuSign Envelope ID: 5DEA38A6-8088-4E84-8955-DFF0DED20D4F
especialização Filmes carrega os mesmos atributos da entidade generalista
Videos. Por sua vez, já a especialização Documentários possui
NomeProdutora (nome da produtora) como atributo. A entidade Videos
possui uma relação com a entidade Usuario denominada ‘Avaliação’, que
possui um atributo nota, aonde um usuário pode avaliar nenhum ou até um
vídeo por vez, dando uma nota de 0 a 10, mas um vídeo pode ser avaliado
por vários usuários. Simultaneamente, a entidade Vídeos possui dois outros
relacionamentos, com a entidade Atores que representa todos os atores que
trabalham nos Videos, denominado ‘Atuação’, e outro com a de Diretores,
denominado ‘Direção’, aonde respectivamente, um Video, no caso um
filme, episódio de série ou documentário pode ter vários atores e diretores
trabalhando nestes, e esses profissionais podem trabalhar em nenhum ou
vários Videos. Atores e Diretores possuem os atributos chave primária
identificadora IDAtor e IDDiretor respectivamente, bem como Nome,
DataNascimento e LocalNascimento, determinando quais seus nomes, em
que data nasceram e em qual local, cada uma delas.
