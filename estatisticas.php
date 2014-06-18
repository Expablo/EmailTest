<div class="estatisticas">
    <div class="estatistica-tittle">
        <h1>Estatisticas</h1>
        <span>Por Usuario</span>
    </div>
    <div class="estatistica-dados">
        <h3>Total msg Recebidas:</h3>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Total Mensagens</th>
                    <th>Porcentagem</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $total_m_u; ?>
            </tbody>
        </table>
        <h3>Total Msg Enviadas:</h3>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Total Mensagens</th>
                    <th>Porcentagem</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $total_m_enviadas; ?>
            </tbody>
        </table>
    </div>
</div>
