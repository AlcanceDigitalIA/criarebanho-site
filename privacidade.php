<?php
require_once __DIR__ . '/includes/security.php';
$pagina_titulo = 'Política de Privacidade — Cria Rebanho Pro';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pagina_titulo) ?></title>
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://criarebanho.app.br/privacidade">
  <link rel="icon" type="image/png" href="img/icon.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
  <a href="/" class="nav-logo">
    <img src="img/icon.png" alt="Cria Rebanho Pro" width="36" height="36">
    <span>Cria Rebanho Pro</span>
  </a>
</nav>

<div class="content-page">
  <h1>Política de Privacidade</h1>
  <p class="updated">Última atualização: <?= date('d') ?> de <?= ['janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro'][date('n')-1] ?> de <?= date('Y') ?></p>

  <div class="highlight">
    <p>Resumo: O Cria Rebanho Pro armazena seus dados principalmente no seu próprio celular. Coletamos apenas o mínimo necessário para o funcionamento do app e nunca vendemos seus dados.</p>
  </div>

  <h2>1. Quem somos</h2>
  <p>O <strong>Cria Rebanho Pro</strong> é um aplicativo de gestão de rebanho bovino desenvolvido por Anderson Lopes de Oliveira, disponível para dispositivos Android. Para dúvidas, entre em contato pelo e-mail <a href="mailto:contato@criarebanho.app.br">contato@criarebanho.app.br</a>.</p>

  <h2>2. Quais dados coletamos</h2>
  <p>O aplicativo pode coletar e armazenar os seguintes dados:</p>
  <ul>
    <li><strong>Dados de cadastro:</strong> endereço de e-mail e senha, utilizados para criar sua conta e permitir o login.</li>
    <li><strong>Dados da fazenda:</strong> nome da propriedade, município, estado e telefone — preenchidos pelo próprio usuário.</li>
    <li><strong>Dados do rebanho:</strong> animais, eventos sanitários, pesagens, reprodução, piquetes e lançamentos financeiros inseridos pelo usuário.</li>
    <li><strong>Dados de plano:</strong> identificação do plano (gratuito ou premium) e validade da assinatura.</li>
  </ul>

  <h2>3. Como os dados são armazenados</h2>
  <ul>
    <li><strong>Localmente no dispositivo:</strong> todos os dados são salvos no próprio celular usando banco de dados SQLite. O app funciona completamente offline.</li>
    <li><strong>Na nuvem (Supabase):</strong> quando há conexão, os dados sincronizam com nosso servidor com criptografia HTTPS para backup e acesso em múltiplos dispositivos.</li>
  </ul>

  <h2>4. Para que usamos os dados</h2>
  <ul>
    <li>Permitir o funcionamento do app e o acesso à sua conta</li>
    <li>Sincronizar seus dados entre dispositivos</li>
    <li>Fazer backup seguro na nuvem</li>
    <li>Verificar o status do plano Premium</li>
    <li>Enviar notificações de eventos cadastrados pelo próprio usuário</li>
  </ul>

  <h2>5. Compartilhamento de dados</h2>
  <p>Não vendemos, alugamos nem compartilhamos seus dados com terceiros para fins comerciais. Os dados são compartilhados apenas com o <strong>Supabase</strong>, provedor de banco de dados em nuvem, exclusivamente para armazenamento e sincronização.</p>

  <h2>6. Notificações</h2>
  <p>O app envia notificações locais para lembretes de eventos sanitários, partos e piquetes, com base nos dados que você mesmo cadastrou. Você pode desativar as notificações nas configurações do celular.</p>

  <h2>7. Seus direitos</h2>
  <ul>
    <li>Acessar todos os dados que cadastrou</li>
    <li>Corrigir ou atualizar seus dados a qualquer momento</li>
    <li>Excluir sua conta e todos os dados — basta entrar em contato pelo e-mail abaixo</li>
    <li>Exportar seus dados em PDF pelos relatórios do app</li>
  </ul>

  <h2>8. Segurança</h2>
  <p>Utilizamos transmissão criptografada (HTTPS/TLS) e autenticação segura. Recomendamos o uso de senha forte e que não compartilhe suas credenciais.</p>

  <h2>9. Crianças</h2>
  <p>O Cria Rebanho Pro não é destinado a menores de 18 anos e não coleta dados de crianças intencionalmente.</p>

  <h2>10. Alterações nesta política</h2>
  <p>Podemos atualizar esta política periodicamente. Alterações relevantes serão comunicadas pelo próprio aplicativo.</p>

  <h2>11. Contato</h2>
  <p><strong>E-mail:</strong> <a href="mailto:contato@criarebanho.app.br">contato@criarebanho.app.br</a><br>
  <strong>Site:</strong> <a href="https://criarebanho.app.br">criarebanho.app.br</a></p>
</div>

<footer>
  <div class="footer-links">
    <a href="/">Início</a>
    <a href="mailto:contato@criarebanho.app.br">contato@criarebanho.app.br</a>
  </div>
  <p>© <?= date('Y') ?> Cria Rebanho Pro.</p>
</footer>

</body>
</html>
