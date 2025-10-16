<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>README – WoodyCraft</title>
  <style>
    :root{
      --bg:#ffffff;
      --fg:#0f172a;
      --muted:#475569;
      --border:#e2e8f0;
      --accent:#0ea5e9;
      --code-bg:#0b1020;
      --code-fg:#e2e8f0;
      --kbd-bg:#f1f5f9;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Inter,"Helvetica Neue",Arial,"Noto Sans","Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
      background:var(--bg); color:var(--fg);
      line-height:1.6;
    }
    .container{max-width: 920px; margin: 0 auto; padding: 32px 20px;}
    header{margin-bottom:24px; border-bottom:1px solid var(--border); padding-bottom:16px}
    h1{font-size: clamp(28px, 4vw, 36px); margin:0 0 8px}
    .subtitle{color:var(--muted); margin:0}
    h2{margin-top:32px; font-size: clamp(22px, 3vw, 26px);}
    h3{margin-top:20px; font-size: clamp(18px, 2.5vw, 20px);}
    p{margin: 12px 0;}
    ul{padding-left: 20px; margin: 8px 0 12px}
    code{background: var(--kbd-bg); border:1px solid var(--border); padding: 0 6px; border-radius: 6px;}
    pre{
      background: var(--code-bg);
      color: var(--code-fg);
      padding: 14px 16px;
      border-radius: 10px;
      overflow:auto;
      border:1px solid #0f172a;
    }
    a{color:var(--accent); text-decoration:none}
    a:hover{text-decoration:underline}
    .toc{
      background:#f8fafc; border:1px solid var(--border); border-radius:12px; padding:12px 16px; margin: 12px 0 24px;
    }
    .note{background:#f1f5f9; border-left:4px solid var(--accent); padding:10px 12px; border-radius:6px; color:#0f172a}
    .kv{display:grid; grid-template-columns: 180px 1fr; gap:8px 16px; border:1px solid var(--border); padding:12px; border-radius:10px; background:#fafafa}
    .muted{color:var(--muted)}
    footer{margin-top:40px; padding-top:16px; border-top:1px solid var(--border); color:var(--muted); font-size:14px}
    .small{font-size:14px}
    .img-frame{border:1px solid var(--border); border-radius:12px; padding:8px; background:#fff; display:inline-block}
    img{max-width:100%; height:auto; display:block}
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>WoodyCraft</h1>
      <p class="subtitle">Site e-commerce de puzzles 3D en bois – Projet Laravel (BTS SIO SLAM)</p>
    </header>

    <nav class="toc small">
      <strong>Sommaire</strong>
      <ul>
        <li><a href="#presentation">Présentation</a></li>
        <li><a href="#objectifs">Objectifs</a></li>
        <li><a href="#fonctionnalites">Fonctionnalités</a></li>
        <li><a href="#architecture">Architecture technique</a></li>
        <li><a href="#environnement">Environnement de développement</a></li>
        <li><a href="#donnees">Modèle de données</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#securite">Sécurité &amp; bonnes pratiques</a></li>
        <li><a href="#auteur">Auteur</a></li>
        <li><a href="#licence">Licence</a></li>
      </ul>
    </nav>

    <section id="presentation">
      <h2>Présentation du projet</h2>
      <p>
        <strong>WoodyCraft</strong> est une application e-commerce qui permet de parcourir et d’acheter des <em>puzzles 3D en bois</em>. 
        Le projet couvre le parcours complet d’un site marchand&nbsp;: consultation des produits, gestion du panier, commande et génération de facture.
      </p>
      <p class="note">
        Contexte pédagogique&nbsp;: projet réalisé dans le cadre du BTS SIO option SLAM.
      </p>
    </section>

    <section id="objectifs">
      <h2>Objectifs du projet</h2>
      <ul>
        <li>Concevoir une application web fonctionnelle et sécurisée avec <strong>Laravel</strong>.</li>
        <li>Permettre aux utilisateurs de parcourir, rechercher et acheter des puzzles 3D.</li>
        <li>Gérer le cycle complet d’un achat (compte, panier, adresses, commande, facture).</li>
        <li>Fournir une interface d’administration pour gérer produits et catégories.</li>
      </ul>
    </section>

    <section id="fonctionnalites">
      <h2>Fonctionnalités principales</h2>
      <h3>Côté utilisateur</h3>
      <ul>
        <li>Inscription et authentification</li>
        <li>Consultation des produits par catégorie</li>
        <li>Ajout, modification et suppression d’articles dans le panier</li>
        <li>Gestion des adresses de livraison</li>
        <li>Validation de commande et génération de facture</li>
      </ul>

      <h3>Côté administrateur</h3>
      <ul>
        <li>Gestion des produits (ajout, édition, suppression)</li>
        <li>Gestion des catégories</li>
        <li>Consultation des commandes et des utilisateurs</li>
      </ul>
    </section>

    <section id="architecture">
      <h2>Architecture technique</h2>
      <div class="kv">
        <div><strong>Langage</strong></div><div>PHP 8 / Laravel 10</div>
        <div><strong>Base de données</strong></div><div>MySQL</div>
        <div><strong>Front-end</strong></div><div>Blade / Tailwind CSS</div>
        <div><strong>Serveur local</strong></div><div>Laragon</div>
        <div><strong>Outils</strong></div><div>VS Code, Git, GitHub, Laravel Artisan, HeidiSQL</div>
      </div>
    </section>

    <section id="environnement">
      <h2>Environnement de développement</h2>
      <ul>
        <li><strong>Laragon</strong> 6.0</li>
        <li>Apache httpd-2.4.54-win64-VS16</li>
        <li>PHP 8.1.10</li>
        <li>MySQL 8.0.30</li>
        <li>Ports&nbsp;: HTTP 80 · MySQL 3306</li>
      </ul>
      <div class="img-frame">
        <img src="assets/laragon.png" alt="Écran Laragon (exemple)">
      </div>
      <p class="muted small">Placez votre capture d’écran dans <code>assets/laragon.png</code> à la racine du dépôt.</p>
    </section>

    <section id="donnees">
      <h2>Modèle de données</h2>
      <ul>
        <li><strong>users</strong> – informations des utilisateurs</li>
        <li><strong>adresses</strong> – adresses de livraison</li>
        <li><strong>puzzles</strong> – produits</li>
        <li><strong>categories</strong> – classification des puzzles</li>
        <li><strong>paniers</strong> – panier utilisateur</li>
        <li><strong>commandes</strong> – achats et factures</li>
      </ul>
      <p class="muted small">Les relations sont modélisées dans un diagramme UML (non inclus dans ce fichier).</p>
    </section>

    <section id="installation">
      <h2>Installation</h2>
      <h3>Prérequis</h3>
      <ul>
        <li>PHP &ge; 8.0</li>
        <li>Composer</li>
        <li>MySQL</li>
        <li>Laragon (ou autre stack locale)</li>
      </ul>

      <h3>Étapes</h3>
      <ol>
        <li>Cloner le dépôt
          <pre><code>git clone https://github.com/&lt;votre-utilisateur&gt;/woodycraft.git
cd woodycraft</code></pre>
        </li>
        <li>Installer les dépendances Laravel
          <pre><code>composer install</code></pre>
        </li>
        <li>Créer le fichier d’environnement
          <pre><code>cp .env.example .env</code></pre>
        </li>
        <li>Générer la clé d’application
          <pre><code>php artisan key:generate</code></pre>
        </li>
        <li>Configurer la base de données dans <code>.env</code></li>
        <li>Lancer les migrations et seeders
          <pre><code>php artisan migrate --seed</code></pre>
        </li>
        <li>Démarrer le serveur
          <pre><code>php artisan serve</code></pre>
        </li>
        <li>Ouvrir l’application&nbsp;: <a href="http://localhost:8000">http://localhost:8000</a></li>
      </ol>
    </section>

    <section id="securite">
      <h2>Sécurité &amp; bonnes pratiques</h2>
      <ul>
        <li>Validation des formulaires côté serveur</li>
        <li>Middlewares Laravel pour la gestion des accès</li>
        <li>Protection CSRF activée</li>
        <li>Sauvegardes régulières de la base de données</li>
      </ul>
    </section>

    <section id="auteur">
      <h2>Auteur</h2>
      <p><strong>Dalil Aitchaib</strong> – Étudiant en BTS SIO SLAM.</p>
    </section>

    <section id="licence">
      <h2>Licence</h2>
      <p>Projet réalisé à des fins pédagogiques — tous droits réservés © 2025.</p>
    </section>

    <footer>
      <p>
        <span class="muted">README HTML généré pour présentation du projet sur GitHub Pages ou dans un dossier /docs.</span>
      </p>
    </footer>
  </div>
</body>
</html>
