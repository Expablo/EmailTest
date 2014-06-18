 <div class="form">
    <h3>Cadastrar:</h3>
    <form action="admin.php" method="post">
        <p>
            <input type="hidden" name="acao" value="insert">
            <input type="text" name="matricula" placeholder="Matricula">
        </p>
        <p>
            <input type="text" name="nome" placeholder="Nome">
        </p>
            <input type="password" name="senha" placeholder="Senha">
        <p>
            <input type="date" name="data" placeholder="Data de Nascimento">
        </p>
        <p>
            <input class="submit" type="Submit" value="Salvar">
        </p>
    </form>
 </div>
