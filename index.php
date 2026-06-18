<?php
require_once __DIR__ . '/includes/security.php';
$pagina_titulo = 'Cria Rebanho Pro — Gestão de Pecuária no Celular';
$pagina_descricao = 'Aplicativo de gestão de rebanho bovino para pequenas e médias propriedades rurais. Controle de animais, sanitário, reprodução, pesagens, pastagens e financeiro.';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pagina_titulo) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pagina_descricao) ?>">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://criarebanho.app.br/">
  <link rel="icon" type="image/png" href="img/icon.png">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pagina_titulo) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pagina_descricao) ?>">
  <meta property="og:image" content="https://criarebanho.app.br/img/icon.png">
  <meta property="og:url" content="https://criarebanho.app.br/">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="pt_BR">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- NAV -->
<nav>
  <a href="/" class="nav-logo">
    <img src="img/icon.png" alt="Cria Rebanho Pro" width="36" height="36">
    <span>Cria Rebanho Pro</span>
  </a>
  <a href="#download" class="nav-btn">Baixar grátis</a>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-inner">
    <div class="hero-text">
      <div class="hero-badge">🐄 Aplicativo para pecuaristas</div>
      <h1>Gerencie seu <span>rebanho</span> no celular, em qualquer lugar</h1>
      <p>Controle completo de animais, saúde, reprodução, pastagens e financeiro. Funciona sem internet — seus dados sempre ao alcance da mão.</p>
      <div class="hero-buttons">
        <a href="#download" class="btn-primary">
          <?php include __DIR__ . '/includes/icon-playstore.svg.php'; ?>
          Baixar na Play Store
        </a>
        <a href="#modulos" class="btn-secondary">Ver funcionalidades</a>
      </div>
      <div class="hero-stats">
        <div class="stat"><div class="stat-num">9</div><div class="stat-label">Módulos completos</div></div>
        <div class="stat"><div class="stat-num">100%</div><div class="stat-label">Funciona offline</div></div>
        <div class="stat"><div class="stat-num">Grátis</div><div class="stat-label">Para começar</div></div>
      </div>
    </div>
    <div class="hero-image">
      <img src="img/icon.png" alt="Cria Rebanho Pro" class="hero-icon" width="220" height="220">
    </div>
  </div>
</section>

<!-- MÓDULOS -->
<section class="modulos" id="modulos">
  <div class="section-inner">
    <div class="section-tag">Funcionalidades</div>
    <h2 class="section-title">Tudo que você precisa para gerenciar seu rebanho</h2>
    <p class="section-sub">Do cadastro do animal até o fechamento financeiro — um app completo, simples de usar.</p>
    <div class="modulos-grid">
      <?php
      $modulos = [
        ['emoji' => '🐄', 'cor' => '#FBE9E7', 'titulo' => 'Animais',       'desc' => 'Cadastre cada animal com brinco, nome, raça, sexo, peso, idade, pai, mãe, lote e situação. Histórico completo do rebanho.'],
        ['emoji' => '💉', 'cor' => '#E8F5E9', 'titulo' => 'Saúde Animal',  'desc' => 'Registre vacinas, vermifugações, tratamentos e exames. Alertas automáticos por data para nunca perder um evento sanitário.'],
        ['emoji' => '🐂', 'cor' => '#FCE4EC', 'titulo' => 'Reprodução',    'desc' => 'Controle coberturas, gestações e partos. Cálculo automático da data prevista de parto (283 dias) com alertas.'],
        ['emoji' => '⚖️', 'cor' => '#E3F2FD', 'titulo' => 'Pesagens',      'desc' => 'Acompanhe a evolução de peso de cada animal ao longo do tempo. Veja o ganho de peso acumulado por cabeça.'],
        ['emoji' => '🌿', 'cor' => '#F1F8E9', 'titulo' => 'Pastagens',     'desc' => 'Gerencie piquetes com rotação inteligente. Alertas de piquetes vencidos, dias de descanso e disponibilidade.'],
        ['emoji' => '💰', 'cor' => '#FFF8E1', 'titulo' => 'Financeiro',    'desc' => 'Receitas, despesas e custo por animal. Feche as contas da fazenda com relatório financeiro em PDF.'],
        ['emoji' => '📅', 'cor' => '#EDE7F6', 'titulo' => 'Agenda',        'desc' => 'Visualize eventos sanitários, partos previstos e piquetes a vencer — tudo em um único lugar.'],
        ['emoji' => '📊', 'cor' => '#E8EAF6', 'titulo' => 'Relatórios',    'desc' => 'Gere relatórios em PDF do rebanho completo com genealogia e relatório financeiro detalhado para imprimir.'],
        ['emoji' => '☁️', 'cor' => '#FFF3E0', 'titulo' => 'Sincronização', 'desc' => 'Seus dados ficam salvos no celular e sincronizam automaticamente com a nuvem quando há conexão.'],
      ];
      foreach ($modulos as $m): ?>
      <div class="modulo-card">
        <div class="modulo-icon" style="background:<?= htmlspecialchars($m['cor']) ?>"><?= $m['emoji'] ?></div>
        <h3><?= htmlspecialchars($m['titulo']) ?></h3>
        <p><?= htmlspecialchars($m['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- OFFLINE -->
<section class="offline">
  <div class="section-inner offline-inner">
    <div class="offline-text">
      <div class="section-tag">Offline First</div>
      <h2 class="section-title">Funciona no meio do pasto, sem internet</h2>
      <p class="section-sub">Desenvolvido para a realidade do campo. Todos os dados ficam no seu celular e sincronizam quando você tiver sinal.</p>
      <ul class="offline-list">
        <?php
        $itens = [
          'Registre pesagens, vacinas e partos sem precisar de Wi-Fi',
          'Dados salvos com segurança no próprio celular',
          'Sincronização automática com a nuvem quando conectado',
          'Seus dados acessíveis em qualquer lugar da propriedade',
          'Backup na nuvem para não perder nada',
        ];
        foreach ($itens as $item): ?>
        <li><span class="check">✓</span> <?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="offline-visual">
      <div class="offline-box">
        <div class="icon-big">📶</div>
        <h4>Sem internet? Sem problema.</h4>
        <p>O Cria Rebanho Pro funciona completamente offline. Trabalhe no campo e sincronize depois.</p>
      </div>
    </div>
  </div>
</section>

<!-- PLANOS -->
<section class="planos" id="planos">
  <div class="section-inner">
    <div class="section-tag">Planos</div>
    <h2 class="section-title">Comece grátis, cresça com o Premium</h2>
    <p class="section-sub">Experimente sem custo. Quando seu rebanho crescer, o Premium cresce com você.</p>
    <div class="planos-grid">
      <div class="plano-card">
        <div class="plano-nome">Gratuito</div>
        <div class="plano-preco">R$ 0</div>
        <div class="plano-periodo">para sempre</div>
        <ul class="plano-lista">
          <li><span class="ok">✓</span> Até 5 animais ativos</li>
          <li><span class="ok">✓</span> 1 piquete</li>
          <li><span class="ok">✓</span> Módulo sanitário</li>
          <li><span class="ok">✓</span> Módulo de pesagens</li>
          <li><span class="ok">✓</span> Agenda</li>
          <li><span class="no">✗</span> Financeiro</li>
          <li><span class="no">✗</span> Reprodução</li>
          <li><span class="no">✗</span> Relatórios PDF</li>
        </ul>
        <a href="#download" class="plano-btn outline">Baixar grátis</a>
      </div>
      <div class="plano-card destaque">
        <div class="plano-badge">⭐ Mais popular</div>
        <div class="plano-nome">Premium</div>
        <div class="plano-preco">Sob consulta</div>
        <div class="plano-periodo">ativação por código</div>
        <ul class="plano-lista">
          <li><span class="ok">✓</span> Animais ilimitados</li>
          <li><span class="ok">✓</span> Piquetes ilimitados</li>
          <li><span class="ok">✓</span> Módulo financeiro completo</li>
          <li><span class="ok">✓</span> Módulo de reprodução</li>
          <li><span class="ok">✓</span> Relatórios PDF</li>
          <li><span class="ok">✓</span> Custo por animal</li>
          <li><span class="ok">✓</span> Sincronização na nuvem</li>
          <li><span class="ok">✓</span> Suporte prioritário</li>
        </ul>
        <a href="mailto:contato@criarebanho.app.br" class="plano-btn filled">Falar sobre o Premium</a>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta" id="download">
  <h2>Comece a organizar seu rebanho hoje</h2>
  <p>Gratuito para baixar. Sem cartão de crédito. Funciona offline.</p>
  <a href="#" class="btn-primary" style="display:inline-flex;">
    <?php include __DIR__ . '/includes/icon-playstore.svg.php'; ?>
    Baixar na Play Store
  </a>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-links">
    <a href="/privacidade">Política de Privacidade</a>
    <a href="mailto:contato@criarebanho.app.br">contato@criarebanho.app.br</a>
  </div>
  <p>© <?= date('Y') ?> Cria Rebanho Pro. Desenvolvido com ❤️ para o pecuarista brasileiro.</p>
</footer>

</body>
</html>
