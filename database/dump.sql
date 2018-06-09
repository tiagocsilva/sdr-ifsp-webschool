CREATE TABLE Usuario (
	UsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    Email varchar(350),
    Senha varchar(350),
    Perfil INT,
    Cookie VARCHAR(150)
);

CREATE TABLE Materia (
	MateriaID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(350),
    Media FLOAT,
    UsuarioProfessorID INT REFERENCES Usuario(UsuarioID)
);

CREATE TABLE MateriaUsuarioNota(
	MateriaNotaID INT PRIMARY KEY AUTO_INCREMENT,
    MateriaID INT REFERENCES Materia(MateriaID),
    UsuarioID INT REFERENCES UsuarioID(UsuarioID),
    Nota FLOAT NOT NULL
);

/* INSERT PROFESSORES */
INSERT INTO Usuario VALUES('dani@ifsp.gov.br','dani123',2);
INSERT INTO Usuario VALUES('carlos@ifsp.gov.br','carlos123',2);
INSERT INTO Usuario VALUES('andre@ifsp.gov.br','andre123',2);

/* INSERT MATERIAS */
INSERT INTO Materia VALUES('Serviços de Rede',6,(SELECT UsuarioID FROM Usuario WHERE Email = 'carlos@ifsp.gov.br'));
INSERT INTO Materia VALUES('Gestão de Projetos',6,(SELECT UsuarioID FROM Usuario WHERE Email = 'dani@ifsp.gov.br'));
INSERT INTO Materia VALUES('Projetos de Sistemas 1',6,(SELECT UsuarioID FROM Usuario WHERE Email = 'andre@ifsp.gov.br'));