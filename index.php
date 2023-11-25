<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<meta http-equiv="Content-Language" content="pt-br">

<head>
    <?php
        include('header.php');
        $pagina = 'Home';
	?>
        <title>
            <?php echo $ttl." - ".$pagina ?>
        </title>
        <?php
            include('core/mod_includes/php/funcoes-jquery.php');
         ?>
</head>

<body>
    <div class="div-tudo">
        <header>
            <div class="linha">
                <div class="colunas lg-12 wow zoomIn">
                    <h1>
                        <span class="laranja">MultiB</span><span class="verde">&amp;</span><span class="azul">Varejo</span>
                    </h1>
                    <p class="data">
                        <span class="laranja">23/09 </span>
                        <span class="verde">das 17h </span>
                        <span class="azul">às 19h </span>
                    </p>
                </div>
            </div>
        </header>

        <main>
            <div class="linha">
                <div class="colunas lg-12">
                    <p class="texto">
                        Vamos falar sobre o mercado, tendências, comportamento do consumidor, estratégias e lançamentos que irão movimentar o mercado da beleza. Indústria e varejo JUNTOS construindo o melhor resultado!
                    </p>
                    <p class="texto">Serão duas horas de muito conteúdo. Sua presença é indispensável!</p>
                </div>
            </div>

            <div class="linha bloco-formulario">
                <h2>
                    Cadastre seus dados para participar
                </h2>
                <div class="colunas lg-12">
                    <form action='envia-formulario/' id='formulario' method='post'>
                        <div class="colunas lg-6">
                            <label for='nome'>*Nome</label>
                            <input type='text' name='nome' id='nome' title='Digite seu nome' required maxlength='50'>
                        </div>
                        <div class="colunas lg-6">
                            <label for='empresa'>*Empresa</label>
                            <input type='text' name='empresa' id='empresa' title='Digite o nome da sua empresa' required maxlength='80'>
                        </div>
                        <div class="colunas lg-6">
                            <label for='telefone'>*Telefone</label>
                            <input type='text' onkeypress='return mascaraTELEFONE(this);' maxlength='15' name='telefone' id='telefone' title='Digite seu telefone (apenas números)' required>
                        </div>
                        <div class="colunas lg-6">
                            <label for='email'>*E-mail</label>
                            <input type='email' name='email' id='email' title='Digite seu e-mail' maxlength='50' required>
                        </div>
                        <div class="colunas lg-4" style="float: right">
                            <button type='submit' class='btnEnviar' title='Enviar' class='placeholder'>Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="linha">
                <div class="colunas lg-12">
                    <div class="logo wow zoomIn">
                        <img src="core/imagens/logo.png" title="Multi e varejo sempre juntos " alt="Multi e varejo sempre juntos ">
                    </div>
                    <div class="linha bloco-parceiros">

                        <div class="colunas lg-2 md-6 pq-6 wow zoomIn">
                            <img src="core/imagens/vult.png" title="Vult" alt="Vult">
                        </div>
                        <div class="colunas lg-2 md-6 pq-6 wow zoomIn">
                            <img src="core/imagens/eume.png" title="EUME" alt="eume">
                        </div>
                        <div class="colunas lg-2 md-6 pq-6 wow zoomIn">
                            <img src="core/imagens/biooil.png" title="Bio-Oil" alt="Bio-Oil">
                        </div>
                        <div class="colunas lg-2 md-6 pq-6 wow zoomIn">
                            <img src="core/imagens/australian.png" title="Australian Old" alt="Australian Old">
                        </div>
                        <div class="colunas lg-2 md-6 pq-6 wow zoomIn">
                            <img src="core/imagens/siage.png" title="Siage" alt="Siage">
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="linha" style="padding: 0px">
                <div class="colunas lg-12" style="padding: 0px">

                    ©
                    <?php echo date('Y'); ?> Copyright - Todos os direitos reservados

                    <a href="http://www.ncwbrasil.com.br" target="_blank" style="margin-left: 40px">
                        <img src="core/imagens/ncw.png" width="40" alt="NCW Brasil" title="NCW Brasil" />
                    </a>

                </div>
            </div>
        </footer>
    </div>

</body>

</html>