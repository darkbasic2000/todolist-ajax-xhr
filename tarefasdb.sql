CREATE DATABASE listadetarefas;

CREATE TABLE tarefas (
    id INT NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL,
    prioridade ENUM ('BAIXA', 'MÉDIA', 'ALTA') NOT NULL,
    concluida ENUM ('SIM', 'NÃO') NOT NULL DEFAULT 'NÃO',
    PRIMARY KEY(id)
);