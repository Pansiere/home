import sqlite3

# Conecta ao banco de dados (ou cria se não existir)
conexao = sqlite3.connect('exemplo.db')

# Cria um cursor
cursor = conexao.cursor()

# Cria uma tabela
cursor.execute('''
CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY,
    nome TEXT,
    idade INTEGER
)
''')

# Insere alguns dados
cursor.execute('''
INSERT INTO usuarios (nome, idade) VALUES (?, ?)
''', ('Alice', 30))

cursor.execute('''
INSERT INTO usuarios (nome, idade) VALUES (?, ?)
''', ('Bob', 25))

# Confirma as mudanças
conexao.commit()

# Faz uma consulta
cursor.execute('SELECT * FROM usuarios')
usuarios = cursor.fetchall()

for usuario in usuarios:
    print(usuario)

# Fecha a conexão
conexao.close()