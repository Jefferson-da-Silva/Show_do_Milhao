-- Inserindo Jogador e Professor
INSERT INTO Jogador (idJogador,Nome,Instituicao,Equipe,CPF,Email,Senha) 
values(10,'Jefferson','FTC','BOPE',45678902312,'jefferson@gmail.com',1234567);
INSERT INTO Professor (idProfessor,Nome,CPF,Email,Curriculo,Instituicao,Titulacao,Senha) 
values(1,'Randler',45678902312,'randler123@gmail.com','http:/www.randler.com','Fainor','Mestre',1234567);
-- Inserindo Curso 
INSERT INTO Curso (idCurso,Descricao_Curso,Grande_Area) values(12,'Sistemas de Informacao','Exatas');
-- Inserindo Disciplina
INSERT INTO Disciplina (idDisciplina,Descricao_Disciplina,Curso_idCurso) values(2,'Programacao1',12);
-- Inserindo Assunto
INSERT INTO Assunto (idAssunto,Descricao_Assunto,Disciplina_idDisciplina,Disciplina_Curso_idCurso) 
values(3,'Funcoes e metodos',2,12);
-- Inserindo Jogo
INSERT INTO Jogo (idJogo,Curso_idCurso,Professor_idProfessor) values(4,12,1);
-- Inserindo Partida
INSERT INTO Partida (idPartida,Data,Hora,Duracao,Pontuacao,Jogador_idJogador,Jogo_idJogo,Jogo_Curso_idCurso,
Jogo_Professor_idProfessor)
values(5,'YYYY-MM-DD','HH:MM:SS',60,500.00,10,4,12,1);
-- Inserindo Pergunta
INSERT INTO Perguntas (idPerguntas,Enunciado,RespostaCorreta,Alternativa_1,Alternativa_2,Alternativa_3,
Alternativa_4,Alternativa_5,Jogo_idJogo) 
values(6,'Qual a estrutura de uma funcao','public function teste()','fucao nome_funcao()',
'java metodo teste()','php function teste()','teste() function','python function teste()',4);	
