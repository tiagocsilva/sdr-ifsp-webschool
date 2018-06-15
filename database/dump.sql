CREATE TABLE Usuario (
	UsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    Email varchar(350),
    Senha varchar(350),
    Perfil INT
);

CREATE TABLE Materia (
	MateriaID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(350),
    Media FLOAT,
    UsuarioProfessorID INT REFERENCES Usuario(UsuarioID)
);

CREATE TABLE MateriaUsuarioNota(
    MateriaID INT,
    UsuarioID INT,
    Nota FLOAT NOT NULL,
    FOREGEIN KEY MateriaID REFERENCES Materia(MateriaID),
    FOREGEIN KEY UsuarioID REFERENCES Usuario(UsuarioID)
);

/* INSERT PROFESSORES */
INSERT INTO Usuario(Email,Senha,Perfil) VALUES('dani@ifsp.gov.br','8fc828b696ba1cd92eab8d0a6ffb17d6',2);
INSERT INTO Usuario(Email,Senha,Perfil) VALUES('carlos@ifsp.gov.br','9ad48828b0955513f7cf0f7f6510c8f8',2);
INSERT INTO Usuario(Email,Senha,Perfil) VALUES('andre@ifsp.gov.br','dd573120e473c889140e34e817895495',2);

/* INSERT MATERIAS */
INSERT INTO Materia(Nome,Media,UsuarioProfessorID) VALUES('Serviços de Rede',6,(SELECT UsuarioID FROM Usuario WHERE Email = 'carlos@ifsp.gov.br'));
INSERT INTO Materia(Nome,Media,UsuarioProfessorID) VALUES('Gestão de Projetos',6,(SELECT UsuarioID FROM Usuario WHERE Email = 'dani@ifsp.gov.br'));
INSERT INTO Materia(Nome,Media,UsuarioProfessorID) VALUES('Projetos de Sistemas 1',6,(SELECT UsuarioID FROM Usuario WHERE Email = 'andre@ifsp.gov.br'));
