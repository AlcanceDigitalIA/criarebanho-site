<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cria Rebanho Pro — Gestão de Pecuária no Celular</title>
  <meta name="description" content="Aplicativo de gestão de rebanho bovino com dois módulos: Recria (controle individual por animal) e Corte (gestão por lote). Sanitário, reprodução, pesagens, pastagens, financeiro, arrendamento e compra/venda. Funciona offline.">
  <meta http-equiv="X-Content-Type-Options" content="nosniff">
  <meta name="referrer" content="strict-origin-when-cross-origin">

  <!-- Open Graph (WhatsApp, Facebook, etc.) -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://criarebanho.app.br/">
  <meta property="og:title" content="Cria Rebanho Pro — Gestão de Pecuária no Celular">
  <meta property="og:description" content="Controle seu rebanho de qualquer lugar, mesmo sem internet. Módulo Recria (por animal) e módulo Corte (por lote): saúde, reprodução, pesagens, pastagens, financeiro e muito mais.">
  <meta property="og:image" content="https://criarebanho.app.br/img/icon.png">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="Cria Rebanho Pro — Gestão de Pecuária no Celular">
  <meta name="twitter:description" content="Controle seu rebanho de qualquer lugar, mesmo sem internet.">
  <meta name="twitter:image" content="https://criarebanho.app.br/img/icon.png">

  <link rel="icon" type="image/png" href="img/icon.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --marrom: #5D4037;
      --marrom-escuro: #3E2723;
      --marrom-claro: #8D6E63;
      --verde: #2E7D32;
      --laranja: #E65100;
      --bg: #FAFAF8;
      --texto: #1a1a1a;
      --cinza: #666;
    }

    body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--texto); }

    /* NAV */
    nav {
      position: fixed; top: 0; width: 100%; background: rgba(255,255,255,0.95);
      backdrop-filter: blur(10px); border-bottom: 1px solid #eee;
      display: flex; align-items: center; justify-content: space-between;
      padding: 12px 5%; z-index: 100;
    }
    .nav-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
    .nav-logo img { width: 36px; height: 36px; border-radius: 8px; }
    .nav-logo span { font-weight: 700; font-size: 1.1rem; color: var(--marrom-escuro); }
    .nav-links { display: flex; align-items: center; gap: 28px; }
    .nav-links a {
      text-decoration: none; font-size: 0.92rem; font-weight: 600;
      color: var(--marrom-claro); transition: color 0.2s;
    }
    .nav-links a:hover { color: var(--marrom-escuro); }
    .nav-btn {
      background: var(--marrom); color: #fff; padding: 10px 20px;
      border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.9rem;
      transition: background 0.2s;
    }
    .nav-btn:hover { background: var(--marrom-escuro); }
    @media (max-width: 640px) { .nav-links { display: none; } }

    /* HERO */
    .hero {
      min-height: 100vh; display: flex; align-items: center;
      background: linear-gradient(135deg, var(--marrom-escuro) 0%, var(--marrom) 60%, #8D6E63 100%);
      padding: 100px 5% 60px;
    }
    .hero-inner { max-width: 1100px; margin: 0 auto; display: flex; align-items: center; gap: 60px; flex-wrap: wrap; }
    .hero-text { flex: 1; min-width: 300px; }
    .hero-badge {
      display: inline-block; background: rgba(255,255,255,0.15); color: #fff;
      padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;
      margin-bottom: 20px; border: 1px solid rgba(255,255,255,0.25);
    }
    .hero h1 { font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 20px; }
    .hero h1 span { color: #FFCC80; }
    .hero p { font-size: 1.15rem; color: rgba(255,255,255,0.85); line-height: 1.7; margin-bottom: 36px; max-width: 520px; }
    .hero-buttons { display: flex; gap: 16px; flex-wrap: wrap; }
    .btn-primary {
      display: flex; align-items: center; gap: 10px;
      background: #fff; color: var(--marrom-escuro);
      padding: 14px 28px; border-radius: 12px; text-decoration: none;
      font-weight: 700; font-size: 1rem; transition: transform 0.2s, box-shadow 0.2s;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(0,0,0,0.3); }
    .btn-secondary {
      display: flex; align-items: center; gap: 10px;
      background: rgba(255,255,255,0.15); color: #fff;
      padding: 14px 28px; border-radius: 12px; text-decoration: none;
      font-weight: 600; font-size: 1rem; border: 1px solid rgba(255,255,255,0.3);
      transition: background 0.2s;
    }
    .btn-secondary:hover { background: rgba(255,255,255,0.25); }
    .hero-image { flex: 1; min-width: 260px; display: flex; justify-content: center; }
    .hero-icon {
      width: 220px; height: 220px; border-radius: 48px;
      box-shadow: 0 30px 80px rgba(0,0,0,0.4);
      animation: float 4s ease-in-out infinite;
    }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-16px); }
    }
    .hero-stats { display: flex; gap: 32px; margin-top: 40px; flex-wrap: wrap; }
    .stat { color: #fff; }
    .stat-num { font-size: 1.8rem; font-weight: 800; color: #FFCC80; }
    .stat-label { font-size: 0.85rem; color: rgba(255,255,255,0.75); }

    /* SEÇÕES */
    section { padding: 80px 5%; }
    .section-inner { max-width: 1100px; margin: 0 auto; }
    .section-tag { font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--marrom); margin-bottom: 12px; }
    .section-title { font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 800; color: var(--marrom-escuro); margin-bottom: 16px; }
    .section-sub { font-size: 1.05rem; color: var(--cinza); max-width: 560px; line-height: 1.7; }

    /* MÓDULOS */
    .modulos { background: #fff; }
    .modulos-grid {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px; margin-top: 48px;
    }
    .modulo-card {
      background: var(--bg); border-radius: 16px; padding: 28px;
      border: 1px solid #eee; transition: transform 0.2s, box-shadow 0.2s;
    }
    .modulo-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,0.08); }
    .modulo-icon {
      width: 52px; height: 52px; border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.6rem; margin-bottom: 16px;
    }
    .modulo-card h3 { font-size: 1.1rem; font-weight: 700; color: var(--marrom-escuro); margin-bottom: 8px; }
    .modulo-card p { font-size: 0.92rem; color: var(--cinza); line-height: 1.6; }

    /* FUNCIONA OFFLINE */
    .offline { background: linear-gradient(135deg, #F1F8E9, #E8F5E9); }
    .offline-inner { display: flex; align-items: center; gap: 60px; flex-wrap: wrap; }
    .offline-text { flex: 1; min-width: 280px; }
    .offline-list { list-style: none; margin-top: 24px; display: flex; flex-direction: column; gap: 14px; }
    .offline-list li { display: flex; align-items: flex-start; gap: 12px; font-size: 0.97rem; color: #333; line-height: 1.5; }
    .check { color: var(--verde); font-size: 1.1rem; margin-top: 1px; }
    .offline-visual { flex: 1; min-width: 260px; display: flex; justify-content: center; }
    .offline-box {
      background: #fff; border-radius: 20px; padding: 32px;
      box-shadow: 0 8px 40px rgba(0,0,0,0.1); text-align: center; max-width: 300px;
    }
    .offline-box .icon-big { font-size: 4rem; margin-bottom: 16px; }
    .offline-box h4 { font-size: 1.1rem; font-weight: 700; color: var(--marrom-escuro); margin-bottom: 8px; }
    .offline-box p { font-size: 0.9rem; color: var(--cinza); line-height: 1.6; }

    /* PLANOS */
    .planos { background: #fff; }
    .planos-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 28px; margin-top: 48px; }
    .plano-card {
      border-radius: 20px; padding: 36px 32px; border: 2px solid #eee;
      transition: transform 0.2s;
    }
    .plano-card:hover { transform: translateY(-4px); }
    .plano-card.destaque { border-color: var(--marrom); background: var(--marrom-escuro); color: #fff; }
    .plano-badge {
      display: inline-block; background: #FFCC80; color: var(--marrom-escuro);
      padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 700;
      margin-bottom: 16px;
    }
    .plano-nome { font-size: 1.3rem; font-weight: 800; margin-bottom: 8px; }
    .plano-card.destaque .plano-nome { color: #fff; }
    .plano-preco { font-size: 2.4rem; font-weight: 800; color: var(--marrom); margin-bottom: 4px; }
    .plano-card.destaque .plano-preco { color: #FFCC80; }
    .plano-periodo { font-size: 0.85rem; color: var(--cinza); margin-bottom: 28px; }
    .plano-card.destaque .plano-periodo { color: rgba(255,255,255,0.65); }
    .plano-lista { list-style: none; display: flex; flex-direction: column; gap: 12px; }
    .plano-lista li { display: flex; align-items: center; gap: 10px; font-size: 0.92rem; }
    .plano-card.destaque .plano-lista li { color: rgba(255,255,255,0.9); }
    .plano-lista .ok { color: var(--verde); }
    .plano-card.destaque .plano-lista .ok { color: #A5D6A7; }
    .plano-lista .no { color: #ccc; }
    .plano-btn {
      display: block; text-align: center; margin-top: 16px;
      padding: 14px; border-radius: 10px; text-decoration: none;
      font-weight: 700; font-size: 0.95rem; transition: opacity 0.2s;
    }
    .plano-btn:hover { opacity: 0.85; }
    .plano-btn.outline { border: 2px solid var(--marrom); color: var(--marrom); margin-top: 32px; }
    .plano-btn.filled { background: #FFCC80; color: var(--marrom-escuro); }
    .plano-btn.wpp {
      display: flex; align-items: center; justify-content: center; gap: 8px;
      background: #25D366; color: #fff; margin-top: 32px;
    }

    /* FAQ */
    .faq { background: var(--bg); }
    .faq-list { margin-top: 48px; display: flex; flex-direction: column; gap: 16px; max-width: 760px; }
    .faq-item {
      background: #fff; border-radius: 14px; border: 1px solid #eee;
      overflow: hidden;
    }
    .faq-pergunta {
      width: 100%; text-align: left; background: none; border: none; cursor: pointer;
      padding: 20px 24px; font-size: 1rem; font-weight: 600; color: var(--marrom-escuro);
      display: flex; justify-content: space-between; align-items: center; gap: 12px;
      font-family: 'Inter', sans-serif;
    }
    .faq-pergunta:hover { background: #faf8f6; }
    .faq-seta { font-size: 1.2rem; transition: transform 0.25s; color: var(--marrom-claro); flex-shrink: 0; }
    .faq-item.aberto .faq-seta { transform: rotate(180deg); }
    .faq-resposta { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
    .faq-item.aberto .faq-resposta { max-height: 300px; }
    .faq-resposta p { padding: 0 24px 20px; font-size: 0.95rem; color: var(--cinza); line-height: 1.7; }

    /* CTA */
    .cta {
      background: linear-gradient(135deg, var(--marrom-escuro), var(--marrom));
      text-align: center; padding: 80px 5%;
    }
    .cta h2 { font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; color: #fff; margin-bottom: 16px; }
    .cta p { font-size: 1.1rem; color: rgba(255,255,255,0.8); margin-bottom: 36px; }
    .cta .btn-primary { display: inline-flex; }

    /* FOOTER */
    footer {
      background: var(--marrom-escuro); color: rgba(255,255,255,0.6);
      text-align: center; padding: 32px 5%; font-size: 0.87rem;
    }
    footer a { color: rgba(255,255,255,0.8); text-decoration: none; }
    footer a:hover { color: #fff; }
    .footer-links { display: flex; justify-content: center; gap: 28px; margin-bottom: 16px; flex-wrap: wrap; }

    /* VER TELA */
    .modulo-card { cursor: pointer; }
    .ver-tela { margin-top: 12px; font-size: 0.85rem; font-weight: 600; color: var(--marrom); }
    .modulo-card:hover .ver-tela { text-decoration: underline; }

    /* LIGHTBOX */
    #lightbox {
      display: none; position: fixed; inset: 0;
      background: rgba(0,0,0,0.88); z-index: 999;
      align-items: center; justify-content: center;
    }
    #lightbox.ativo { display: flex; }
    .lb-inner {
      position: relative; display: flex; flex-direction: column;
      align-items: center; gap: 12px; max-height: 90vh;
    }
    .lb-titulo { color: #fff; font-weight: 700; font-size: 1rem; }
    .lb-fechar {
      position: absolute; top: -40px; right: 0;
      background: none; border: none; color: #fff;
      font-size: 1.5rem; cursor: pointer; line-height: 1;
    }
    #lb-img {
      max-height: 78vh; max-width: 90vw;
      border-radius: 24px; box-shadow: 0 20px 60px rgba(0,0,0,0.5);
      transition: opacity 0.2s;
    }
    .lb-nav { display: flex; align-items: center; gap: 20px; margin-top: 4px; }
    .lb-btn {
      background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
      color: #fff; width: 40px; height: 40px; border-radius: 50%;
      font-size: 1.1rem; cursor: pointer; transition: background 0.2s;
      display: flex; align-items: center; justify-content: center;
    }
    .lb-btn:hover { background: rgba(255,255,255,0.3); }
    .lb-btn:disabled { opacity: 0.3; cursor: default; }
    .lb-dots { display: flex; gap: 8px; }
    .lb-dot {
      width: 8px; height: 8px; border-radius: 50%;
      background: rgba(255,255,255,0.4); transition: background 0.2s;
    }
    .lb-dot.ativo { background: #fff; }

    /* RESPONSIVO */
    @media (max-width: 640px) {
      .hero-inner { flex-direction: column-reverse; text-align: center; }
      .hero p { margin: 0 auto 36px; }
      .hero-buttons { justify-content: center; }
      .hero-stats { justify-content: center; }
      .offline-inner { flex-direction: column; text-align: center; }
    }
  </style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="#" class="nav-logo">
    <img src="img/icon.png" alt="Cria Rebanho Pro">
    <span>Cria Rebanho Pro</span>
  </a>
  <div class="nav-links">
    <a href="#modulos">Funcionalidades</a>
    <a href="#planos">Planos</a>
    <a href="#faq">Dúvidas</a>
  </div>
  <a href="#download" class="nav-btn">Testar grátis</a>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-inner">
    <div class="hero-text">
      <div class="hero-badge">🐄 Novo: Módulo Corte — gestão por lote</div>
      <h1>Gerencie seu <span>rebanho</span> no celular, em qualquer lugar</h1>
      <p>Dois módulos em um só app: <strong>Recria</strong>, com controle individual por animal, e <strong>Corte</strong>, com gestão por lote para quem trabalha com muitas cabeças. Funciona sem internet — seus dados sempre ao alcance da mão.</p>
      <div class="hero-buttons">
        <a href="#download" class="btn-primary">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M3.18 23.76c.3.17.64.24.98.2l13.08-7.55-2.82-2.82-11.24 10.17zm-1.8-20.3C1.14 3.8 1 4.19 1 4.64v14.72c0 .45.14.84.38 1.18l.06.06 8.25-8.25v-.19L1.44 3.9l-.06.06zm18.34 9.46l-2.52-1.46-2.89 2.89 2.89 2.89 2.54-1.47c.72-.42.72-1.43-.02-1.85zM4.16.24L17.24 7.8l-2.82 2.82L3.18.44A1.2 1.2 0 0 1 4.16.24z"/></svg>
          Testar grátis agora
        </a>
        <a href="#modulos" class="btn-secondary">Ver funcionalidades</a>
      </div>
      <div class="hero-stats">
        <div class="stat">
          <div class="stat-num">2</div>
          <div class="stat-label">Módulos: Recria e Corte</div>
        </div>
        <div class="stat">
          <div class="stat-num">100%</div>
          <div class="stat-label">Funciona offline</div>
        </div>
        <div class="stat">
          <div class="stat-num">Grátis</div>
          <div class="stat-label">Para começar</div>
        </div>
      </div>
    </div>
    <div class="hero-image">
      <img src="img/icon.png" alt="Cria Rebanho Pro" class="hero-icon">
    </div>
  </div>
</section>

<!-- DOIS MÓDULOS -->
<section class="dois-modulos" id="dois-modulos" style="background: var(--bg);">
  <div class="section-inner">
    <div class="section-tag">Dois módulos, um só app</div>
    <h2 class="section-title">Escolha como gerenciar: por animal ou por lote</h2>
    <p class="section-sub">Ao abrir o app, você escolhe o módulo que combina com o seu manejo. Pode usar os dois ao mesmo tempo — e o Premium libera tudo com uma única assinatura.</p>
    <div class="modulos-grid" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
      <div class="modulo-card" style="border: 2px solid var(--marrom); background:#fff;" onclick="document.getElementById('modulos').scrollIntoView({behavior:'smooth'})">
        <div class="modulo-icon" style="background:#FBE9E7; font-size:2rem; width:64px; height:64px;">🐄</div>
        <h3 style="font-size:1.3rem;">Recria</h3>
        <p style="margin-bottom:12px;"><strong>Controle individual por animal.</strong> Ideal para cria, recria e seleção genética.</p>
        <p>Cadastro com brinco e genealogia, saúde animal, reprodução com previsão de parto, pesagens por cabeça, pastagens, financeiro, agenda e relatórios PDF.</p>
        <div class="ver-tela">Ver funcionalidades ↓</div>
      </div>
      <div class="modulo-card" style="border: 2px solid var(--laranja); background:#fff; cursor:default;">
        <div class="modulo-icon" style="background:#FFF3E0; font-size:2rem; width:64px; height:64px;">🥩</div>
        <h3 style="font-size:1.3rem;">Corte <span style="font-size:0.72rem;background:#E65100;color:#fff;padding:2px 8px;border-radius:10px;font-weight:700;vertical-align:middle;">Novo</span></h3>
        <p style="margin-bottom:12px;"><strong>Gestão por lote.</strong> Feito para quem trabalha com muitas cabeças de gado de corte.</p>
        <p>Lotes com quantidade e peso médio, manejo sanitário por lote, pesagens de lote, movimentações (venda, transferência, morte), piquetes, arrendamento de pastagens, financeiro e relatórios.</p>
      </div>
    </div>
  </div>
</section>

<!-- MÓDULOS -->
<section class="modulos" id="modulos">
  <div class="section-inner">
    <div class="section-tag">Funcionalidades — Módulo Recria</div>
    <h2 class="section-title">Tudo que você precisa para gerenciar seu rebanho</h2>
    <p class="section-sub">Do cadastro do animal até o fechamento financeiro e controle de arrendamentos — um app completo, simples de usar. Clique em qualquer módulo para ver como é na prática.</p>
    <div class="modulos-grid">
      <div class="modulo-card" onclick="abrirScreens(['img/screen_animais.png','img/screen_animais2.png'],'Animais')">
        <div class="modulo-icon" style="background:#FBE9E7;">🐄</div>
        <h3>Animais</h3>
        <p>Cadastre cada animal com brinco, nome, raça, sexo, peso, idade, pai, mãe, lote e situação. Histórico completo do rebanho.</p>
        <div class="ver-tela">Ver tela →</div>
      </div>
      <div class="modulo-card" onclick="abrirScreens(['img/screen_sanitario.png','img/screen_sanitario2.png'],'Saúde Animal')">
        <div class="modulo-icon" style="background:#E8F5E9;">💉</div>
        <h3>Saúde Animal</h3>
        <p>Registre vacinas, vermifugações, tratamentos e exames. Alertas automáticos por data para nunca perder um evento sanitário.</p>
        <div class="ver-tela">Ver tela →</div>
      </div>
      <div class="modulo-card" onclick="abrirScreens(['img/screen_reproducao.png','img/screen_reproducao2.png'],'Reprodução')">
        <div class="modulo-icon" style="background:#FCE4EC;">🐂</div>
        <h3>Reprodução</h3>
        <p>Controle coberturas, gestações e partos. Cálculo automático da data prevista de parto (283 dias) com alertas.</p>
        <div class="ver-tela">Ver tela →</div>
      </div>
      <div class="modulo-card" onclick="abrirScreens(['img/screen_pesagens.png','img/screen_pesagens2.png'],'Pesagens')">
        <div class="modulo-icon" style="background:#E3F2FD;">⚖️</div>
        <h3>Pesagens</h3>
        <p>Acompanhe a evolução de peso de cada animal ao longo do tempo. Veja o ganho de peso acumulado por cabeça.</p>
        <div class="ver-tela">Ver tela →</div>
      </div>
      <div class="modulo-card" onclick="abrirScreens(['img/screen_pastagens.png','img/screen_pastagens2.png'],'Pastagens')">
        <div class="modulo-icon" style="background:#F1F8E9;">🌿</div>
        <h3>Pastagens</h3>
        <p>Gerencie piquetes com rotação inteligente. Alertas de piquetes vencidos, dias de descanso e disponibilidade.</p>
        <div class="ver-tela">Ver tela →</div>
      </div>
      <div class="modulo-card" onclick="abrirScreens(['img/screen_financeiro.png','img/screen_financeiro2.png'],'Financeiro')">
        <div class="modulo-icon" style="background:#FFF8E1;">💰</div>
        <h3>Financeiro</h3>
        <p>Receitas, despesas e custo por animal. Feche as contas da fazenda com relatório financeiro em PDF.</p>
        <div class="ver-tela">Ver tela →</div>
      </div>
      <div class="modulo-card" onclick="abrirScreens(['img/screen_agenda.png','img/screen_agenda2.png'],'Agenda')">
        <div class="modulo-icon" style="background:#EDE7F6;">📅</div>
        <h3>Agenda</h3>
        <p>Visualize tudo que está por vir: eventos sanitários, partos previstos e piquetes a vencer — em um único lugar.</p>
        <div class="ver-tela">Ver tela →</div>
      </div>
      <div class="modulo-card" onclick="abrirScreens(['img/screen_relatorios.png','img/screen_relatorios2.png'],'Relatórios')">
        <div class="modulo-icon" style="background:#E8EAF6;">📊</div>
        <h3>Relatórios PDF</h3>
        <p>Gere relatórios em PDF do rebanho completo, pesagens e pastagens. Ideal para compartilhar com técnicos e veterinários.</p>
        <div class="ver-tela">Ver tela →</div>
      </div>
      <div class="modulo-card">
        <div class="modulo-icon" style="background:#EFEBE9;">🤝</div>
        <h3>Arrendamento <span style="font-size:0.72rem;background:#FFCC80;color:#3E2723;padding:2px 7px;border-radius:10px;font-weight:700;vertical-align:middle;">Premium</span></h3>
        <p>Controle contratos de arrendamento de terra com alertas de vencimento, valor mensal e situação de cada área arrendada.</p>
      </div>
      <div class="modulo-card">
        <div class="modulo-icon" style="background:#E0F7FA;">💱</div>
        <h3>Compra e Venda <span style="font-size:0.72rem;background:#FFCC80;color:#3E2723;padding:2px 7px;border-radius:10px;font-weight:700;vertical-align:middle;">Premium</span></h3>
        <p>Registre compras e vendas de animais com categoria, raça, valor por cabeça e total. Veja o saldo e resultado financeiro das negociações.</p>
      </div>
      <div class="modulo-card">
        <div class="modulo-icon" style="background:#FFF3E0;">☁️</div>
        <h3>Sincronização</h3>
        <p>Seus dados ficam salvos no celular e sincronizam automaticamente com a nuvem quando há conexão.</p>
      </div>
    </div>
  </div>
</section>

<!-- LIGHTBOX -->
<div id="lightbox" onclick="fecharScreen()">
  <div class="lb-inner" onclick="event.stopPropagation()">
    <button class="lb-fechar" onclick="fecharScreen()">✕</button>
    <p class="lb-titulo" id="lb-titulo"></p>
    <img id="lb-img" src="" alt="">
    <div class="lb-nav" id="lb-nav">
      <button class="lb-btn" id="lb-prev" onclick="navScreen(-1)">&#8592;</button>
      <div class="lb-dots" id="lb-dots"></div>
      <button class="lb-btn" id="lb-next" onclick="navScreen(1)">&#8594;</button>
    </div>
  </div>
</div>

<!-- NOVIDADES -->
<section class="novidades" style="background:#fff; padding-top: 60px; padding-bottom: 60px;">
  <div class="section-inner">
    <div class="section-tag">Novidades da versão 1.0.7</div>
    <h2 class="section-title">Ferramentas que colocam dinheiro no seu bolso</h2>
    <p class="section-sub">As últimas atualizações trouxeram os números que todo pecuarista de corte quer ver.</p>
    <div class="modulos-grid" style="margin-top: 36px;">
      <div class="modulo-card" style="cursor:default;">
        <div class="modulo-icon" style="background:#E8F5E9;">📈</div>
        <h3>GMD — Ganho Médio Diário</h3>
        <p>Veja quantos quilos por dia cada lote está ganhando desde a entrada. Saiba na hora se o pasto e o manejo estão rendendo.</p>
      </div>
      <div class="modulo-card" style="cursor:default;">
        <div class="modulo-icon" style="background:#FFF8E1;">💵</div>
        <h3>Valor do lote pela arroba</h3>
        <p>Informe o preço da @ e o app calcula quanto vale seu lote hoje. Decida a hora certa de vender com o número na tela.</p>
      </div>
      <div class="modulo-card" style="cursor:default;">
        <div class="modulo-icon" style="background:#E3F2FD;">📤</div>
        <h3>Exportação em CSV</h3>
        <p>Seus dados são seus: exporte tudo em planilhas para abrir no Excel, enviar ao contador ou guardar como backup.</p>
      </div>
      <div class="modulo-card" style="cursor:default;">
        <div class="modulo-icon" style="background:#FBE9E7;">⚡</div>
        <h3>Cadastro em massa</h3>
        <p>Chegou gado novo? Cadastre centenas de animais de uma vez com brincos em sequência. Minutos, não horas.</p>
      </div>
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
        <li><span class="check">✓</span> Registre pesagens, vacinas e partos sem precisar de Wi-Fi</li>
        <li><span class="check">✓</span> Dados salvos com segurança no próprio celular</li>
        <li><span class="check">✓</span> Sincronização automática com a nuvem quando conectado</li>
        <li><span class="check">✓</span> Seus dados acessíveis em qualquer lugar da propriedade</li>
        <li><span class="check">✓</span> Backup na nuvem para não perder nada</li>
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
          <li><span class="ok">✓</span> Até 20 animais ativos</li>
          <li><span class="ok">✓</span> Até 3 piquetes</li>
          <li><span class="ok">✓</span> Módulo sanitário</li>
          <li><span class="ok">✓</span> Módulo de pesagens</li>
          <li><span class="ok">✓</span> Agenda</li>
          <li><span class="ok">✓</span> Relatórios PDF</li>
          <li><span class="ok">✓</span> Sincronização na nuvem</li>
          <li><span class="no">✗</span> Financeiro</li>
          <li><span class="no">✗</span> Reprodução</li>
          <li><span class="no">✗</span> Arrendamento</li>
          <li><span class="no">✗</span> Compra e Venda</li>
        </ul>
        <a href="#download" class="plano-btn outline">Testar grátis</a>
      </div>
      <div class="plano-card destaque">
        <div class="plano-badge">⭐ Mais popular</div>
        <div class="plano-nome">Premium</div>
        <div class="plano-preco">R$ 30<span style="font-size:1rem;font-weight:600;">/mês</span></div>
        <div class="plano-periodo">
          ou <strong style="color:#FFCC80;">R$ 300/ano</strong> — economize 2 meses<br>
          ativação por código, cancele quando quiser
        </div>
        <div style="background:rgba(255,204,128,0.15); border:1px solid rgba(255,204,128,0.4); border-radius:10px; padding:10px 14px; margin-bottom:24px; font-size:0.88rem; color:#FFCC80; font-weight:600;">
          🎁 Experimente grátis por 15 dias — peça seu código de teste no WhatsApp
        </div>
        <ul class="plano-lista">
          <li><span class="ok">✓</span> <strong>Módulos Recria + Corte completos</strong></li>
          <li><span class="ok">✓</span> Animais e lotes ilimitados</li>
          <li><span class="ok">✓</span> Piquetes ilimitados</li>
          <li><span class="ok">✓</span> Módulo financeiro completo</li>
          <li><span class="ok">✓</span> Módulo de reprodução</li>
          <li><span class="ok">✓</span> Arrendamento de terra e pastagens</li>
          <li><span class="ok">✓</span> Compra e venda de animais</li>
          <li><span class="ok">✓</span> Relatórios PDF</li>
          <li><span class="ok">✓</span> Custo por animal e por lote</li>
          <li><span class="ok">✓</span> Sincronização na nuvem</li>
          <li><span class="ok">✓</span> Suporte prioritário</li>
          <li><span class="ok">✓</span> Novos módulos incluídos no futuro</li>
        </ul>
        <a href="https://wa.me/5569999224713?text=Ol%C3%A1%2C%20tenho%20interesse%20no%20Cria%20Rebanho%20Pro%20Premium!" class="plano-btn wpp" target="_blank" rel="noopener">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          Falar pelo WhatsApp
        </a>
        <a href="mailto:contato@criarebanho.app.br" class="plano-btn filled">Enviar e-mail</a>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="faq" id="faq">
  <div class="section-inner">
    <div class="section-tag">Dúvidas frequentes</div>
    <h2 class="section-title">Perguntas frequentes</h2>
    <div class="faq-list">
      <div class="faq-item">
        <button class="faq-pergunta" onclick="toggleFaq(this)">
          Qual a diferença entre os módulos Recria e Corte? <span class="faq-seta">▼</span>
        </button>
        <div class="faq-resposta">
          <p>O módulo <strong>Recria</strong> faz o controle individual de cada animal — brinco, genealogia, reprodução, saúde e pesagens por cabeça. Já o módulo <strong>Corte</strong> trabalha por lote: você cadastra um lote com a quantidade de cabeças, peso médio, raça e categoria, e gerencia manejo sanitário, pesagens e movimentações do lote inteiro de uma vez. É ideal para quem engorda muitas cabeças e não precisa acompanhar animal por animal. Você pode usar os dois módulos ao mesmo tempo, e o plano Premium libera ambos.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-pergunta" onclick="toggleFaq(this)">
          O app funciona sem internet? <span class="faq-seta">▼</span>
        </button>
        <div class="faq-resposta">
          <p>Sim! O Cria Rebanho Pro é desenvolvido com a filosofia "offline first". Todos os dados ficam armazenados no próprio celular e sincronizam automaticamente com a nuvem quando há conexão disponível. Você pode usar o app normalmente no meio do campo, sem depender de sinal.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-pergunta" onclick="toggleFaq(this)">
          Se eu trocar de celular, perco meus dados? <span class="faq-seta">▼</span>
        </button>
        <div class="faq-resposta">
          <p>Não. Ao fazer login com sua conta no novo celular, todos os seus dados são restaurados automaticamente da nuvem. Seu rebanho fica seguro independente do dispositivo.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-pergunta" onclick="toggleFaq(this)">
          Quantos animais posso cadastrar no plano gratuito? <span class="faq-seta">▼</span>
        </button>
        <div class="faq-resposta">
          <p>No plano gratuito você pode cadastrar até 20 animais ativos e gerenciar até 3 piquetes. Para rebanhos maiores, o plano Premium oferece animais e piquetes ilimitados, além de módulos exclusivos como financeiro, reprodução e arrendamento.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-pergunta" onclick="toggleFaq(this)">
          Como funciona a ativação do Premium? <span class="faq-seta">▼</span>
        </button>
        <div class="faq-resposta">
          <p>Após o pagamento (R$ 30/mês ou R$ 300/ano com 2 meses de desconto), você recebe um código de ativação por WhatsApp ou e-mail. Basta inserir esse código dentro do app, na tela "Meu Plano", e o acesso Premium é liberado imediatamente. E antes de assinar, você pode pedir um código de teste grátis de 15 dias pelo WhatsApp — sem compromisso.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-pergunta" onclick="toggleFaq(this)">
          O app está disponível para iPhone? <span class="faq-seta">▼</span>
        </button>
        <div class="faq-resposta">
          <p>Atualmente o Cria Rebanho Pro está disponível apenas para Android (Play Store). A versão para iOS (iPhone) está em planejamento para uma próxima atualização.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-pergunta" onclick="toggleFaq(this)">
          Meus dados ficam seguros? <span class="faq-seta">▼</span>
        </button>
        <div class="faq-resposta">
          <p>Sim. Cada usuário acessa apenas seus próprios dados — outros usuários não têm acesso às suas informações. A sincronização com a nuvem utiliza autenticação segura e criptografia. Consulte nossa Política de Privacidade para mais detalhes.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta" id="download">
  <h2>Comece a organizar seu rebanho hoje</h2>
  <p>O app está em fase final de testes na Play Store. Entre para a lista de testadores e use grátis antes de todo mundo!</p>
  <a href="https://wa.me/5569999224713?text=Ol%C3%A1%2C%20quero%20ser%20testador%20do%20Cria%20Rebanho%20Pro!" target="_blank" rel="noopener" class="btn-primary" style="margin: 0 auto; background:#25D366; color:#fff;">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    Quero testar grátis
  </a>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-links">
    <a href="privacidade.html">Política de Privacidade</a>
    <a href="excluir-conta.html">Excluir conta</a>
    <a href="mailto:contato@criarebanho.app.br">contato@criarebanho.app.br</a>
    <a href="https://wa.me/5569999224713" target="_blank" rel="noopener">WhatsApp</a>
  </div>
  <p>© 2026 Cria Rebanho Pro. Desenvolvido com ❤️ para o pecuarista brasileiro.</p>
</footer>

<script>
  let lbScreens = [], lbIdx = 0;

  function abrirScreens(srcs, titulo) {
    lbScreens = srcs;
    lbIdx = 0;
    document.getElementById('lb-titulo').textContent = titulo;
    document.getElementById('lightbox').classList.add('ativo');
    document.body.style.overflow = 'hidden';
    renderLb();
  }

  function renderLb() {
    const img = document.getElementById('lb-img');
    img.style.opacity = '0';
    img.src = lbScreens[lbIdx];
    img.onload = () => { img.style.opacity = '1'; };

    document.getElementById('lb-prev').disabled = lbIdx === 0;
    document.getElementById('lb-next').disabled = lbIdx === lbScreens.length - 1;

    const nav = document.getElementById('lb-nav');
    nav.style.display = lbScreens.length > 1 ? 'flex' : 'none';

    const dots = document.getElementById('lb-dots');
    dots.innerHTML = lbScreens.map((_, i) =>
      `<div class="lb-dot${i === lbIdx ? ' ativo' : ''}" onclick="irScreen(${i})"></div>`
    ).join('');
  }

  function navScreen(dir) {
    const novo = lbIdx + dir;
    if (novo >= 0 && novo < lbScreens.length) { lbIdx = novo; renderLb(); }
  }

  function irScreen(i) { lbIdx = i; renderLb(); }

  function fecharScreen() {
    document.getElementById('lightbox').classList.remove('ativo');
    document.body.style.overflow = '';
  }

  function toggleFaq(btn) {
    const item = btn.closest('.faq-item');
    const aberto = item.classList.contains('aberto');
    document.querySelectorAll('.faq-item.aberto').forEach(el => el.classList.remove('aberto'));
    if (!aberto) item.classList.add('aberto');
  }

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') fecharScreen();
    if (e.key === 'ArrowLeft') navScreen(-1);
    if (e.key === 'ArrowRight') navScreen(1);
  });
</script>
</body>
</html>
