<?php
require_once 'components/header.php';
require_once 'components/spinner.php';
?>

<body>
    <form>
        <h1>Editar Corretor</h1>
        <table>
            <tr>
                <td><input type="text" id="cpf" name="cpf" placeholder="Digite o seu CPF" required></td>
                <td><input type="text" id="creci" name="creci" placeholder="Digite o seu CRECI" required></td>
                <input type="hidden" id="id" name="id" required <?php echo 'value="' . $_GET['id'] . '"'; ?>>
            </tr>
            <tr>
                <td><input type="text" id="nome" name="nome" placeholder="Digite o seu Nome" required></td>
            </tr>
        </table>
        <button type="button" onclick="editarCorretor()">ALTERAR</button>
        <div class="div-flex">
            <a href="index.php">VOLTAR</a>
        </div>
    </form>


    <script>
        function editarCorretor() {
            showSpinner()
            const inputName = document.getElementById('nome');
            const inputCpf = document.getElementById('cpf');
            const inputCreci = document.getElementById('creci');
            const inputId = document.getElementById('id');
            fetch('http://localhost/back-end/routes/user/update.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        nome: inputName.value,
                        cpf: inputCpf.value,
                        creci: inputCreci.value,
                        id: inputId.value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);

                    } else {
                        alert(data.message);

                    }
                    hideSpinner()
                });
        }

        function buscarCorretor() {
            showSpinner()
            const inputName = document.getElementById('nome');
            const inputCpf = document.getElementById('cpf');
            const inputCreci = document.getElementById('creci');
            const inputId = document.getElementById('id');
            fetch('http://localhost/back-end/routes/user/getone.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        id: inputId.value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);

                    } else {
                        inputName.value = data.nome;
                        inputCpf.value = data.cpf;
                        inputCreci.value = data.creci;

                    }
                    hideSpinner()
                });
        }
        buscarCorretor();
    </script>
</body>

</html>