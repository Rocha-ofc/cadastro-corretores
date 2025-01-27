<?php
require_once 'components/header.php';
require_once 'components/spinner.php';
?>

<body>
    <form>
        <h1>Cadastro de Corretores</h1>
        <table>
            <tr>
                <td><input type="text" id="cpf" name="cpf" placeholder="Digite o seu CPF" required></td>
                <td><input type="text" id="creci" name="creci" placeholder="Digite o seu CRECI" required></td>
            </tr>
            <tr>
                <td><input type="text" id="nome" name="nome" placeholder="Digite o seu Nome" required></td>
            </tr>
        </table>
        <button type="button" onclick="criarCorretor()">ENVIAR</button>
    </form>
    <table id="corretores">

    </table>

    <script>
        const corretores = document.getElementById('corretores');

        function listarCorretores() {
            showSpinner()
            const trs = corretores.querySelectorAll('tr');
            trs.forEach(tr => {
                tr.remove();
            });
            corretores.insertAdjacentHTML('afterbegin', `
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Nome</b></td>
                    <td><b>CRECI</b></td>
                    <td><b>CPF</b></td>
                    <td><b>Ações</b></td>
                </tr>`);

            fetch('http://localhost/back-end/routes/user/getall.php', {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    data.forEach(corretor => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${corretor.id}</td>
                            <td>${corretor.nome}</td>
                            <td>${corretor.creci}</td>
                            <td>${corretor.cpf}</td>
                            <td>
                                <button onclick="editarCorretor(${corretor.id})">Editar</button>
                                <button onclick="deletarCorretor(${corretor.id})">Deletar</button>
                                
                            </td>
                        `;
                        corretores.appendChild(row);
                    }); hideSpinner()
                });
        }

        function editarCorretor(id) {
            window.location.href = 'http://localhost/front-end/update.php?id=' + id;
        }


        function deletarCorretor(id) {

            if (window.confirm('Gostaria de apagar esse Corretor?')) {
                showSpinner()
                fetch('http://localhost/back-end/routes/user/delete.php', {
                        method: 'POST',
                        body: JSON.stringify({
                            id
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);

                        } else {
                            alert(data.message);
                            listarCorretores();
                        }
                        hideSpinner()
                    }); 
            }
        }

        function criarCorretor() {
            showSpinner()
            const inputName = document.getElementById('nome');
            const inputCpf = document.getElementById('cpf');
            const inputCreci = document.getElementById('creci');
            fetch('http://localhost/back-end/routes/user/create.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        nome: inputName.value,
                        cpf: inputCpf.value,
                        creci: inputCreci.value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);

                    } else {
                        inputName.value = '';
                        inputCpf.value = '';
                        inputCreci.value = '';
                        alert(data.message);
                        listarCorretores();
                    }
                    hideSpinner()
                });
        }
        listarCorretores();
    </script>
</body>

</html>